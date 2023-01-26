<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
    public $currentdate = null;

	public function __construct(){

		parent::__construct();
			$this->load->library('session');
			$this->load->helper('url');
			//$this->load->helper('doc2txt_class');
			$this->load->model('erosa_model');
			$this->load->library("pagination");
			 
			date_default_timezone_set('Africa/Nairobi');
            $datetime = new DateTime();
            $this->currentdate  = $datetime->format('Y-m-d H:i:s');
		
	}

	public function index()
	{
			//$ip = $this->input->ip_address();
		$this->load->view('index');
	}

/*Displaying registration form Here*/
	public function register_form()
	{
		$this->load->view('erosa_registration');
	}

/*Displaying login form Here*/
	public function login_form()
	{
		$this->load->view('erosa_login');
	}

/*driver registration activity by driver*/
	public function driver_registration()
	{
		$plate_no = $this->input->post('driver_plate_no');
		$plate_check = $this->erosa_model->check_plate($plate_no);
		if($plate_check){

		$driver_data = array(
	  'driver_plate_no'=>$this->input->post('driver_plate_no'),
	  'driver_mobile'=>$this->input->post('driver_mobile')
		);

		$this->erosa_model->register_driver($driver_data);

		$data['after_register'] = 'You Have Successfully Registered, Please Login Here';
		$data['reg_plate'] = $this->input->post('driver_plate_no');
		$this->load->view('erosa_login',$data);				
		}else{
			$this->session->set_flashdata('error_msg', 'The Vehicle Plate Number You Entered Arleady Existed, Try Another.');
			redirect('manager/register_form');
		}


		
	}

/* driver login activity*/
	public function driver_login(){
		$plate_no = $this->input->post('driver_plate_no');
		$login_auth = $this->erosa_model->login_driver($plate_no);
		if ($login_auth) {
			
			$this->session->set_userdata('driver_id',$login_auth['driver_id']);

			$this->session->set_userdata('plate_no',$login_auth['driver_plate_no']);

			$this->session->set_userdata('mobile',$login_auth['driver_mobile']);

			$this->erosa_model->update_lastlogindriver($this->session->userdata('driver_id'),$this->currentdate);
			
			$this->session->set_flashdata('success_msg', 'Welcome,Login Successfully.');

			redirect(base_url());	
		
		}else{
			$this->session->set_flashdata('error_msg', 'The Vehicle Plate Number you Entered Does Not Exist in Our Database, Try Another.');
			redirect('manager/login_form');

		}

	}

/* register hbreakdown page*/
	public function register_breakdown()
	{
		$data['get_routes'] = $this->erosa_model->get_routes();
		$this->load->view('erosa_register_break',$data);
	}

/* list breakdown page*/
	public function list_breakdown()
	{

		/* List o Breakdown by a driver ...onprogress*/
		$driver_id = $this->session->userdata('driver_id');
		$data['current_list'] = $this->erosa_model->current_list($driver_id);
		$this->load->view('erosa_breakdown_list',$data);
	}

/* vehicle breakdown tracking prepaire*/
	public function track_breakdown()
	{
		$data['get_routes'] = $this->erosa_model->get_routes();
			$this->load->view('routes_dialog',$data);
		//$this->load->view('vehicle_tracking');
	}

/* vehicle breakdown tracking*/
	public function tracking()
	{	
		$route = $this->input->post('break_route');
		$data = $this->erosa_model->route_breakdown($route);
		if ($data) {

			$this->session->set_userdata('route_selected',$route);

			$route = $this->session->userdata('route_selected');

			redirect('manager/default_tracking/'.$route);
					
		}else{
			$url = base_url('');
			echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Currently There is No Breakdown in This Route. Try Again Later');
    			window.location.href='$url';
    			</script>");
		}
		
		
	}

//if session is set 
	public function default_tracking(){
		$data1  = $this->uri->segment(3);
		$driver_id = $this->session->userdata('driver_id');
		if(is_numeric($data1))
			{
				$this->session->set_userdata('route_selected',$data1);
  				$route = $this->session->userdata('route_selected');
   				$data['route_breakdown'] = $this->erosa_model->route_breakdown($route);
   				$data['route_name'] = $this->erosa_model->getroute_name($data1);
   				
		}else{
   			if(is_null($data1)){
   				$route = $this->session->userdata('route_selected');
   				$data['route_breakdown'] = $this->erosa_model->route_breakdown($route);
   				$data['route_name'] = $this->erosa_model->getroute_name($route);
   			}
		}
		
		$data['movements'] = $this->erosa_model->get_mvt_updates($driver_id);
		$this->load->view('vehicle_tracking',$data,'refresh');
	}

//stop tracking service
	public function stopservice(){
		if ($this->session->userdata('route_selected')) {
				$this->session->unset_userdata('route_selected');
			}
			redirect('manager/track_breakdown/');
		}	

// logout activities*/
	public function sign_out()
	{
			$this->session->sess_destroy();
			redirect(base_url());
			
	}
	


/* change plate number form*/
	public function plate_change()
	{

		$data['text'] = 'Change Plate Number Here';

		$plate_cr = $this->erosa_model->plate_current($this->session->userdata('driver_id'));

		$data['current_plate'] = $plate_cr['driver_plate_no'];

		$this->load->view('change_plate_form',$data);
	}

/* change plate number form*/
	public function update_plate()
	{
		$plate_up = array(
	  'driver_plate_no'=>$this->input->post('change_plate'));
		if($this->erosa_model->plate_update($plate_up))
		{
			$this->session->set_flashdata('success_msg', 'Your Plate Number Arleady Changed!.');
			redirect(base_url());

		}else{
			$this->session->set_flashdata('success_msg', 'Failed!.');
			redirect(base_url());
		}
	}


/* change plate number form*/
	public function unregister()
	{
	
		if($this->erosa_model->unregister($this->session->userdata('driver_id')))
		{	
			$this->session->set_flashdata('success_msg', 'Done! Successfully Unregistered');
			session_destroy();
			redirect('manager/index');

		}else{
			echo '';
		}
	}

/* delete route*/
	public function remove_route()
	{
	
		if($this->erosa_model->remove_route($this->input->get('id')))
		{
			$this->session->set_flashdata('success_msg', 'Route Deleted Successfully!.');
			redirect(base_url('manager/all_routes'));

		}else{
			$this->session->set_flashdata('success_msg', 'Route Failed to be Removed!.');
			redirect(base_url('manager/all_routes'));
		}
	}

/*submit breakdown form to database*/
	public function break_insert()
	{
		$breakdown_data = array(
	  'break_route'=>$this->input->post('break_route'),
	  'break_plateno'=>$this->session->userdata('driver_id'),
	  'break_latitude' => $this->input->post('break_latitude'),
	  'break_longtude' => $this->input->post('break_longtude'),
	  'break_start' => $this->currentdate,
	  'break_type'=>$this->input->post('break_type'));

		if($this->erosa_model->register_breakdown($breakdown_data)){

			$this->session->set_flashdata('success_msg', 'Done! Successfully, Thank You For Registering Vehicle breakdown.');
			redirect('manager/index');			
		}else{
			$this->session->set_flashdata('error_msg', 'Failed, Try Again.');
			redirect('manager/register_breakdown');
		}


		
	}


/* delete current list by driver*/
public function deleteList(){
	$list_id = $this->input->get('break');
	if($this->erosa_model->deleteList($list_id,$this->currentdate))
		{
	//echo json_encode($data);
	redirect('manager/list_breakdown');
	}
}

//------MANAGEMENT------//

//---admin login page....//

public function mgt(){
	$this->load->view('erosa_ad_login');

}

//---admin home page....//

public function mgt_home(){
	$data['routes'] = $this->erosa_model->trending_route();
			
	$this->load->view('erosa_ad_home',$data);	
}

//login action

public function mgt_login(){
		$mail = $this->input->post('mail');
		$password = md5($this->input->post('password'));

		$login_auth = $this->erosa_model->mgt_login($mail,$password);

		if ($login_auth) {
			
			$this->session->set_userdata('mgt_id',$login_auth['mgt_id']);

			$this->session->set_userdata('mgt_fullname',$login_auth['mgt_fullname']);

			$this->session->set_userdata('mgt_mail',$login_auth['mgt_mail']);

			$this->session->set_userdata('mgt_status',$login_auth['mgt_status']);

			$this->session->set_userdata('mgt_last_login',$login_auth['mgt_last_login']);

			$this->erosa_model->update_lastloginmgt($this->session->userdata('mgt_id'),$this->currentdate);
			
			redirect('manager/mgt_home');
		
			
		}else{
			$this->session->set_flashdata('error_msg','Incorrect Username or Password!');
			redirect('manager/mgt');

		}
}

//logout
public function mgt_logout()
		{
			$this->session->sess_destroy();
			redirect(base_url('manager/mgt_home'));
		}


	//recent notification access
public function notification_last_access()
		{
			$count = $this->erosa_model->notification_last_access();
			 $arr = array('count' => $count);
   			echo json_encode($arr);
		}
		
		//current breakdown
public function breakdown_cr()
		{
			$count = $this->erosa_model->breakdown_cr();
			 $arr = array('count' => $count);
   			echo json_encode($arr);
		}
			//total breakdown
public function breakdown_tb()
		{
			$count = $this->erosa_model->breakdown_tb();
			 $arr = array('count' => $count);
   			echo json_encode($arr);
		}

	//total drivers
public function drivers_total()
		{
			$count = $this->erosa_model->drivers_total();
			 $arr = array('count' => $count);
   			echo json_encode($arr);
		}

			//breakdown current
public function breakdown(){

	  $config = array();
        $config["base_url"] = site_url('manager/breakdown');
        $config["total_rows"] = $this->erosa_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);
    	$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';


        $this->pagination->initialize($config);

        if($this->uri->segment(2)){
			$page = ($this->uri->segment(2)) ;
			}else{
		$page = 1;
			}

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $data['all_breakdowns'] = $this->erosa_model->get_breakdowns($config["per_page"], $page);
		
		$this->load->view('erosa_ad_break',$data);
		}

//breakdown all
public function breakdown2(){

	  $config = array();
        $config["base_url"] = site_url('manager/breakdown2');
        $config["total_rows"] = $this->erosa_model->get_count2();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);
    	$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';


        $this->pagination->initialize($config);

        if($this->uri->segment(2)){
			$page = ($this->uri->segment(2)) ;
			}else{
		$page = 1;
			}

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $data['all_breakdowns'] = $this->erosa_model->get_breakdowns2($config["per_page"], $page);
		
		$this->load->view('erosa_ad_break2',$data);
		}


//ALL DRIVERS
public function all_drivers(){

	  $config = array();
        $config["base_url"] = site_url('manager/all_drivers');
        $config["total_rows"] = $this->erosa_model->drivers_total();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);
    	$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';


        $this->pagination->initialize($config);

        if($this->uri->segment(2)){
			$page = ($this->uri->segment(2)) ;
			}else{
		$page = 1;
			}

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $data['all_drivers'] = $this->erosa_model->get_driver_break($config["per_page"], $page);
		
		$this->load->view('erosa_ad_driver',$data);
		}


//ALL ROUTES
public function all_routes(){

	  $config = array();
        $config["base_url"] = site_url('manager/all_routes');
        $config["total_rows"] = $this->erosa_model->count_routes();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);
    	$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';


        $this->pagination->initialize($config);

        if($this->uri->segment(2)){
			$page = ($this->uri->segment(2)) ;
			}else{
		$page = 1;
			}

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $data['all_routes'] = $this->erosa_model->get_all_route($config["per_page"], $page);
		
		$this->load->view('erosa_ad_route',$data);
		}
##### MANAGEENT TERMINATE BREAKDOWN IF NECESSARY#####
public function terminate_breakdown()  
{
    $id_post = $this->input->get('id'); 
    $hapus=$this->erosa_model->deleteList($id_post,$this->currentdate);
    if($hapus){
    	$this->session->set_flashdata('success_msg', 'Breakdown Terminated Successfully!.');
			redirect(base_url('manager/all_drivers'));

		}else{
			$this->session->set_flashdata('success_msg', 'Failed!.');
			redirect(base_url('manager/all_drivers'));
		}
        redirect('manager/breakdown');
    } 


#### MANAGEENT TERMINATE DRIVER IF NECESSARY#####
	public function remove_driver()
	{

	  $driver_id=$this->input->get('id');
		if($this->erosa_model->unregister($driver_id))
		{
			$this->session->set_flashdata('success_msg', 'Driver Removed Successfully!.');
			redirect(base_url('manager/all_drivers'));

		}else{
			$this->session->set_flashdata('success_msg', 'Failed!.');
			redirect(base_url('manager/all_drivers'));
		}
	}

/*driver registration activity by management*/
	public function driver_mgtregistration()
	{
		$plate_no = $this->input->post('driver_plate_no');
		$plate_check = $this->erosa_model->check_plate($plate_no);
		if($plate_check){

		$driver_data = array(
	  'driver_plate_no'=>$this->input->post('driver_plate_no'),
	  'driver_mobile'=>$this->input->post('driver_mobile')
		);

		$this->erosa_model->register_driver($driver_data);

		$this->session->set_flashdata('success_msg', 'Driver Records Inserted Successfully!.');
		}else{
			$this->session->set_flashdata('success_msg', 'Plate Number Arleady Registerd, Try Another!.');
		}

	redirect(base_url('manager/all_drivers'));		
	}


public function update_movement(){
	$driver = $this->session->userdata('driver_id');
	$route = $this->session->userdata('route_selected');
	$longtude = $this->input->post('long');
	$latitude = $this->input->post('lat');
//	$breakdown_id = $this->input->post('breakdown_id');

	$this->erosa_model->update_movement($driver,$route,$longtude,$latitude,$this->currentdate);
	}
	
public function movement_to_breakdown(){
	$driver = $this->session->userdata('driver_id');
	$route = $this->session->userdata('route_selected');
	$longtude = $this->input->post('long');
	$latitude = $this->input->post('lat');
	$breakdown_id = $this->input->post('break_id');
	$distance = $this->input->post('distance');

	$this->erosa_model->movement_to_breakdown($driver,$route,$longtude,$latitude,$breakdown_id,$distance,$this->currentdate);
	}

	/*MANAGEMENT ADD ROUTE HERE*/
	public function route_mgtregistration()
	{
		$route = array('route_name' => $this->input->post('route_name'));

		if($this->erosa_model->add_route($route)){

		$this->session->set_flashdata('success_msg', 'Route Registered Successfully!.');
		}else{
			$this->session->set_flashdata('success_msg', 'Failed!.');
		}

	redirect(base_url('manager/all_routes'));		
	}


}

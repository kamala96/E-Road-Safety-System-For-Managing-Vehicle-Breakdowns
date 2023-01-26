<?php
class Erosa_model extends CI_model{
   protected $table = 'breakdown';
/*check if vehicle plate number exists */
    public function check_plate($plate_no){
        $this->db->from('driver');
        $this->db->where('driver_plate_no',$plate_no);
        $query=$this->db->get();

        if($query->num_rows()>0){
          return false;
        }else{
          return true;
      }

}

/*register driver */
    public function register_driver($driver_data){
        $this->db->insert('driver', $driver_data);
    }

/*login driver */
public function login_driver($plate_no){

  $this->db->from('driver');
  $this->db->where('driver_plate_no',$plate_no);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }

}


//last logi update
public function update_lastloginmgt($mgt_id,$last){
                  
                  
     $this->db->where('mgt_id', $mgt_id); 
    $dbdata = array("mgt_last_login" => $last); 
    if($this->db->update('management', $dbdata)){
          return true; 
        }

}

public function update_lastlogindriver($driver_id,$last){
                  
                   $this->db->where('driver_id', $driver_id); 
                     $dbdata = array(
                            "driver_lastlogin" => $last
                         ); 
     
                     if($this->db->update('driver', $dbdata)){
                         return true; 
                     }

}

/*update plate number */
public function plate_update($plate_up)
  {
      $driver_id = $this->session->userdata('driver_id');
      $this->db->where('driver_id',$driver_id);
      $query = $this->db->update('driver', $plate_up);
      if($query){
        return true;
      }else{
        return false;
      }

}

/* get current plate number before/after update*/
  public function plate_current($driver_id) { 
    $this->db->where('driver_id',$driver_id);
    $this->db->from('driver');
    if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}

/* unregister driver vehicle*/
  public function unregister($driver_id){
      $this->db->where("driver_id='$driver_id'");
      $query = $this->db->delete('driver');
      if($query){
        return true;
      }else{
        return false;
      }


    }


/* get all routes*/
  public function get_routes() { 
    $this->db->from('route');
    if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }
}


/* count all routes*/
  public function count_routes() { 
    $this->db->from('route');
    if($query=$this->db->get())
  {
      return $query->num_rows();
  }
  else{
    return false;
  }
}

/* get specific route breakdown*/
  public function route_breakdown($route) { 
    $this->db->from('breakdown b');
    $this->db->join('driver d', 'd.driver_id = b.break_plateno', 'left');
    $this->db->join('route r', 'r.route_id = b.break_route', 'left');
    //$this->db->join('watch_list w', 'w.watch_list_driver = d.driver_id', 'left');
    $this->db->where("b.break_route = '$route'");
    $this->db->where("b.break_status = 1");
   // $this->db->order_by('b.break_id', 'DESC');
    $query=$this->db->get();
    if($query)
  {
      return $query->result_array();
  }
  else{
    return false;
  }
} 



/*register vehicle breakdown */
    public function register_breakdown($breakdown_data){
        $query = $this->db->insert('breakdown', $breakdown_data);
        if($query){
        return true;
      }else{
        return false;
      }
    }



/* get all current breakdown to driver*/
  public function current_list($driver_id) { 
    $this->db->from('breakdown b');
    $this->db->join('driver d', 'd.driver_id = b.break_plateno', 'left');
    $this->db->join('route r', 'r.route_id = b.break_route', 'left');
    $this->db->where("b.break_plateno='$driver_id'");
    $this->db->where("b.break_status= 1");

    if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else
  {
    return false;
  }
}

/* delete current breakdown by driver and management*/
  public function deleteList($list_id,$current_date){;
                  
      $this->db->where('break_id', $list_id); 
     $dbdata = array(
          "break_status" => 0,
          "break_end" => $current_date
     ); 
     
     if($this->db->update('breakdown', $dbdata)){
     return true; 
     }
}



//***************************** ADMIN PANEL **************************************
public function mgt_login($email,$pass){

  $this->db->where('mgt_mail',$email);
  $this->db->where('mgt_password',$pass);

  if($query=$this->db->get('management'))
  {
      return $query->row_array();
  }
  else{
    return false;
  }

}

//lprevoius notiication system access
public function notification_last_access(){
    $this->db->order_by('whatchlist_last_time', 'DESC');
    $this->db->limit(2);
  if($query=$this->db->get('watch_list'))
  {
      return $query->result_array();
  }
  else{
    return false;
  }

}

//count current breakdowns
public function breakdown_cr(){
  $this->db->where('break_status',1);
  if($query=$this->db->get('breakdown'))
  {
      return $query->num_rows();
  }
  else{
    return false;
  }

}

//count total breakdowns
public function breakdown_tb(){
  if($query=$this->db->get('breakdown'))
  {
      return $query->num_rows();
  }
  else{
    return false;
  }

}

//count total drivers
public function drivers_total(){
  if($query=$this->db->get('driver'))
  {
      return $query->num_rows();
  }
  else{
    return false;
  }

}

//count total drivers within a route
public function trending_route(){
  $this->db->select('route.*, COUNT(breakdown.break_id) as total')
         ->from('route')
         ->order_by('total', 'desc')
         ->limit(10);

$this->db->join('breakdown', 'break_route = route.route_id','left')
          ->where("break_status= 1")
         ->group_by('break_route');

  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }


}//count total drivers with their breakdowns
public function get_driver_break($limit, $start){
  $this->db->select('d.*, COUNT(b.break_id) as total');
  $this->db->from('driver d');
    $this->db->join('breakdown b', 'b.break_plateno = d.driver_id', 'left');
    $this->db->group_by('driver_id',' desc');
    //$this->db->where("b.break_status= 1");
    $this->db->limit($limit, $start);
    //$this->db->order_by('break_start',' desc');

  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }

}

//ALL BREAKDOWNS--------------//

/* get current & all breakdown to mgt*/
  public function get_breakdowns($limit, $start) { 
    $this->db->from('breakdown b');
    $this->db->join('driver d', 'd.driver_id = b.break_plateno', 'left');
    $this->db->join('route r', 'r.route_id = b.break_route', 'left');
    $this->db->where("b.break_status= 1");
    $this->db->limit($limit, $start);
    $this->db->order_by('break_start',' desc');

    if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else
  {
    return false;
  }
} 

public function get_breakdowns2($limit, $start) { 
    $this->db->from('breakdown b');
    $this->db->join('driver d', 'd.driver_id = b.break_plateno', 'left');
    $this->db->join('route r', 'r.route_id = b.break_route', 'left');
    $this->db->limit($limit, $start);
    $this->db->order_by('break_start',' desc');

    if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else
  {
    return false;
  }
}

//count current breakdowns to mgt
public function get_count2() {
        return $this->db->count_all($this->table);
    }

    //count all breakdowns to mgt
public function get_count() {
        $this->db->where("b.break_status= 1");
        return $this->db->count_all($this->table);
    }


//count total drivers for management
public function get_all_route(){
  $this->db->select('route.*, COUNT(breakdown.break_id) as total')
         ->from('route')
         ->group_by('route_id', 'desc');

$this->db->join('breakdown', 'break_route = route.route_id','left')
         ->group_by('break_route');

  if($query=$this->db->get())
  {
      return $query->result_array();
  }
  else{
    return false;
  }
}

    /* delete route*/
  public function remove_route($route_id){
      $this->db->where("route_id='$route_id'");
      $query = $this->db->delete('route');
      if($query){
        return true;
      }else{
        return false;
      }
    }

/*MANAGEMENT ADD ROUTE */
    public function add_route($route){
        $query = $this->db->insert('route', $route);
        if($query){
        return true;
      }else{
        return false;
      }
    }

public function movement_to_breakdown($driver,$route,$longtude,$latitude,$breakdown_id,$distance,$time){
  $records = array('driver' => $driver,
    'route' => $route,
    'driver_longtude' => $longtude,
    'driver_latitude' => $latitude,
    'breakdown_id' => $breakdown_id,
    'distance_left' => $distance,
    'record_time' => $time);

    $this->db->insert('movement_to_breakdown', $records);

}


public function update_movement($driver,$route,$longtude,$latitude,$last_notify){
  $updates = array('watch_list_driver' => $driver,
    'watch_list_route' => $route,
    'watch_list_lon' => $longtude,
    'watch_list_lat' => $latitude,
    'whatchlist_last_time' => $last_notify);

  $updates2 = array('watch_list_route' => $route,
    'watch_list_lon' => $longtude,
    'watch_list_lat' => $latitude,
    'whatchlist_last_time' => $last_notify);

  $this->db->where('watch_list_driver ', $driver);
  $q = $this->db->get('watch_list');

  if ( $q->num_rows() > 0 ) 
      {
      $this->db->where('watch_list_driver ', $driver);
      $this->db->update('watch_list',$updates2);

    } else {
    $this->db->insert('watch_list', $updates);
  }

}
/* movement updates*/
  public function get_mvt_updates($driver_id) { 
    $this->db->from('watch_list w');
    $this->db->join('driver d', 'd.driver_id = w.watch_list_driver', 'left');
   // $this->db->join('route r', 'r.route_id = b.break_route', 'left');
    $this->db->where("w.watch_list_driver='$driver_id'");
    //$this->db->where("b.break_status= 1");

    if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else
  {
    return false;
  }
}

/* specific route informations*/
  public function getroute_name($route_id) { 
    $this->db->from('route');
    $this->db->where("route_id='$route_id'");

    if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else
  {
    return false;
  }
}



















  //activate account
public function verifyEmail($email_to, $email_code) {
    $data = array('driver_activationstatus' => 1);
   $this->db->where("md5driver_email='$email_to'");
   $this->db->where('md5(register_date)', $email_code);
    return $this->db->update('drivers', $data);
}

public function email_check($email){

  $this->db->select('*');
  $this->db->from('drivers');
  $this->db->where('driver_email',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function get_slider() { // line 19
 $this->db->select("*");
    $this->db->from('slider');
    $query = $this->db->get();
    return $query;
}

public function get_footermenu_product() { // line 19
 $this->db->select("*");
    $this->db->from('taaluma_footermenu');
	$this->db->where("footermenu_category='Product'");
    $query = $this->db->get();
    return $query;
}
public function get_footermenu_service() { // line 19
 $this->db->select("*");
    $this->db->from('taaluma_footermenu');
	$this->db->where("footermenu_category='Service'");
    $query = $this->db->get();
    return $query;
}
public function get_footermenu_support() { // line 19
 $this->db->select("*");
    $this->db->from('taaluma_footermenu');
	$this->db->where("footermenu_category='Support'");
    $query = $this->db->get();
    return $query;
}
public function get_footermenu_about() { // line 19
 $this->db->select("*");
    $this->db->from('taaluma_footermenu');
	$this->db->where("footermenu_category='About'");
    $query = $this->db->get();
    return $query;
}
public function get_footermenu_contact() { // line 19
 $this->db->select("*");
    $this->db->from('taaluma_footermenu');
	$this->db->where("footermenu_category='Contact'");
    $query = $this->db->get();
    return $query;
}

public function get_country() { // line 19
 $this->db->select("*");
    $this->db->from('countries');
    $query = $this->db->get();
    return $query;
}

public function get_package() { // line 19
 $this->db->select("*");
    $this->db->from('packages');
    $query = $this->db->get();
    return $query;
}

public function get_editlanguage() { // line 19
 $this->db->select("*");
    $this->db->from('edit_language');
    $query = $this->db->get();
    return $query;
}

public function get_field() { // line 19
 $this->db->select("*");
    $this->db->from('fields');
    $query = $this->db->get();
    return $query;
}

function getWork(){
  $this->db->select("*");
  $this->db->from('proofing');
  $this->db->order_by('proofing_id',' desc');
  $query = $this->db->get();
  return $query->result();
 }
 
 function get_order($driver_id){
  $this->db->select("*");
  $this->db->from('proofing');
  $this->db->where("driver_id='$driver_id'");
  $this->db->order_by('proofing_id',' desc');
  $query = $this->db->get();
  return $query->result();
 }
 
 function get_proofingDetails($proofing_id){
  $this->db->select("*");
  $this->db->from('proofing');
  $this->db->from('edit_language');
  $this->db->where("proofing_id='$proofing_id'");
  $this->db->order_by('proofing_id',' desc');
  $query = $this->db->get();
  return $query->result();
 }
 
 function get_package_price($id){
  //$this->db->select("*");
  //$this->db->from('proofing');
  //$this->db->order_by('proofing_id',' desc');
  //$query = $this->db->get();
  //return $query->result();
   $query = 'select price,package_words from packages where package_id = '.$this->db->escape($id);
    return $this->db->query($query)->row();
 }

  function get_proofingID($id){
   $query = 'select proofing_id from proofing  order by proofing_id desc';
    return $this->db->query($query)->row();
 }
 //insert lost to db
public function submitorder($order)
{
	
$this->db->insert('proofing', $order);

}

 //delete order
 public function proofing_delete($proofing_id){
 $this -> db -> where("proofing_id='$proofing_id'");
  $this -> db -> delete('proofing');
}



 function get_paymenttype()
 {
  $this->db->order_by('payment_typeID', 'ASC');
  $query = $this->db->from('payment_type');
  $query = $this->db->get();
  $query->result();
  return $query;
 } 
 
 function get_paymentmethodpesapi()
 {
  $this->db->order_by('payment_methodID', 'ASC');
  $this -> db -> where("payment_typeID=1");
  $query = $this->db->from('payment_method');
  $query = $this->db->get();
  $query->result();
  return $query;
 }
 
  public function get_driver_pay($receipt,$phonenumber){

  $this->db->select('*');
  $this->db->from('pesapi_payment');
  $this->db->where('receipt',$receipt);
  $this->db->where('phonenumber',$phonenumber);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}

//***************************** ADMIN PANEL **************************************
public function login_admin($email,$pass){

  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('user_email',$email);
  $this->db->where('user_password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }

}

function get_task(){
	$this->db->select("*");
	$this->db->from("proofing, packages, fields, edit_language, drivers");
	$this->db->where("drivers.driver_id =proofing.driver_id and proofing.package_id=packages.package_id
	and proofing.edit_languageID=edit_language.edit_languageID and fields.field_id=proofing.file_field
	and proofing_status='pending' ");
	$this->db->order_by('proofing_id',' desc');
	$query = $this->db->get();
	return $query->result();
 }
 
 function get_assignedtask(){
	$this->db->select("*");
	$this->db->from("proofing, packages, fields, edit_language, drivers, users");
	$this->db->where("drivers.driver_id =proofing.driver_id and proofing.package_id=packages.package_id
	and proofing.edit_languageID=edit_language.edit_languageID and fields.field_id=proofing.file_field
	and users.user_ID=proofing.assignedto and proofing_status='Assigned' ");
	$this->db->order_by('proofing_id',' desc');
	$query = $this->db->get();
	return $query->result();
 } 
 
 function get_searchtask(){
	$this->db->select("*");
	$this->db->from("proofing, packages, fields, edit_language, drivers");
	$this->db->where("drivers.driver_id =proofing.driver_id and proofing.package_id=packages.package_id
	and proofing.edit_languageID=edit_language.edit_languageID and fields.field_id=proofing.file_field
	");
	$this->db->order_by('proofing_id',' desc');
	$query = $this->db->get();
	return $query->result();
 }
 
function get_editors(){
	$this->db->select("*");
	$this->db->from('users,fields');
	$this->db->where('user_title != "admin" and fields.field_id=users.user_field');
	$this->db->order_by('user_ID',' desc');
	$query = $this->db->get();
	$query->result();
	return $query;
 }
 
 function assigning_task($task,$id){
	 //$id=$this->input->post('proofing_id');
	 $this->db->where('proofing_id',$id);
        $this->db->update('proofing', $task);
		
        }

}
?>

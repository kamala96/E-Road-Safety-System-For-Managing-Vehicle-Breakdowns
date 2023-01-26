<?php 
$mgt_id = $this->session->userdata('mgt_id'); 
$mgt_fullname = $this->session->userdata('mgt_fullname'); 
$mgt_mail = $this->session->userdata('mgt_mail'); 
$login = $this->session->userdata('mgt_last_login'); 
  if (!$mgt_id) {
    redirect('manager/mgt');
  }
  ?>
<!DOCTYPE html>
<html>
<head>
<title>EROSA</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/ww.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/w3-food.css');?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  <!-- css files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" type="text/css" media="all" />
  <!-- Style-CSS -->
  <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet">
  <!-- Font-Awesome-Icons-CSS -->
  <!-- //css files -->

  <!-- web-fonts -->
  <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
   rel="stylesheet">
  <!-- //web-fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-food.css">
  <style type="text/css">
    #wrapper {
  position: relative;
  min-height: 100vh;
}
#contentall {
  padding-bottom: 2.5rem;    /* Footer height */
}
#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 2.5rem;            /* Footer height */
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) { 
    .w3-quarter{margin-bottom: 1em;}   
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) { 
    .w3-quarter{margin-bottom: 1em;}  
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
      .w3-main{min-height: 93vh;}
      .top{min-height: 10em;}
      h4{font-size: 20px;}
    } 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {   
}


body{ font-family: Ubuntu, sans-serif;}

#pagination{
margin: 40 40 0;
}
ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination li a
{
color:black;
display:inline-block;;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
  </style>

    <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

</head>
<body class="w3-light-grey" onload="" >
<div id="wrapper">
 <div id="contentall">

<!-- Top container -->
<div class="w3-bar w3-top w3-food-wine w3-large w3-border" style="z-index:4;min-height: 3em;">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars w3-xlarge"></i>  Menu</button>

  <button class="w3-bar-item w3-button w3-hide-small w3-hover-none w3-hide-medium w3-hover-text-light-grey" onclick="window.location.href='<?php echo base_url('manager/mgt_home');?>'"><i class="fa fa-home w3-xlarge"></i> Home</button>

  <button onclick="window.location.href='<?php echo base_url('manager/mgt_home');?>'" style="margin-left: 30%;font-weight: bold;" class="w3-xlarge w3-bar-item w3-button w3-hide-small w3-hover-none w3-hover-text-light-grey w3-center">EROSA MANAGEMENT PANEL</button>

  <span class="w3-bar-item w3-right"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-food-wine w3-animate-left w3-border" style="z-index:3;width:300px;margin-right: 1px;" id="mySidebar"><br>
  <div class="w3-container w3-row" style="cursor: pointer;" title="Home" onclick="window.location.href='<?php echo base_url('manager/mgt_home');?>'">
    <div class="w3-col s4">
      <img src="<?php echo base_url('assets/images/erosa.png');?>" class="w3-circle w3-margin-right" style="cursor:pointer;width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong style="font-weight: bold;"><?php echo $mgt_fullname;?></strong></span><br>
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Last Login:  <strong style="font-weight: bold;"><?php echo date('d-m-Y D h:i:sa',strtotime($login));?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <button onclick="openBlinks()" class="w3-bar-item w3-button w3-padding-16"><i class="fas fa-car-crash fa-fw"></i>&nbsp;Breakdowns</button>
      <div id="breakLinks" style="display: none;">
      <a href="<?php echo base_url('manager/breakdown');?>" style="padding-left: 2.5em;" class="w3-bar-item w3-button w3-padding-16">Current Breakdowns</a>
      <a href="<?php echo base_url('manager/breakdown2');?>" style="padding-left: 2.5em;" class="w3-bar-item w3-button w3-padding-16">All Breakdowns</a>
    </div>
    
    <button onclick="openDlinks()" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-car fa-fw">&nbsp;</i>&nbsp;Drivers</button>
      <div id="driverLinks" style="display: none;">
      <a href="" style="padding-left: 2.5em;" class="w3-bar-item w3-button w3-padding-16">Driver Extra</a>
      <a href="<?php echo base_url('manager/all_drivers');?>" style="padding-left: 2.5em;" class="w3-bar-item w3-button w3-padding-16">Driver List</a>
    </div>

      <button onclick="openRlinks()" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-road fa-fw">&nbsp;</i>&nbsp;Routes</button>
        <div id="routeLinks" style="display: none;">
        <a href="<?php echo base_url('manager/all_routes');?>" style="padding-left: 2.5em;" class="w3-bar-item w3-button w3-padding-16">List</a>
      </div>


       <button onclick="window.location.href='<?php echo base_url('manager/mgt_logout');?>'" class="w3-bar-item w3-button w3-padding-16"><i class="fas fa-sign-out-alt fa-fw">&nbsp;</i>&nbsp;Logout</button>
    <br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-neutral-gray w3-border" style="margin-left:300px;margin-top:3.7em;">

  <!-- Header -->
  <header class="w3-container w3-food-wine" style="padding-top:20px;padding-bottom: 20px;">
    <h5 style="cursor: pointer;" onclick="window.location.href='<?php echo base_url('manager/mgt_home');?>'">
      <b><i class="fa fa-dashboard"></i> Dashboard</b>
    </h5>
  </header>
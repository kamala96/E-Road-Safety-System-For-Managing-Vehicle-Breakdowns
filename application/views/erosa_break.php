<?php 
$customer_id = $this->session->userdata('customer_id'); 
$plate_no = $this->session->userdata('plate_no'); 
$email = $this->session->userdata('email'); 
$mobile = $this->session->userdata('mobile'); 
$route = $this->session->userdata('route_selected');
  if (!$plate_no) {
    redirect('manager/login_form');
  }elseif (!$route) {
    redirect('manager/track_breakdown');
  }else{}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="UTF-8">
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
  <style>
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
    #isbar{float: left;width: 100%;}
    #plans{content: "";display: inline-table;clear: both;width: 100%;}    
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    #isbar{float: left;width: 50%;}
    #plans{content: "";display: inline-table;clear: both;width: 100%;}    
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    #isbar{float: left;width: 33.3333%;}
    #plans{content: "";display: inline-table;clear: both;width: 100%;}
    
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    #isbar {float: left;width: 25%;}
    #plans{content: "";display: inline-table;clear: both;width: 100%;}
    .siglebreakbar{}
    } 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    #isbar {float: left;width: 20%;}
    #plans{content: "";display: inline-table;clear: both;width: 100%;}
    
    
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
<body>
<div id="wrapper">
 <div id="contentall">
<div class="w3-top">
  <div class="w3-bar w3-food-wine w3-card w3-text-white">
    <a class="w3-bar-item w3-button w3-padding-large  w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="<?php echo base_url('');?>" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="<?php echo base_url('manager/register_breakdown');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">REGISTER BREAKDOWN</a>
    <a href="<?php echo base_url('manager/list_breakdown');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">MY BREAKDOWN</a>
    <a href="<?php echo base_url('manager/default_tracking');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-small">MY ROUTE</a>
    <a href="callto:+255744829002" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-small">CALL</a>
    <a href="mailto:jovinjohn959@gmail.com" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-small">MAIL</a>

  <?php if ($plate_no){ /*...*/}else{?>
    <a href="<?php echo base_url('manager/login_form');?>" class="w3-right w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">SIGN IN</a><?php } ?>

    <?php if ($plate_no) {?>
    <div class="w3-dropdown-hover w3-hide-medium w3-hide-small w3-right">
      <button class="w3-padding-large w3-button" title="More"><?php echo $plate_no;?>&nbsp;<i class="fa fa-chevron-circle-down w3-large"></i></button> <?php } ?>

      <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-food-wine">
        <a href="<?php echo base_url('manager/plate_change');?>" class="w3-bar-item w3-button">Change Plate Number</a>
        <a href="<?php echo base_url('manager/unregister');?>" class="w3-bar-item w3-button delete">Un-Register</a>
        <a href="<?php echo base_url('manager/sign_out');?>" class="w3-bar-item w3-button">Sign Out</a>
      </div>
    </div>

<!-- top contents bar small -->
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-large" href="tel:+255744829002" title="Call Us"><i class="fa fa-phone"></i></a>

    <a class="w3-bar-item w3-button w3-padding-large w3-hide-large" href="mailto:jovinjohn959@gmail.com" title="Mail Us"><i class="fa fa-envelope"></i></a>

    <?php if ($plate_no) {?>
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-large" href="javascript:void(0)" onclick="myFunctions()" title="User Actions"><i class="fa fa-user-circle"></i></a><?php } ?> 
  </div>

  <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-food-wine w3-hide w3-hide-large w3-top w3-border" style="margin-top:46px">
  <a href="<?php echo base_url('manager/register_breakdown');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">REGISTER BREAKDOWN</a>
  <a href="<?php echo base_url('manager/list_breakdown');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MY BREAKDOWN</a>
  <a href="<?php echo base_url('manager/default_tracking');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large">MY ROUTE</a>

  <?php if ($plate_no){ /*...*/}else{?>
  <a href="<?php echo base_url('manager/login_form');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SIGN IN</a><?php }?>
</div>

<!-- middle top bar content small -->
<div id="navDemos" class="w3-bar-block w3-food-wine w3-hide w3-hide-large w3-hide-medium w3-top w3-border" style="margin-top:46px">
  <a href="<?php echo base_url('manager/plate_change');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CHANGE PLATE NUMBER</a>
  <a href="<?php echo base_url('manager/unregister');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large delete">UN-REGISTER</a>
  <a href="<?php echo base_url('manager/sign_out');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SIGN OUT</a>
</div>
</div>
<!-- header section -->


<!-- The Contact Section -->
 <!-- Grid -->
  <div class="w3-row-padding" id="plans" style="margin-top: 3em;">
    <!-- top bar -->

<div class="w3-bar">
  <a href="javascript:history.go(-1)" class="w3-bar-item w3-button w3-food-wine w3-border" style="width:50%">BACK</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-food-wine w3-border" onclick="window.location.href='<?php echo base_url('manager/stopservice');?>'" style="width:50%">STOP SERVICE</a>
</div>
<!-- top bar -->

<!-- bar list -->
 <?php 
 foreach ($breakdown as $row) {
    $date = $row['break_start'];
    $date = date("F j, Y, g:i a", strtotime($date));

    $lat= $row['break_latitude']; //latitude
    $lng= $row['break_longtude']; //longitude

    ?>

    <body id="showDiv" style="display: none;">
      <script type="text/javascript" >
       setTimeout(function(){
           getLocation(<?php echo $row['break_longtude'].','.$row['break_latitude'];?>);
       },1000);
     </script>
    <div class="w3-margin-bottom siglebreakbar" id="content">
      <ul class="w3-ul w3-border w3-center w3-hover-shadow">        
        <li id="plate" class="w3-food-wine w3-large w3-padding-32">PLATE NO: <?php echo $row['customer_plate_no']; ?></li>
        <li class="w3-padding-16">Distance Remained: <b id="putdistance">updating... waiting for network</b> </li>
        <li class="w3-padding-16">Address: <b >
         coming soon</b></li>
        <li class="w3-padding-16"> Time Recorded: <b><?php echo $date;?></b></li>
        <li class="w3-padding-16">Route: <b><?php echo $row['route_name'];?></b></li>
        <li class="w3-padding-16">
          <h2 class="">Breakdown Status</h2>
          <span class="w3-opacity"><?php echo $row['break_type']; ?></span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <form action="" method="post">
            <button class = "w3-button w3-food-wine w3-padding-large">Map Direction View</button>
          </form>
        </li>
    </ul>
    </div></body>

  <?php } ?>

  </div>
  <?php include 'erosa_footer.php';?>
  <script type="text/javascript">
    window.onload = setupRefresh;
    function setupRefresh()
    {
        setInterval("refreshBlock();",30000);
    }
    
    function refreshBlock()
    {
       $('#box').load("").fadeIn("slow");;
    }

    /** Converts numeric degrees to radians */
if (typeof(Number.prototype.toRad) === "undefined") {
  Number.prototype.toRad = function() {
    return this * Math.PI / 180;
  }
}

function getLocation(lon2, lat2) {
  window.navigator.geolocation.watchPosition(function(pos) {
  console.log(pos); 
  //distance btn them
var lon1 = pos.coords.longitude;
var lat1 = pos.coords.latitude;
var R = 6371; // Radius of the earth in km
  var dLat = (lat2-lat1).toRad();  // Javascript functions in radians
  var dLon = (lon2-lon1).toRad(); 
  var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
          Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
          Math.sin(dLon/2) * Math.sin(dLon/2); 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  var d = Number(Math.round(d+'e4')+'e-4');
  var elms = document.getElementById("putdistance");
  var p = document.getElementById("plate").innerHTML;
  document.getElementById("showDiv").style.display = "block";   

    elms.innerHTML =  d +' km';

    if (d < 1.0 || d > 0.5) {
  		notifyMe(d, p);
	} else if (d < 0.5 || d > 0.2) {
 		notifyMe(d, p);
	}else if (d < 0.2 || d > 0) {
 		notifyMe(d, p);
	}else if (d == 0) {
 		notifyMe(d, p);
	} else {
  		action = "";
	}
    
},showError);
}


function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      d.innerHTML = "User denied the request for Geolocation."
      window.location.href = "<?php echo base_url();?>";
      break;
    case error.POSITION_UNAVAILABLE:
      d.innerHTML = "Location information is unavailable."
      window.location.href = "<?php echo base_url();?>";
      break;
    case error.TIMEOUT:
      d.innerHTML = "The request to get user location timed out."
      window.location.href = "<?php echo base_url();?>";
      break;
    case error.UNKNOWN_ERROR:
      d.innerHTML = "An unknown error occurred."
      window.location.href = "<?php echo base_url();?>";
      break;
  }
}


function notifyMe(d, p) {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    if (d == 0) {
    	var options = {
        body: "You Have Reached Destination Vehicle Breakdown with " +p,
        icon: "<?php echo base_url('assets/images/icon.jpg'); ?>",
        dir : "ltr"
    };
  var notification = new Notification("EROSA APP",options);
  notification.onclick = function () {
      window.open("<?php echo base_url();?>");};
  } else {
  var options = {
        body: d +" km left to Reach Vehicle Breakdown with " +p,
        icon: "<?php echo base_url('assets/images/icon.jpg'); ?>",
        dir : "ltr"
    };
  var notification = new Notification("EROSA APP",options);
  notification.onclick = function () {
      window.open("<?php echo base_url();?>");};
  }

  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
      	 if (d == 0) {
    	var options = {
        body: "You Have Reached Destination Vehicle Breakdown with " +p,
        icon: "<?php echo base_url('assets/images/icon.jpg'); ?>",
        dir : "ltr"
    };
  var notification = new Notification("EROSA APP",options);
  notification.onclick = function () {
      window.open("<?php echo base_url();?>");};
  } else {
  var options = {
        body: d +" km left to Reach Vehicle Breakdown with " +p,
        icon: "<?php echo base_url('assets/images/icon.jpg'); ?>",
        dir : "ltr"
    };
  var notification = new Notification("EROSA APP",options);
  notification.onclick = function () {
      window.open("<?php echo base_url();?>");};
  }

      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother them any more.
}
  
  </script>
 


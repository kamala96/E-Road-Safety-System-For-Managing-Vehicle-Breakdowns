<?php 
$driver_id = $this->session->userdata('driver_id');
$plate_no = $this->session->userdata('plate_no'); 
$email = $this->session->userdata('email'); 
$mobile = $this->session->userdata('mobile'); 
$route = $this->session->userdata('route_selected');
  /*if (!$plate_no) {
    redirect('manager/login_form');
  }*/
  ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EROSA</title>
    <meta name="description" content="A perspective slideshow based on Franklin Ta's CSS matrix3d transforms" />
    <meta name="keywords" content="smart roads, road safety, safety, electronic, breakdown, vehicle, vehicle breakdown, notification" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-food.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ww.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/w3-food.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/normalize.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/mockup4.css');?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
    <style type="text/css">
      .push {
  display: inline-block;
  position: relative;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
  text-transform: uppercase;
  text-decoration: none;
  font-weight: bold;
  color: #fff;
  background-color: #3b3334;
  background-image: -webkit-linear-gradient(top, #483e40, #3a3133);
  padding: 12px 20px;
  
  text-align: center;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  text-shadow: 1px 1px 4px rgba(0, 0, 0, .5);
  border: 2px solid #5f5255;
  box-shadow: 0 4px 0 #282425, 0 0 6px #282425, 1px 1px 0px #282425, -1px -1px 0px #282425, 0px 8px 10px rgba(0, 0, 0, .5);
}
.push:active {
  box-shadow: 0 2px 0 #282425, 0 0 6px #282425, 1px 1px 0px #282425, -1px -1px 0px #282425, 0px 4px 10px rgba(0, 0, 0, .5);
  top: 2px;
}

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
<?php if($plate_no){ ?>
    #mymargin{
      margin-top: 2.9em;

    }<?php }else{?>
    #mymargin{
      margin-top: 0.3em;

    }<?php } ?>
    
    
    /* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
   .push{font-size:75px;} 
}

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
  <body class="demo-4">
 <div id="wrapper" >
 <div id="contentall">
<div class="w3-top">
  <div class="w3-bar w3-white w3-card w3-text-black">
    <a class="w3-bar-item w3-button w3-padding-large  w3-hide-large w3-left" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="<?php echo base_url('');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">HOME</a>
    <a href="<?php echo base_url('');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large w3-center" style = "bold">EROSA</a><?php if (!$plate_no){ ?>
  <a href="<?php echo base_url('manager/login_form');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large w3-right">SIGN IN</a><?php }?>

    <!-- top contents bar small -->
    <?php if ($plate_no) {?>
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunctions()" title="User Actions"><i class="fa fa-user-circle"></i></a><?php } ?> 

    <a href="<?php echo base_url('manager/register_breakdown');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">REGISTER BREAKDOWN</a>
    <a href="<?php echo base_url('manager/list_breakdown');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">MY BREAKDOWN</a>
    <a href="<?php echo base_url('manager/default_tracking');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-small">MY ROUTE</a>

  <?php if ($plate_no){ ?>
    <div class="w3-dropdown-hover w3-hide-medium w3-hide-small w3-right">
      <button class="w3-padding-large w3-button w3-hide-small w3-hide-medium" title="More"><?php echo $plate_no;?>&nbsp;<i class="fa fa-chevron-circle-down w3-large"></i></button> 
  <?php } else { ?>
    <a href="<?php echo base_url('manager/login_form');?>" class="w3-right w3-bar-item w3-button w3-padding-large w3-hide-small w3-hide-medium">SIGN IN</a><?php } ?>

      <div class="w3-dropdown-content w3-bar-block w3-card-4 w3-hide-medium w3-hide-small">
        <a href="<?php echo base_url('manager/plate_change');?>" class="w3-bar-item w3-button">Change Plate Number</a>
        <a href="<?php echo base_url('manager/unregister');?>" onclick="confirm('Sure To Un-Register')" class="w3-bar-item w3-button">Un-Register</a>
        <a href="<?php echo base_url('manager/sign_out');?>" class="w3-bar-item w3-button">Sign Out</a>
      </div>
    </div>

  </div>

  <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-food-wine w3-hide w3-hide-large w3-top w3-border" style="margin-top:46px">
  <a href="<?php echo base_url('manager/register_breakdown');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">REGISTER BREAKDOWN</a>
  <a href="<?php echo base_url('manager/list_breakdown');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MY BREAKDOWN</a>
  <a href="<?php echo base_url('manager/default_tracking');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large">MY ROUTE</a>

  
</div>
<!-- middle top bar content small -->
<div id="navDemos" class="w3-bar-block w3-food-wine w3-hide w3-hide-large w3-hide-medium w3-top w3-border" style="margin-top:46px">
  <a href="<?php echo base_url('manager/plate_change');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CHANGE PLATE NUMBER</a>
  <a onclick="confirm('Sure To Un-Register')" href="<?php echo base_url('manager/unregister');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large">UN-REGISTER</a>
  <a href="<?php echo base_url('manager/sign_out');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large" onclick="myFunction()">SIGN OUT</a>
</div>
</div>

  <div id="mymargin" class="container w3-padding">
    <?php if($this->session->flashdata('success_msg')){?>
    <div class="w3-container w3-food-wine w3-card-4 w3-display-container" style ="margin-bottom :2px;">
      <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
      <p>Welcome to EROSA, Driver Plate No. <?php echo $plate_no;?></p>
    </div><?php } ?>
      
      <!-- Top Navigation -->
      <div id="wrap" class="wrap">
        <div class="mockup">
          <img class="mockup__img" src="<?php echo base_url('assets/images/mockup4.jpg');?>" />
          <div class="mobile">
            <ul id="slideshow-1" class="slideshow">
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/small/1.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/small/2.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/small/3.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/small/4.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/small/5.png');?>"/></li>
            </ul>
          </div>
          <div class="screen">
            <ul id="slideshow-2" class="slideshow">
              <li class="slideshow__item current"><img src="<?php echo base_url('assets/images/large/1.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/large/2.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/large/3.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/large/4.png');?>"/></li>
              <li class="slideshow__item"><img src="<?php echo base_url('assets/images/large/5.png');?>"/></li>
            </ul>
          </div>
          <header class="codrops-header">
            <h1><span>electronic road safety</span> erosa <i class="text" style="font-weight: bolder;text-align: justify;color:yellow;">ERoSa <b style="text-transform:lowercase;">is a solution that notifies approaching drivers in advance, about existing breakdowns before they arrive at a scene</b><br></i>
              <?php if(!$plate_no){?>
            <a style="margin-top:1em;" class="push" href="<?php echo base_url('manager/login_form');?>">Get Started</a>

            <?php }?>             
          </header>        
        
        </div>
      </div>
    </div><!-- /container -->
  
<footer class="footer w3-food-wine">
  
</footer>
</body>
  <?php include 'erosa_footer.php';?>


    <script src="<?php echo base_url('assets/js/classie.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script>
      (function() {
        new Slideshow( document.getElementById( 'slideshow-1' ) );
        setTimeout( function() {
          new Slideshow( document.getElementById( 'slideshow-2' ) );
        }, 1750 );

        /* Mockup responsiveness */
        var body = docElem = window.document.documentElement,
          wrap = document.getElementById( 'wrap' ),
          mockup = wrap.querySelector( '.mockup' ),
          mockupWidth = mockup.offsetWidth;

        scaleMockup();

        function scaleMockup() {
          var wrapWidth = wrap.offsetWidth,
            val = wrapWidth / mockupWidth;

          mockup.style.transform = 'scale3d(' + val + ', ' + val + ', 1)';
        }
        
        window.addEventListener( 'resize', resizeHandler );

        function resizeHandler() {
          function delayed() {
            resize();
            resizeTimeout = null;
          }
          if ( typeof resizeTimeout != 'undefined' ) {
            clearTimeout( resizeTimeout );
          }
          resizeTimeout = setTimeout( delayed, 50 );
        }

        function resize() {
          scaleMockup();
        }
      })();

      // Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  var y = document.getElementById("navDemos");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    y.className = x.className.replace(" w3-show", "");
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}function myFunctions() {
  var y = document.getElementById("navDemo");
  var x = document.getElementById("navDemos");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    y.className = x.className.replace(" w3-show", "");
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
    </script>
  </body>
</html>

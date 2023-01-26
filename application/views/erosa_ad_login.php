
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
    
</div>
</div>


		 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-16" style="margin-top:46px" id="">
    <p style="font-size: 20px;font-weight: bolder;" class="w3-wide">MANAGEMENT LOGIN PANEL</p>    
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="w3-food-wine top-content-style">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/mgt_login');?>" method="post">
					<p class="legend"><?php if(isset($after_register)){echo $after_register;}else{echo 'Login Here';} ?><span class="fa fa-hand-o-down"></span></p>
					<div class="input">
						<input type="text" placeholder="E-mail" name="mail" required />
						<span class="fa fa-envelope"></span>
					</div>

					<div class="input">
						<input type="password" placeholder="Password" name="password"  required />
						<span class="fa fa-key"></span>
					</div>

					<?php if($this->session->flashdata('error_msg')){?> <p style="font-weight: bolder;"> 
          <?php echo $this->session->flashdata('error_msg');?> </p><?php }?>
		<p><button type="submit" class="w3-btn w3-margin-bottom w3-food-wine" name="mgt_login">Login</button></p>
		</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	

  </div>
</body>
  </div></div></body></html>
<?php require_once 'erosa_header2.php'; ?>

  <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-food-wine w3-hide w3-hide-large w3-top" style="margin-top:46px">
  <a href="<?php echo base_url('manager/register_breakdown');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">REGISTER BREAKDOWN</a>
  <a href="<?php echo base_url('manager/list_breakdown');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MY BREAKDOWN</a>
  <a href="<?php echo base_url('manager/default_tracking');?>" class="w3-bar-item w3-button w3-padding-large w3-hide-large">MY ROUTE</a>

  <a href="<?php echo base_url('manager/login_form');?>" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SIGN IN</a>
</div>

</div>


		 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-16" style="" id="">
    <p class="w3-wide">DRIVER REGISTRATION</p>
    
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/driver_registration');?>" method="post">
                    <p class="legend">Register Here<span class="fa fa-hand-o-down"></span></p>
                    
                    <div class="input">
                        <input type="text" placeholder="Vehicle Plate No" name="driver_plate_no" required />
                        <span class="fa fa-car"></span>
                    </div>
                    
                    <div class="input">
                        <input type="tel" placeholder="Mobile Number" name="driver_mobile" required />
                        <span class="fa fa-phone"></span>
                    </div>

                    <?php if($this->session->flashdata('error_msg')){?> <p style="font-weight: bolder;color:red;"> 
          <?php echo $this->session->flashdata('error_msg');?> </p><?php }?><br/>
          
                    <p><button type="submit" class="w3-btn w3-margin-bottom w3-food-wine" name="login">Register</button></p>
                </form>
		
		</form>

		<p><a href="<?php echo base_url('manager/login_form');?>" class="w3-btn w3-margin-bottom w3-food-wine w3-bottombar" name="login">Arleady Registered?</a></p>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	

  </div>

<footer class="footer w3-food-wine">
  
</footer>
</body>
  <?php include 'erosa_footer.php';?>
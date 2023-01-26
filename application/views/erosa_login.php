<?php require_once 'erosa_header2.php'; ?>

		 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-16" style="margin-top:46px" id="">
    <p class="w3-wide">DRIVER LOGIN</p>
    
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="w3-food-wine top-content-style">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/driver_login');?>" method="post">
					<p class="legend"><?php if(isset($after_register)){echo $after_register;}else{echo 'Login Here';} ?><span class="fa fa-hand-o-down"></span></p>
					<div class="input">
						<input type="text" placeholder="Vehicle Plate No" name="driver_plate_no" <?php if(isset($reg_plate)){?> value="<?php echo $reg_plate;?>"<?php } ?> required />
						<span class="fa fa-car"></span>
					</div>

					<?php if($this->session->flashdata('error_msg')){?> <p style="font-weight: bolder;color:red"> 
          <?php echo $this->session->flashdata('error_msg');?> </p><?php }?><br>
		<p><button type="submit" class="w3-btn w3-margin-bottom w3-food-wine" name="login">Login</button></p>
		</form>

		<p><a href="<?php echo base_url('manager/register_form');?>" class="w3-btn w3-margin-bottom w3-food-wine w3-bottombar" name="login">Not Registered?</a></p>
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
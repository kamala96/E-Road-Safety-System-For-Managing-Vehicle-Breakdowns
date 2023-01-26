<?php include 'erosa_header.php';?>
		 <!-- The breakdown registation form Section -->
  <body>
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">CHANGE VEHICLE PLATE NUMBER</p>
    
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/update_plate');?>" method="post">
                    <p class="legend"><?php if ($text) { echo $text;}?><span class="fa fa-hand-o-down"></span></p>
                    <p style="font-weight: bold;">Current Vehicle/Car Plate No.</p>
                    <div class="input">
                        <input type="text" value="<?php if(isset($current_plate)){ echo $current_plate;}?>" name="" />
                        <span class="fa fa-car"></span>
                    </div>
                    <p style="font-weight: bold;">Enter New Vehicle Plate Number</p>
                    <div class="input">
                        <input type="text" placeholder="Enter New Plate Number" name="change_plate" required />
                        <span class="fa fa-car"></span>
                    </div>          
                    <p><button type="submit" class="w3-btn w3-margin-bottom w3-food-wine" name="login">Save</button></p>
                </form>
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
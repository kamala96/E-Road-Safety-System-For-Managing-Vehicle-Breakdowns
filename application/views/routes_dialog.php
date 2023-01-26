<?php 
include 'erosa_header.php';?>
<style>
 
</style>
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">BREAKDOWN NOTIFICATIONS SERVICE</p>
	<?php if(!empty($get_routes)){?>
    <div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
<form action="<?php echo base_url('manager/tracking'); ?>" method="post">
	<p class="legend"> Select Your Route Here</p>
	<span class="fa fa-hand-o-down"></span>
		<div class="w3-row-padding">
			<select class="w3-input w3-select w3-border" name="break_route" required="">
				<option value="" disabled selected>Choose Route
				</option>
   				<?php foreach ($get_routes as $row) {?>
  				<option  value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?>  					
  				</option><?php } ?>
  			</select>
		</div>	<br>
		<button class="w3-btn w3-food-wine" name="register_break">Go</button></p>
</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div><?php }else { ?>
  <div>
    <span class="fa-stack fa-lg">
      <i class="fa fa-exclamation-triangle" style="color:#80013f;background-color:#fff;font-size: 24px;"></i>
    </span>No any route found 
    </div><?php } ?>
	

  </div>
  <?php include 'erosa_footer.php';?>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script type="text/javascript">
jQuery.fn.filterByText = function(textbox, selectSingleMatch) {
  return this.each(function() {
    var select = this;
    var options = [];
    $(select).find('option').each(function() {
      options.push({value: $(this).val(), text: $(this).text()});
    });
    $(select).data('options', options);
    $(textbox).bind('change keyup', function() {
      var options = $(select).empty().scrollTop(0).data('options');
      var search = $.trim($(this).val());
      var regex = new RegExp(search,'gi');

      $.each(options, function(i) {
        var option = options[i];
        if(option.text.match(regex) !== null) {
          $(select).append(
             $('<option>').text(option.text).val(option.value)
          );
        }
      });
      if (selectSingleMatch === true && 
          $(select).children().length === 1) {
        $(select).children().get(0).selected = true;
      }
    });
  });
};

$(function() {
  $('#select').filterByText($('#inputs'), true);
}); 
</script>


<?php require_once 'erosa_ad_header.php';?>
<style type="text/css">
  input[type=text], select {
  width: 100%;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #fff;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>

<div class="w3-margin-bottom w3-margin-top">

	<?php if($this->session->flashdata('success_msg')){?>
  <div class="w3-padding w3-panel w3-food-wine w3-display-container">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h4 class="w3-padding">Info!</h4>
  <p class="w3-padding"><?php echo $this->session->flashdata('success_msg'); ?></p>
</div><?php } ?>

<div style="margin-top: 13px;" class="w3-light-gray w3-border">

<div class="w3-row-padding">

<?php if(!empty($all_breakdowns)){?>
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" placeholder="Filter Route" id="myInput" onkeyup="myFunction()">
  </div>
  <div class="w3-third">
    <h2 align="center" style="font-weight: bold;font-size: 18px;padding-top: 14px;">Current Breakdown Scenes
    </h2>
  </div>
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" placeholder="Filter Vehicle" id="myInput2" onkeyup="myFunction2()">
  </div>
</div>		
	</div>  

<div class="w3-responsive">
  <table class="w3-table-all w3-card" id="myTable">
    <thead>
      <tr class="w3-white">
        <th class="w3-food-wine">#</th>
        <th class="w3-food-wine">Route</th>
        <th class="w3-food-wine">Vehicle</th>
        <th class="w3-food-wine">Reason</th>
        <th class="w3-food-wine">Phone</th>
        <th class="w3-food-wine">Posted-On</th>
        <th class="w3-food-wine">Action</th>
      </tr>
    </thead>
<?php foreach ($all_breakdowns as $row) { STATIC $i;$i++;?>
   
    <tr class="w3-hover-green">
      <td><?php echo $i;?></td>
      <td><?php echo $row['route_name'];?></td>
      <td><?php echo $row['driver_plate_no'];?></td>
      <td><?php echo $row['break_type'];?></td>
      <td><?php echo $row['driver_mobile'];?></td>
      <td><?php echo date('d-m-y h:i:sa',strtotime($row['break_start']));?></td>
      <td>
      	<button class="w3-button w3-small w3-text-large w3-food-wine" onclick="window.location.href='<?php echo base_url('manager/terminate_breakdown').'?id='.$row['break_id'];?>'" style="font-weight:bolder">Terminate</button>
      </td>
    </tr>
  <?php }?>
  </table>
</div>


  <div id="pagination">
	<ul class="tsc_pagination">
		<?php foreach ($links as $link) {
		echo "<li>". $link."</li>";
		} ?>
	</ul>
	</div>
<?php } else{?>
	<div>
		<span class="fa-stack fa-lg">
  		<i class="fa fa-exclamation-triangle" style="color:#80013f;background-color:#fff;font-size: 24px;"></i>
		</span>No any breakdown scene found 
		</div><?php } ?>
</div>

<?php  require_once 'erosa_ad_footer.php';?>

<script>

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


</script>
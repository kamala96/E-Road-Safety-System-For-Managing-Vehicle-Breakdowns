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

<div class="w3-margin-bottom w3-margin-top" >

<div style="margin-top: 13px;" class="w3-light-gray w3-border">

<div class="w3-row-padding">

<?php if(!empty($all_breakdowns)){?>
  <div class="w3-half">
    <h2 align="center" style="font-weight: bold;font-size: 18px;padding-top: 14px;">Breakdown Archives
    </h2>
  </div>

  <div class="w3-half">
    <input class="w3-input w3-border" type="text" placeholder="Search Route" id="myInput2" onkeyup="myFunction2()">
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
      </tr>
    </thead>
<?php foreach ($all_breakdowns as $row) { STATIC $i;$i++;?>
   
    <tr class="w3-hover-green">
      <td><?php echo $i;?></td>
      <td><?php echo $row['route_name'];?></td>
      <td><?php echo $row['driver_plate_no'];?></td>
      <td><?php echo $row['break_type'];?></td>
      <td><?php echo $row['driver_mobile'];?></td>
      <td><?php echo date('d-m-y h:i:sa',strtotime($row['break_start']));?>
      	
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
	<span class="fa-stack fa-lg">
  		<i class="fa fa-exclamation-triangle" style="color:#80013f;background-color:#fff;font-size: 24px;"></i>
</span>No any breakdown archive found <?php }?>
</div>

<?php  require_once 'erosa_ad_footer.php';?>

<script>

function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
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


</script>
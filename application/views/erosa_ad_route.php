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



* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #80013f;
  color: #fff;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 2;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

<div class="w3-margin-bottom w3-margin-top" >

<?php if($this->session->flashdata('success_msg')){?>
  <div class="w3-padding w3-panel w3-food-wine w3-display-container">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h4 class="w3-padding">Info!</h4>
  <p class="w3-padding"><?php echo $this->session->flashdata('success_msg'); ?></p>
</div><?php } ?>


<div id="driverTable">
<div style="margin-top: 13px;" class="w3-light-gray w3-border">

<div class="w3-row-padding">

<?php if(!empty($all_routes)){?>
  <div class="w3-third">
    <input style="width: 100%;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #fff;
  border-radius: 4px;
  box-sizing: border-box;" class="w3-input w3-border" type="text" placeholder="Filter Route" id="myInput" onkeyup="myFunction()">
  </div>
  <div class="w3-third">
    <h2 align="center" style="font-weight: bold;font-size: 18px;padding-top: 14px;">Available Routes
    </h2>
  </div>
  <div class="w3-third">
    <button onclick="openForm()" style="margin-top: 8px;" class="w3-button w3-food-wine w3-ripple w3-right w3-large">Add Route</button>
  </div>
</div>		
	</div>  
<div class="w3-responsive">
  <table class="w3-table-all w3-card" id="myTable">
    <thead>
      <tr class="w3-white">
        <th class="w3-food-wine">#</th>
        <th class="w3-food-wine">Name</th>
        <th class="w3-food-wine">Total Breakdowns</th>
        <th class="w3-food-wine">Action</th>
      </tr>
    </thead>
<?php foreach ($all_routes as $row) { STATIC $i;$i++;?>
   
    <tr class="w3-hover-green">
      <td><?php echo $i;?></td>
      <td><?php echo $row['route_name'];?></td>
      <td><?php echo $row['total'];?></td>
      <td>
      	<button class="w3-button w3-small w3-text-large w3-food-wine" onclick="window.location.href='<?php echo base_url('manager/remove_route').'?id='.$row['route_id'];?>'" style="font-weight:bolder">Remove</button>
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
	<div id="noRoute" class="w3-row-padding">
    <div class="w3-half w3-left">
    <span class="fa-stack fa-lg">
      <i class="fa fa-exclamation-triangle" style="color:#80013f;background-color:#fff;font-size: 24px;"></i>
    </span>No any route record found 
    </div>

    <div class="w3-half w3-right">
     <button onclick="openForm2()" style="margin-top: 2px;" class="w3-button w3-food-wine w3-ripple w3-right w3-large">Add Route</button> 
    </div><?php } ?>
</div>
</div>

<!-- ADD DRIVER FORM-->
<div id="addDriver" class="w3-card" style="margin-top: 13px;display: none;">

<form method="post" action="<?php echo base_url('manager/route_mgtregistration');?>">
<div class="w3-padding w3-panel w3-food-wine w3-display-container">
  <h4 class="w3-padding w3-center">Route Registration Form</h4>
</div>
  <div class="container">
    <p>Please fill in this form to create a new route.</p>
    <hr>
    <label for="route_name"><b>Route Name</b></label>
    <input type="text" placeholder="Example - (Moro - Dar)" name="route_name" required>
    <hr>
    <button type="submit" class="registerbtn">Register</button>
  </div>
</form>
</div>



<?php require_once 'erosa_ad_footer.php';?>
<script type="text/javascript">
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

// Toggle between showing and hiding the driver form
function openForm() {
  x = document.getElementById('addDriver');
  y = document.getElementById('driverTable');
  if (x.style.display === 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
    y.style.display = 'none';
  }
}
function openForm2() {
  x = document.getElementById('addDriver');
  y = document.getElementById('noRoute');
  if (x.style.display === 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
    y.style.display = 'none';
  }
}
</script>
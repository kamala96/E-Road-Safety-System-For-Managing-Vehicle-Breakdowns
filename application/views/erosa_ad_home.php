<?php require_once 'erosa_ad_header.php';?>

  <div class="w3-row-padding w3-margin-bottom w3-margin-top">
    <div class="w3-quarter">
      <div class="w3-container w3-food-wine w3-padding-16 w3-card top">
        <div class="w3-left"><i class="fas fa-car-crash w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="break_cr">null</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Current Breakdowns</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-food-wine w3-padding-16 w3-card top">
        <div class="w3-left"><i class="fa fa-envelope w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="recent_note">null</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>New Mails</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-food-wine w3-padding-16 w3-card top">
        <div class="w3-left"><i class="fas fa-car-crash w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="break_td">null</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Breakdowns</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-food-wine w3-text-white w3-padding-16 w3-card top">
        <div class="w3-left"><i class="fa fa-car w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="drivers_tt">null</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Drivers</h4>
      </div>
    </div>
  </div>

  <div class="w3-container" style="margin-bottom: 4px;" >
  
  <h2 align="center" class="w3-food-wine" style="font-weight: bold;font-size: 18px;padding-top: 6px;padding-bottom: 6px;">Trending Countryside Routes</h2>
  <?php if(!empty($routes)){?>
  <table class="w3-table-all w3-card">
    <thead>
      <tr class="w3-white">
        <th class="w3-food-wine">#</th>
        <th class="w3-food-wine">Route</th>
        <th class="w3-food-wine">Total Breakdowns</th>
      </tr>
    </thead>

    <?php foreach ($routes as $row) {STATIC $i;$i++;?>
    <tr class="w3-hover-gray">
      <td><?php echo $i;?></td>
      <td><?php echo $row['route_name'];?></td>
      <td><?php echo $row['total'];?></td>
    </tr>
   <?php } ?>
  </table>
<?php }else{ ?>
  <div>
    <span class="fa-stack fa-lg">
      <i class="fa fa-exclamation-triangle" style="color:#80013f;background-color:#fff;font-size: 24px;"></i>
    </span>No any trending route found 
    </div><?php } ?>
</div>

<?php require_once 'erosa_ad_footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<script>
  window.addEventListener("load", myInit, true); 

  function myInit(){  
    ajaxcall();
    ajaxcall2();
    ajaxcall3();
    ajaxcall4();
           };

function ajaxcall() { 
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (xhttp.readyState == 4 && xhttp.status == 200) {
       json_object = JSON.parse(xhttp.responseText)
       var count = json_object.count
       document.getElementById("break_cr").innerHTML = count;
       /// set this count variable in element where you want to
       /// display count
   }
   };
   xhttp.open("GET", "<?php echo base_url('manager/breakdown_cr');?>", true);
   xhttp.send();
   setTimeout(ajaxcall, 1000)
 }

 function ajaxcall2() { 
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (xhttp.readyState == 4 && xhttp.status == 200) {
       json_object = JSON.parse(xhttp.responseText)
       var count = json_object.count
       document.getElementById("break_td").innerHTML = count;
       /// set this count variable in element where you want to
       /// display count
   }
   };
   xhttp.open("GET", "<?php echo base_url('manager/breakdown_tb');?>", true);
   xhttp.send();
   setTimeout(ajaxcall2, 1000)
 }

 function ajaxcall3() { 
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (xhttp.readyState == 4 && xhttp.status == 200) {
       json_object = JSON.parse(xhttp.responseText)
       var count = json_object.count
       document.getElementById("drivers_tt").innerHTML = count;
       /// set this count variable in element where you want to
       /// display count
   }
   };
   xhttp.open("GET", "<?php echo base_url('manager/drivers_total');?>", true);
   xhttp.send();
   setTimeout(ajaxcall3, 1000)
 }
 
 function ajaxcall4() { 
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (xhttp.readyState == 4 && xhttp.status == 200) {
       json_object = JSON.parse(xhttp.responseText)
       var count = json_object.count
       document.getElementById("recent_note").innerHTML = count;
       /// set this count variable in element where you want to
       /// display count
   }
   };
   xhttp.open("GET", "<?php echo base_url('manager/notification_last_access');?>", true);
   xhttp.send();
   setTimeout(ajaxcall4, 1000)
 }


 </script>
  
 
  

  
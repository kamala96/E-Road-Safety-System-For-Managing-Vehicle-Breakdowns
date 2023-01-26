<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
header("Refresh: 60;url=");
include 'erosa_header.php';

  if(!$route) {
    redirect('manager/track_breakdown');
  }

  ?>
  
  <script type="text/javascript">
        /** Converts numeric degrees to radians */
if (typeof(Number.prototype.toRad) === "undefined") {
  Number.prototype.toRad = function() {
    return this * Math.PI / 180;
  }
}

function getLocation() {
 window.navigator.geolocation.getCurrentPosition(function(pos) {
  console.log(pos); 
  //distance btn them
var lon1 = pos.coords.longitude;
var lat1 = pos.coords.latitude;

 //alert(breakdown_id);
 //movement_updates(lon1,lat1,breakdown_id);
 $.ajax({
      url: '<?php echo base_url('manager/update_movement');?>',
      type: 'post',
      data: 'long='+lon1+'&lat='+lat1,
      success: function(output) 
      {
          //alert('success, server says '+output);
         // document.getElementById("hidebefore").style.display = "block";
          
      }, error: function()
      {
          alert('something went wrong');
      }
   });
      
    
    
},showError,{maximumAge: 0, timeout: 5000, enableHighAccuracy: true});

}


function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      window.alert('Accessing GPS - Permission Denied.');
      window.location.href = "<?php echo base_url('');?>";
      break;
    case error.POSITION_UNAVAILABLE:
      window.alert('GPS Position Unavailable.');
      window.location.href = "<?php echo base_url('');?>";
      break;
    case error.TIMEOUT:
       window.alert('Timeout. Turn On GPS');
      window.location.href = "<?php echo base_url('');?>";
      break;
    case error.UNKNOWN_ERROR:
       window.alert('Unknow Error.');
      window.location.href = "<?php echo base_url('');?>";
      break;
  }
}

getLocation();
</script>

  <div id="hidebefore" style ="">
   <div style="margin-top: 3em;" class="w3-bar w3-border">
    <button onclick="window.location.href='<?php echo base_url('manager/stopservice');?>'" class="w3-bar-item w3-button w3-food-wine w3-border" style="width:50%">CHANGE ROUTE</button>
     <button onclick = "window.location.href='<?php echo base_url('');?>'" href="" class="w3-bar-item w3-button w3-food-wine w3-border" style="width:50%">STOP NOTIFICATIONS</button>
</div>


  <div class="w3-row-padding" style="margin-top: 1em;" id="plans box">

        <div class="w3-panel w3-pale-blue w3-topbar w3-border-red w3-bottombar w3-border-red">
        <h3 style="font-weight:bolder;">PLEASE DO NOT LEAVE THIS PAGE</h3>
        <p>Voice updates are coming. You will not receive vehicle breakdowns notification if you leave this page.</p>
        <h5 style="font-weight:bolder;">TURN ON YOUR PHONE GPS LOCATION</h5>
        </div>
  

    <table class="w3-table-all w3-card-4 w3-centered">
      <thead>
       <h4 style="text-align:center;font-weight:bolder;">BREAKDOWN UPDATES [<?php echo $route_name['route_name'];?>]</h4>
      </thead>
    <tr>
      <th class="w3-food-wine">#</th><!--
      <th class="w3-food-wine">Vehicle PlateNo</th>
      <th class="w3-food-wine">Breakdown Reason</th>-->
      <th class="w3-food-wine">Distance Left</th>
    </tr>
 <?php 
 
// echo $movements['watch_list_lat'].$movements['watch_list_lon'];
 $moving_latitude = @$movements['watch_list_lat'];
 $moving_longtude = @$movements['watch_list_lon'];
 
 $coords = [];
 foreach ($route_breakdown as $row) {
    //$date = $row['break_start'];
    //$date = date("F j, Y, g:i a", strtotime($date));
    STATIC $i = 0;
    $i++;
    
    //$lat[] = $row['break_latitude'];
  // convert from degrees to radians
  $latFrom = deg2rad($moving_latitude);
  $lonFrom = deg2rad($moving_longtude);
  $latTo = deg2rad($row['break_latitude']);
  $lonTo = deg2rad($row['break_longtude']);

  $earthRadius = 6371000;

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  $distance = $angle * $earthRadius;
  $distance = $distance / 1000; //meters to km
  $distance = number_format((float)$distance, 1, '.', '');
  
  $coords[] = array('lat' => $moving_latitude,
                    'lon' => $moving_longtude,
                    'breakdown_id' => $row['break_id'],
                    'distance' => $distance
                    );
  
 if($distance <= 10.1 && $distance >=9.9){//10 km?>

    <script type="text/javascript">
          var audio = new Audio('<?php echo base_url('assets/voices/ahead.mp3');?>');
          audio.loop = false;
          audio.play();
    </script>

  <?php }elseif($distance <= 5.1 && $distance >=4.9){//5 km?>

    <script type="text/javascript">
          var audio = new Audio('<?php echo base_url('assets/voices/5km.mp3');?>');
          audio.loop = false;
          audio.play();
    </script>

  <?php }elseif($distance <= 3.1 && $distance >=2.9){//3 km?>

    <script type="text/javascript">
          var audio = new Audio('<?php echo base_url('assets/voices/3km.mp3');?>');
          audio.loop = false;
          audio.play();
    </script>

  <?php }elseif($distance <= 2.1 && $distance >=1.9){?>

    <script type="text/javascript">
          var audio = new Audio('<?php echo base_url('assets/voices/2km.mp3');?>');
          audio.loop = false;
          audio.play();
    </script>
    
  <?php }elseif($distance <= 1.1 && $distance >=0.9){?>
    
    <script type="text/javascript">
          var audio = new Audio('<?php echo base_url('assets/voices/1km.mp3');?>');
          audio.loop = false;
          audio.play();
    </script>

  <?php }elseif($distance <= 0.55 && $distance >=0.42){?>
   
    <script type="text/javascript">
          var audio = new Audio('<?php echo base_url('assets/voices/500m.mp3');?>');
          audio.loop = false;
          audio.play();
    </script>

  <?php }else{}
    ?>
  
    
    <tr>
      <td><?php echo $i;?></td><!--
      <td></td>
      <td></td>-->
      <td><?php echo $distance;?> km</td>
    </tr><?php  } ?>
  </table>
    </div>

  
    <!-- bar list -->
  <!-- Grid -->    
  </div>
  <?php include 'erosa_footer.php';?>
  
  <script type="text/javascript">

    var coords = <?php echo json_encode($coords);?>;
    for(var key in coords)
    {
        var lat = +coords[key].lat;
        var long = +coords[key].lon;
        var breakdown_id = coords[key].breakdown_id;
        var distance = coords[key].distance;
        
       $.ajax({
      url: '<?php echo base_url('manager/movement_to_breakdown');?>',
      type: 'post',
      data: {long: long, lat: lat, break_id: breakdown_id, distance: distance},
      //data: {break_id: breakdown_id},
      error: function() {
              alert('Something is wrong');
           },
         success: function(data) {
                //$("tbody").append("<tr><td>"+title+"</td><td>"+description+"</td></tr>");
                //alert("Record added successfully");  
           }
     
   });

    }
       
  
    
  </script>

 


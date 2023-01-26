<script type="text/javascript">
//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

      //b.style.display="block";  
      //c.style.display="block";
        b.value = position.coords.latitude;
      c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  switch (error.code) {
    case error.TIMEOUT:
      alert("Location error !\n\nTimeout.");
      break;
    case error.PERMISSION_DENIED:
      if(error.message.indexOf("Only secure origins are allowed") == 0) {
        tryAPIGeolocation();
      }
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location error !\n\nPosition unavailable please turn on your GPS location.");
      
      break;
  }
};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>

<?php include 'erosa_header.php';?>
<body onload="" id="showDiv" style="display: none;">
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">BREAKDOWN REGISTRATION</p>
   <?php if(!empty($get_routes)){?> 
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/break_insert'); ?>" method="post">
					<p class="legend"> Register Your Breakdown Here<span class="fa fa-hand-o-down"></span>

<div class="w3-row-padding">
  <select class=" w3-input w3-select w3-border" name="break_route" required="">
    <option value="" disabled selected>Choose Route</option>
    <?php foreach ($get_routes as $row) {?>
  	<option  value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php } ?>
  </select>
</div>	

			<div class="input">
				<input id="lat" type="text" value="" name="break_latitude" style="display: none;" required readonly/>
				<span class="fa fa-compass"></span>
			</div>

			<div class="input">
				<input id="long" type="text" value="" name="break_longtude" style="display: none;" required readonly />
				<span class="fa fa-compass"></span>
			</div>



			<div class="input">
				<input type="text" placeholder="Breakdown Type" name="break_type" required />
				<span class="fas fa-car-crash" style='font-size:17px'></span>
			</div> 

			<?php if($this->session->flashdata('error_msg')){?>
			<p style="font-weight: bold;color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p> <?php } ?>
			<p><button class="w3-btn w3-food-wine" name="register_break">Register</button></p>
		</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	<?php }?>

  </div>

<footer class="footer w3-food-wine">
  
</footer>
</body>
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


//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

     	//b.style.display="block";  
  		//c.style.display="block";
   	    b.value = position.coords.latitude;
  		c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
 <script type="text/javascript">
//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

      //b.style.display="block";  
      //c.style.display="block";
        b.value = position.coords.latitude;
      c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  switch (error.code) {
    case error.TIMEOUT:
      alert("Location error !\n\nTimeout.");
      break;
    case error.PERMISSION_DENIED:
      if(error.message.indexOf("Only secure origins are allowed") == 0) {
        tryAPIGeolocation();
      }
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location error !\n\nPosition unavailable please turn on your GPS location.");
      
      break;
  }
};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>

<?php include 'erosa_header.php';?>
<body onload="" id="showDiv" style="display: none;">
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">BREAKDOWN REGISTRATION</p>
   <?php if(!empty($get_routes)){?> 
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/break_insert'); ?>" method="post">
					<p class="legend"> Register Your Breakdown Here<span class="fa fa-hand-o-down"></span>

<div class="w3-row-padding">
  <select class=" w3-input w3-select w3-border" name="break_route" required="">
    <option value="" disabled selected>Choose Route</option>
    <?php foreach ($get_routes as $row) {?>
  	<option  value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php } ?>
  </select>
</div>	

			<div class="input">
				<input id="lat" type="text" value="" name="break_latitude" style="display: none;" required readonly/>
				<span class="fa fa-compass"></span>
			</div>

			<div class="input">
				<input id="long" type="text" value="" name="break_longtude" style="display: none;" required readonly />
				<span class="fa fa-compass"></span>
			</div>



			<div class="input">
				<input type="text" placeholder="Breakdown Type" name="break_type" required />
				<span class="fas fa-car-crash" style='font-size:17px'></span>
			</div> 

			<?php if($this->session->flashdata('error_msg')){?>
			<p style="font-weight: bold;color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p> <?php } ?>
			<p><button class="w3-btn w3-food-wine" name="register_break">Register</button></p>
		</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	<?php }?>

  </div>

<footer class="footer w3-food-wine">
  
</footer>
</body>
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


//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

     	//b.style.display="block";  
  		//c.style.display="block";
   	    b.value = position.coords.latitude;
  		c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
 <script type="text/javascript">
//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

      //b.style.display="block";  
      //c.style.display="block";
        b.value = position.coords.latitude;
      c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  switch (error.code) {
    case error.TIMEOUT:
      alert("Location error !\n\nTimeout.");
      break;
    case error.PERMISSION_DENIED:
      if(error.message.indexOf("Only secure origins are allowed") == 0) {
        tryAPIGeolocation();
      }
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location error !\n\nPosition unavailable please turn on your GPS location.");
      
      break;
  }
};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>

<?php include 'erosa_header.php';?>
<body onload="" id="showDiv" style="display: none;">
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">BREAKDOWN REGISTRATION</p>
   <?php if(!empty($get_routes)){?> 
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/break_insert'); ?>" method="post">
					<p class="legend"> Register Your Breakdown Here<span class="fa fa-hand-o-down"></span>

<div class="w3-row-padding">
  <select class=" w3-input w3-select w3-border" name="break_route" required="">
    <option value="" disabled selected>Choose Route</option>
    <?php foreach ($get_routes as $row) {?>
  	<option  value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php } ?>
  </select>
</div>	

			<div class="input">
				<input id="lat" type="text" value="" name="break_latitude" style="display: none;" required readonly/>
				<span class="fa fa-compass"></span>
			</div>

			<div class="input">
				<input id="long" type="text" value="" name="break_longtude" style="display: none;" required readonly />
				<span class="fa fa-compass"></span>
			</div>



			<div class="input">
				<input type="text" placeholder="Breakdown Type" name="break_type" required />
				<span class="fas fa-car-crash" style='font-size:17px'></span>
			</div> 

			<?php if($this->session->flashdata('error_msg')){?>
			<p style="font-weight: bold;color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p> <?php } ?>
			<p><button class="w3-btn w3-food-wine" name="register_break">Register</button></p>
		</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	<?php }?>

  </div>

<footer class="footer w3-food-wine">
  
</footer>
</body>
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


//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

     	//b.style.display="block";  
  		//c.style.display="block";
   	    b.value = position.coords.latitude;
  		c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  <script type="text/javascript">
//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

      //b.style.display="block";  
      //c.style.display="block";
        b.value = position.coords.latitude;
      c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  switch (error.code) {
    case error.TIMEOUT:
      alert("Location error !\n\nTimeout.");
      break;
    case error.PERMISSION_DENIED:
      if(error.message.indexOf("Only secure origins are allowed") == 0) {
        tryAPIGeolocation();
      }
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location error !\n\nPosition unavailable please turn on your GPS location.");
      
      break;
  }
};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>

<?php include 'erosa_header.php';?>
<body onload="" id="showDiv" style="display: none;">
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">BREAKDOWN REGISTRATION</p>
   <?php if(!empty($get_routes)){?> 
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/break_insert'); ?>" method="post">
					<p class="legend"> Register Your Breakdown Here<span class="fa fa-hand-o-down"></span>

<div class="w3-row-padding">
  <select class=" w3-input w3-select w3-border" name="break_route" required="">
    <option value="" disabled selected>Choose Route</option>
    <?php foreach ($get_routes as $row) {?>
  	<option  value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php } ?>
  </select>
</div>	

			<div class="input">
				<input id="lat" type="text" value="" name="break_latitude" style="display: none;" required readonly/>
				<span class="fa fa-compass"></span>
			</div>

			<div class="input">
				<input id="long" type="text" value="" name="break_longtude" style="display: none;" required readonly />
				<span class="fa fa-compass"></span>
			</div>



			<div class="input">
				<input type="text" placeholder="Breakdown Type" name="break_type" required />
				<span class="fas fa-car-crash" style='font-size:17px'></span>
			</div> 

			<?php if($this->session->flashdata('error_msg')){?>
			<p style="font-weight: bold;color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p> <?php } ?>
			<p><button class="w3-btn w3-food-wine" name="register_break">Register</button></p>
		</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	<?php }?>

  </div>

<footer class="footer w3-food-wine">
  
</footer>
</body>
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


//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

     	//b.style.display="block";  
  		//c.style.display="block";
   	    b.value = position.coords.latitude;
  		c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
 <script type="text/javascript">
//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

      //b.style.display="block";  
      //c.style.display="block";
        b.value = position.coords.latitude;
      c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  switch (error.code) {
    case error.TIMEOUT:
      alert("Location error !\n\nTimeout.");
      break;
    case error.PERMISSION_DENIED:
      if(error.message.indexOf("Only secure origins are allowed") == 0) {
        tryAPIGeolocation();
      }
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location error !\n\nPosition unavailable please turn on your GPS location.");
      
      break;
  }
};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>

<?php include 'erosa_header.php';?>
<body onload="" id="showDiv" style="display: none;">
	 <!-- The breakdown registation form Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="" id="">
    <p class="w3-wide">BREAKDOWN REGISTRATION</p>
   <?php if(!empty($get_routes)){?> 
	<div class="main-bg" style="margin-top: 0em;">
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style w3-food-wine">
					<img src="<?php echo base_url('assets/images/user1.png');?>" alt="" />
				</div>
				<form action="<?php echo base_url('manager/break_insert'); ?>" method="post">
					<p class="legend"> Register Your Breakdown Here<span class="fa fa-hand-o-down"></span>

<div class="w3-row-padding">
  <select class=" w3-input w3-select w3-border" name="break_route" required="">
    <option value="" disabled selected>Choose Route</option>
    <?php foreach ($get_routes as $row) {?>
  	<option  value="<?php echo $row['route_id'];?>"><?php echo $row['route_name'];?></option><?php } ?>
  </select>
</div>	

			<div class="input">
				<input id="lat" type="text" value="" name="break_latitude" style="display: none;" required readonly/>
				<span class="fa fa-compass"></span>
			</div>

			<div class="input">
				<input id="long" type="text" value="" name="break_longtude" style="display: none;" required readonly />
				<span class="fa fa-compass"></span>
			</div>



			<div class="input">
				<input type="text" placeholder="Breakdown Type" name="break_type" required />
				<span class="fas fa-car-crash" style='font-size:17px'></span>
			</div> 

			<?php if($this->session->flashdata('error_msg')){?>
			<p style="font-weight: bold;color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p> <?php } ?>
			<p><button class="w3-btn w3-food-wine" name="register_break">Register</button></p>
		</form>
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		
		<!-- //copyright -->
	</div>
	<?php }?>

  </div>

<footer class="footer w3-food-wine">
  
</footer>
</body>
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


//get location
//var a = document.getElementById("demo");
var b = document.getElementById("lat");
var c = document.getElementById("long");
var d = document.getElementById("showDiv");


  var apiGeolocationSuccess = function(position) {

     	//b.style.display="block";  
  		//c.style.display="block";
   	    b.value = position.coords.latitude;
  		c.value = position.coords.longitude;


    alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDCa1LUe1vOczX1hO_iGYgyo8p_jYuGOPU", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
  })
  .fail(function(err) {
    alert("API Geolocation error! \n\n"+err);
  });
};

var browserGeolocationSuccess = function(position) {
  b.value = position.coords.latitude;
  c.value = position.coords.longitude;
  d.style.display = "block"; 
  b.style.display="none";  
  c.style.display="none";

    alert("Location success!" );
};

var browserGeolocationFail = function(error) {
  switch (error.code) {
    case error.TIMEOUT:
      window.alert("Location error !\n\nTimeout, Turn On GPS.");
      window.location.href = "<?php echo base_url('');?>";
      break;
    case error.PERMISSION_DENIED:
      if(error.message.indexOf("Only secure origins are allowed") == 0) {
        tryAPIGeolocation();
      }
      break;
    case error.POSITION_UNAVAILABLE:
      window.alert("Location error !\n\nPosition Unavailable");
      window.location.href = "<?php echo base_url('');?>";
      break; 
      
    case error.UNKNOWN_ERROR:
      window.alert("Location error !\n\nUnknown Error");
      window.location.href = "<?php echo base_url('');?>";
      break;
  }
};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 0, timeout: 5000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>


};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 0, timeout: 5000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>


};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 0, timeout: 5000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>


};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 0, timeout: 5000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>


};

var tryGeolocation = function() {

  b.style.display="block";  
  c.style.display="block";
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        browserGeolocationSuccess,
      browserGeolocationFail,
      {maximumAge: 0, timeout: 5000, enableHighAccuracy: true});
  }
};

tryGeolocation();
</script>


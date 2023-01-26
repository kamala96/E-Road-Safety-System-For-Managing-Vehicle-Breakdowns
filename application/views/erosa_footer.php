<footer id="footer" class="footer w3-food-wine">
  <div class="w3-bar w3-border">
  <button onclick = "window.location.href='javascript:history.go(-1)'" class="w3-bar-item w3-button w3-food-wine" style="width:25%" title="Back"><i class="fa fa-arrow-circle-left w3-xlarge"></i></button>
  <button onclick = "window.location.href='<?php echo base_url('');?>'" href="" class="w3-bar-item w3-button w3-food-wine" style="width:25%" title="Home"><i class="fa fa-home w3-xlarge"></i></button>
  <button onclick = "window.location.href='javascript:history.go(0)'" class="w3-bar-item w3-button w3-food-wine" style="width:25%" title="Refresh"><i class="fa fa-refresh w3-xlarge"></i></button>
  <button onclick = "window.location.href='javascript:history.go(1)'" class="w3-bar-item w3-button w3-food-wine" style="width:25%" title="Next"><i class="fa fa-arrow-circle-right w3-xlarge"></i></button>
</div>
  
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<script language="JavaScript" type="text/javascript">
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  var y = document.getElementById("navDemos");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    y.className = x.className.replace(" w3-show", "");
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}function myFunctions() {
  var y = document.getElementById("navDemo");
  var x = document.getElementById("navDemos");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    y.className = x.className.replace(" w3-show", "");
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
</body>
</html>
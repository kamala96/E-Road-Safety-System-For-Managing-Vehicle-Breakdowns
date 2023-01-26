<!-- Footer -->
  <footer id="footer" class="w3-container w3-padding-16 w3-food-wine">
    <h4></h4>
    <p><a href="#" ></a></p>
  </footer>

  <!-- End page content -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Toggle between showing and hiding the breakdown dropdowns
function openBlinks() {
  x = document.getElementById('breakLinks')
  if (x.style.display === 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
  }
}

// Toggle between showing and hiding the drivers menus
function openDlinks() {
  x = document.getElementById('driverLinks')
  if (x.style.display === 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
  }
}

// Toggle between showing and hiding the routes menus
function openRlinks() {
  x = document.getElementById('routeLinks')
  if (x.style.display === 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>

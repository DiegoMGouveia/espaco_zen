<!DOCTYPE html>
<html>
<body>

<h2>Sizes:</h2>

<p id="screen"></p>
<p id="window"></p>
<p id="page"></p>

<script>

// Get the size of the device screen
var screenWidth = screen.width;
var screenHeight = screen.height;

// Get the browser window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;

// Get the size of the entire webpage
const pageWidth  = document.documentElement.scrollWidth;
const pageHeight = document.documentElement.scrollHeight;

// Showing the sizes on the webpage
var x = document.getElementById("screen");
x.innerHTML = "Device Screen: width: " + screenWidth + ", height: " + screenHeight + ".";

var y = document.getElementById("window");
y.innerHTML = "Browser Window: width: " + windowWidth + ", height: " + windowHeight + ".";

var z = document.getElementById("page");
z.innerHTML = "Webpage: width:" + pageWidth + ", height: " + pageHeight + ".";

</script>
</body>
</html>
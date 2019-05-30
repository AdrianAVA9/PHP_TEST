<!DOCTYPE html>
<html>
  <head>
    <title>XSS</title>
    <script src="jquery-3.1.0.min.js"></script>
	<script>
	var output = "";
	<?php
	if (isset($_GET['q'])) {
 	  printf('output = "%s";', $_GET['q']);
	}
	?>
	
	$(function()  {
	  $("#output").html(output);
	});
	</script>
  </head>
  <body>
    <p id="output"></p>
  </body>
</html>
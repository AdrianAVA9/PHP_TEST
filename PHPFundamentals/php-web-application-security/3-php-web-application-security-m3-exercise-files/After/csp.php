<?php
  $nonce = uniqid();
  header("Content-Security-Policy: default-src 'self' 'nonce-$nonce'");
?><!DOCTYPE html>
<html>
  <head>
    <title>CSP</title>
	<script nonce="<?php echo $nonce; ?>">
	alert(1);
	</script>
  </head>
  <body>
    <ul style="color: orange;">
	  <li>Item 1</li>
	  <li>Item 2</li>
	</ul>
  </body>
</html>
<?php
    if (isset($_GET['setHeader']) &&
	    $_GET['setHeader'] === '1') {
	    header('X-FRAME-OPTIONS: DENY');	
    }

?><!DOCTYPE html>
<html>
<head>
    <title>Frame</title>
</head>
<body>
    <h1>Frame Data</h1>
</body>
</html>

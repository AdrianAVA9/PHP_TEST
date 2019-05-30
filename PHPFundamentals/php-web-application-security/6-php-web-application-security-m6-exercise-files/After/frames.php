<!DOCTYPE html>
<html>
<head>
    <title>X-FRAME-OPTIONS</title>
	<style>
	    iframe {
	        width: 400px; height: 200px;
	    }
	</style>
</head>
<body>
    <iframe src="frame.php"></iframe>
    <iframe src="frame.php?setHeader=1"></iframe>
</body>
</html>

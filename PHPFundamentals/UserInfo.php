<?php
    session_start();

    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    $isAdmin = ($_SESSION['isAdmin'] == 1) ? "YES" : "NO";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        readfile('html_template/navigation.tmpl.html');
    ?>
    <h1>User Id: <?php echo $id?></h1><br>
    <h1>Username: <?php echo $username?></h1><br>
    <h1>User is admin: <?php echo $isAdmin?></h1><br>
</body>
</html>
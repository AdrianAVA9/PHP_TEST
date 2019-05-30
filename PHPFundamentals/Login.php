<?php
        include 'Repository/ProfileRepository.php';

        //session_start();

        $username = '';
        $password = '';
        $message = '';
        $ok = true;

        if(!isset($_POST['username']) || $_POST['username'] === ''){
            $ok = false;
        }else{
            $username = $_POST['username'];
        }

        if(!isset($_POST['password']) || $_POST['password'] === ''){
            $ok = false;
        }else{
            $password = $_POST['password'];
        }

        if($ok){
            $userRepository = new ProfileRepository();
            $loginStatus = $userRepository->login($username, $password);

            if($loginStatus->status === 'successful'){
                header('Location: UserInfo.php');
            }else{
                $message =  $loginStatus->message;
            }  
        }else{
            $message = "Please complete the information";
        }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php echo "<p class='message'>$message</p>"?>
    <h1>Login</h1>
    <br>
    <form method="post" action="">
        username <input type="text" name="username" value"<?php 
        echo htmlspecialchars($username) 
        ?>"> <br>
        password <input type="password" name="password" value="<?php echo htmlspecialchars('') ?>"> <br>
        <input type="submit" value="sing in">
    </form>
</body>
</html>
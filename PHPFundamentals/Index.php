<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP Fundamentals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        Require 'Auth.php';
        include 'Repository/LanguageRepository.php';
        include 'Repository/ColorRepository.php';
        include 'Repository/UserRepository.php';

        $name = '';
        $password = '';
        $commets = '';
        $gender = '';
        $tc = '';
        $colorChoosen = '';
        $isAdmin = '';
        $languages = array();
         
        $repository = new LanguageRepository();
        $languagesToShow = $repository->getLanguages();

        $r = new ColorRepository();
        $colors = $r->getColors();

        if(isset($_POST['userdata'])){
            $ok = true;
            if(!isset($_POST['username']) || $_POST['username'] === ''){
                $ok =  false;
            }else{
                $name = $_POST['username'];
            }
            if(!isset($_POST['password']) || $_POST['password'] === ''){
                $ok =  false;
            }else{
                $password = $_POST['password'];
            }
            if(!isset($_POST['comments']) || $_POST['comments'] === ''){
                $ok =  false;
            }else{
                $commets = $_POST['comments'];
            }
            if(!isset($_POST['gender']) || $_POST['gender'] === ''){
                $ok =  false;
            }else{
                $gender = $_POST['gender'];
            }
            if(!isset($_POST['color']) || $_POST['color'] === ''){
                $ok =  false;
            }else{
                $colorChoosen = $_POST['color'];
            }
            if(isset($_POST['isAdmin'])){
                $isAdmin = $_POST['isAdmin'];
            }
            if(!isset($_POST['tc']) || $_POST['tc'] === ''){
                $ok =  false;
            }else{
                $tc = $_POST['tc'];
            }
            if(!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0){
                $ok =  false;
            }else{
                $languages = $_POST['languages'];
            }

            if($ok){
                $admin = ($isAdmin === 'ok') ? 1 : 0;
                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                $user = new User($name, $colorChoosen, $gender, $commets, $hashedpassword, $admin);
                $userRepository = new UserRepository();
                $result = $userRepository->CreateUser($user);

                if($result){
                    echo "User created successfully";
                }else{
                    echo "An error ocurred";
                }
            }
        }
    ?>

    <?php
        readfile('html_template/navigation.tmpl.html');
    ?>
    <h1>USER INFORMATION</h1>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?php
            echo htmlspecialchars($name);
        ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php
            echo htmlspecialchars($password);
        ?>">
        <br>
        <br>
        <label>Gender:</label>
        <br>
        <input type="radio" name="gender" value="f" <?php
            if($gender === 'f'){
                echo ' checked';
            }
        ?>>Female
        <input type="radio" name="gender" value="m" <?php
            if($gender === 'm'){
                echo ' checked';
            }
        ?>>Male
        <br>
        <br>
        <label>Favorite color:</label>
        <select name="color">
            <option value="">--</option>

            <?php foreach($colors as $color):?>
                <option value="<?=$color->hexadecimal?>"
                    <?php if($colorChoosen === $color->hexadecimal):?>
                        <?=htmlspecialchars(' selected=true')?>
                    <?php endif ?>>
                    <?=$color->name?>
                </option>
                
            <?php endforeach ?>
        </select>
        <br>
        <br>
        <label>Languages spoken:</label>
        <select multiple name="languages[]" size="3">
            <option value="">--</option>
            <?php foreach($languagesToShow as $language): ?>
                <option value="<?=htmlspecialchars($language->id)?>"
                    <?php if(in_array($language->id,$languages)):?>
                        <?=htmlspecialchars(' selected=true');?>
                    <?php endif?>>
                <?=htmlspecialchars($language->language)?></option>
            <?php endforeach ?>
        </select>
        <br>
        <br>
        <label>Comments:</label>
        <textarea name="comments"><?php
            echo htmlspecialchars($commets);
        ?></textarea>
        <br>
        <input type="checkbox" name="isAdmin" value="ok" <?php
            if($isAdmin === 'ok'){
                echo ' checked';
            }
        ?>>Is Admin
        <br>
        <br>
        <input type="checkbox" name="tc" value="ok" <?php
            if($tc === 'ok'){
                echo ' checked';
            }
        ?>>I accept the T&C
        <br>
        <input type="submit" name="userdata" value="Submit">
    </form>
</body>
</html>
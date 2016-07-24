<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$repassword = isset($_POST['repassword']) ? $_POST['repassword'] : '';
$errors = [];
$hashpassword = '';
$noerrors = true;


if (!empty($_POST) ) {

        preg_match('/^[a-z0-9_-]{3,16}$/',$username,$usernamematches);

        if (count($usernamematches) === 0) {
            $errors['invalidname'] = "Username must contain 'a-z' or '0-9' or '_' or '-'!  Length from 3 to 16!";

        }else {
            $errors['invalidname'] =  '';
        }

        preg_match('/^[a-z0-9_-]{6,18}$/',$password,$passwordmatches);
        preg_match('/^[a-z0-9_-]{6,18}$/',$repassword,$repasswordmatches);

        if (count($passwordmatches) === 0)  {
            $errors['invalidpass'] = "Password must contain 'a-z' or '0-9' or '_' or '-'!  Length from 8 to 16!";

        }else {
            $errors['invalidpass'] = '';
        }

        if (count($repasswordmatches) === 0) {
            $errors['invalidrepass'] = "Password must contain 'a-z' or '0-9' or '_' or '-'!  Length from 8 to 16!";

        }else {
            $errors['invalidrepass'] = '';
        }

        if ($password !== $repassword) {
            $errors['notmatchpass'] = "Passwords do not match !";
        }else {
            $errors['notmatchpass'] = '';
        }



        foreach ($errors as $val) {
            if ($val !== '') {
                $noerrors = false;
            }
        }

    }

    if (!empty($_POST)) {
        if ($noerrors) {
            if ($password === $repassword) {
                $hashpassword = password_hash($password, PASSWORD_BCRYPT);
                $hashpassword = password_hash($repassword, PASSWORD_BCRYPT);
            }
        }
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task2</title>
    <link rel="stylesheet" href="task2.css" type="text/css">
</head>
<body>
<form method="post">
    <span>Username:</span>
    <input type="text" name="username" value="<?= $username ?>">
    <?php if(!empty($errors) && !empty($_POST)) : ?>
    <p><?= $errors['invalidname']?></p>
    <?php endif;?>
    <span>Password:</span>
    <input type="password" name="password">
    <?php if(!empty($errors) && !empty($_POST)) : ?>
        <p><?= $errors['invalidpass']?></p>
    <?php endif;?>
    <span>Re-password:</span>
    <input type="password" name="repassword">
    <?php if(!empty($errors) && !empty($_POST)) : ?>
        <p><?= $errors['invalidrepass']?></p>
        <p><?= $errors['notmatchpass']?></p>
    <?php endif;?>
    <button type="submit">Send</button>
    <?php if(!empty($_POST) &&  $noerrors) : ?>
        <blockquote>Registration Succesfull!</blockquote>
        <blockquote>Name:<?= $username ?></blockquote>
        <blockquote>Password:<?= $hashpassword ?></blockquote>
    <?php endif;?>


</form>


</body>
</html>
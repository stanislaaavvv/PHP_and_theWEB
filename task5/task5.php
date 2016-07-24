<?php
$get1 = isset($_GET['get1']) ?  $_GET['get1'] : '';
$get2 = isset($_GET['get2']) ?  $_GET['get2'] : '';
$post1 = isset($_POST['post1']) ?  $_POST['post1'] : '';
$post2 = isset($_POST['post2']) ?  $_POST['post2'] : '';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task5</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task5.css" type="text/css">
</head>
<body>
    <form class="container" method="get">
        GET:
        <input class="get" name="get1">
        <input class="get" name="get2">
        <button type="submit">Send</button>

    </form>
    <?php if (!empty($_GET)) :?>
    <block>get1: <?= var_dump($get1)?></block>
    <block>get2: <?= var_dump($get2)?></block>
    <?php endif;?>
    <form class="container" method="post">
        POST:
        <input class="post" name="post1">
        <input class="post" name="post2">
        <button type="submit">Send</button>

    </form>
    <?php if (!empty($_POST)) :?>
        <block>post1: <?= var_dump($post1)?></block>
        <block>post2: <?= var_dump($post2)?></block>
    <?php endif;?>

</body>
</html>
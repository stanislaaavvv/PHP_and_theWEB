<?php
$get1 = isset($_GET['get1']) ?  $_GET['get1'] : '';
$get2 = isset($_GET['get2']) ?  $_GET['get2'] : '';
$get3 = isset($_GET['get3']) ?  $_GET['get3'] : '';
$get4 = isset($_GET['get4']) ?  $_GET['get4'] : '';
$get5 = isset($_GET['get5']) ?  $_GET['get5'] : '';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POST</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task9.css" type="text/css">
</head>
<body>

    <form action="task9_1.php" class="container" method="post">
        POST:
        <input class="post" name="post1">
        <input class="post" name="post2">
        <input class="post" name="post3">
        <input class="post" name="post4">
        <input class="post" name="post5">
        <button type="submit">Send</button>

    </form>
    <?php if (!empty($_GET)) :?>
        Parameters from task9_1.php:
        <block>get1: <?= var_dump($get1)?></block>
        <block>get2: <?= var_dump($get2)?></block>
        <block>get3: <?= var_dump($get3)?></block>
        <block>get4: <?= var_dump($get4)?></block>
        <block>get5: <?= var_dump($get5)?></block>
    <?php endif;?>

</body>
</html>

<?php


$post1 = isset($_POST['post1']) ?  $_POST['post1'] : '';
$post2 = isset($_POST['post2']) ?  $_POST['post2'] : '';
$post3 = isset($_POST['post3']) ?  $_POST['post3'] : '';
$post4 = isset($_POST['post4']) ?  $_POST['post4'] : '';
$post5 = isset($_POST['post5']) ?  $_POST['post5'] : '';



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GET</title>
    <link rel="stylesheet" href="task9.css" type="text/css">
</head>
<body>
    <form action="task9_2.php" class="container" method="get">
        GET:
        <input class="get" name="get1">
        <input class="get" name="get2">
        <input class="get" name="get3">
        <input class="get" name="get4">
        <input class="get" name="get5">
        <button type="submit">Send</button>

    </form>
    <?php if (!empty($_POST)) :?>
        Parameters from task9_2.php:
        <block>post1: <?= var_dump($post1)?></block>
        <block>post2: <?= var_dump($post2)?></block>
        <block>post3: <?= var_dump($post3)?></block>
        <block>post4: <?= var_dump($post4)?></block>
        <block>post5: <?= var_dump($post5)?></block>
    <?php endif;?>


</body>
</html>
<?php
$first = isset($_POST['1']) ? $_POST['1'] : '';
$second = isset($_POST['2']) ? $_POST['2'] : '';
$third = isset($_POST['3']) ? $_POST['3'] : '';
$fourth = isset($_POST['4']) ? $_POST['4'] : '';
$fifth = isset($_POST['5']) ? $_POST['5'] : '';
$sixth = isset($_POST['6']) ? $_POST['6'] : '';
$seventh = isset($_POST['7']) ? $_POST['7'] : '';
$eighth = isset($_POST['8']) ? $_POST['8'] : '';
$nineth = isset($_POST['9']) ? $_POST['9'] : '';
$tenth = isset($_POST['10']) ? $_POST['10'] : '';
$newarr = [];
$noerrors = true;
$max = -2000000000;
$min = 2000000000;
$stringarr = '';

if (!empty($_POST)) {

    foreach ($_POST as $val) {
        $newarr[] = $val;
    }

    foreach ($newarr as $value) {
        if (!is_numeric($value)) {
            $noerrors = false;
        }
    }
}

if (!empty($_POST) && $noerrors) {
    sort($newarr);
    $stringarr = implode(" ", $newarr);

        foreach ($newarr as $val) {

            if ($max < $val) {
                $max = $val;
            }
        }

        foreach ($newarr as $val) {
            if ($min > $val) {
                $min = $val;
            }
        }


}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task4</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task4.css" type="text/css">
</head>
<body>
<form id="container" method="post">
    Enter 10 numbers:
    <input type="text" name="1">
    <input type="text" name="2">
    <input type="text" name="3">
    <input type="text" name="4">
    <input type="text" name="5">
    <input type="text" name="6">
    <input type="text" name="7">
    <input type="text" name="8">
    <input type="text" name="9">
    <input type="text" name="10">
    <?php if (!$noerrors) : ?>
    <p>Incorrect inputs!</p>
    <?php endif; ?>
    <button type="submit">Send</button>
    <?php if (!empty($_POST) && $noerrors) : ?>
    <blockquote>Array:<?= $stringarr ?></blockquote>
    <blockquote>Max value:<?= $max ?></blockquote>
    <blockquote>Min value:<?= $min ?></blockquote>
    <?php endif; ?>

</form>

</body>
</html>
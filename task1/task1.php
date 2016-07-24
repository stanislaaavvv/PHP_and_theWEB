<?php
$firstnumber = isset($_POST['firstnumber']) ? $_POST['firstnumber'] : '';
$secondnumber = isset($_POST['secondnumber']) ? $_POST['secondnumber'] : '';
$sign = isset($_POST['sign']) ? $_POST['sign'] : '';
$errors = [];
$result = '';

if(!empty($_POST)) {

    if (!is_numeric($firstnumber) || !is_numeric($secondnumber)) {
        $errors[] = 'Inputs must be a number!';
    }
    if (empty($sign)) {
        $errors[] = "Choose an operation!";
    }
    if (empty($firstnumber) || empty($secondnumber)) {
        $errors[] = "You must enter values!";
    }

}

if (!$errors) {
    if ($sign === '+') {
        $result = $firstnumber + $secondnumber;
    }
    if ($sign === '-') {
        $result = $firstnumber - $secondnumber;
    }
    if ($sign === '*') {
        $result = $firstnumber * $secondnumber;
    }
    if ($sign === '/') {
        $result = $firstnumber / $secondnumber;
    }
    if ($result) {
        $result = round($result, 2);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task1</title>
    <link rel="stylesheet" href="reset.css" type="text/css"/>
    <link rel="stylesheet" href="task1.css" type="text/css">
</head>
<body>
<form action="" id="container" method="post">
    <input type="text" name="firstnumber" value="<?= $firstnumber ?>">
    <select name="sign">
        <option ></option>
        <option >+</option>
        <option >-</option>
        <option >*</option>
        <option>/</option>
    </select>
    <input  type="text" name="secondnumber" value="<?= $secondnumber ?>">
    <button type="submit" id="button">=</button>
</form>
    <input type="text" id="result" value="<?= $result ?>">
    <?php if(!empty($errors)) : ?>
    <?php foreach ($errors as $err):?>
    <p id="error"><?= $err?></p>
     <br>
    <?php endforeach;?>
    <?php endif;?>


</body>

</html>
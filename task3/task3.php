<?php

$value = isset($_POST['valueinput']) ? $_POST['valueinput'] : '';
$operation = isset($_POST['operation']) ? $_POST['operation'] : '';
$errors = [];
$result = '';
$noerrors = true;

if(!empty($_POST)) {

    if (!is_numeric($value)) {
        $errors['valueeror'] = 'Input must be a number!';
    } else {
        $errors['valueeror'] = '';
    }


    if (empty($operation)) {
        $errors['nooperation'] = 'Choose an operation!';

    } else {
        $errors['nooperation'] = '';
    }

    foreach($errors as $val) {
        if ($val !== '') {
            $noerrors = false;
        }
    }
}

if (!empty($_POST) && $noerrors) {

    if ($operation === 'Celsium to Fahrenheit') {
        $result = ((1.8 * $value) + 32);
        $result = round($result , 2).' F';
    }
    if ($operation === 'Fahrenheit to Celsium') {
        $result = (($value - 32) / 1.8);
        $result = round($result , 2).' C';
    }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task3</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task3.css" type="text/css">
</head>
<body>
<form id="container" method="post">
    1)Value:
    <input type="text" name="valueinput" value="<?= $value ?>">
    <?php if(!empty($errors) && !empty($_POST)) : ?>
    <p class="errors"><?= $errors['valueeror'] ?></p>
    <?php endif;?>
    <hr>
    <span>2)Convert temperature from :</span>
    <select name="operation">
        <option></option>
        <option>Celsium to Fahrenheit</option>
        <option>Fahrenheit to Celsium</option>
    </select>
    <?php if(!empty($errors) && !empty($_POST)) : ?>
    <p class="errors"><?= $errors['nooperation'] ?></p>
    <?php endif;?>
    <hr>
    <button type="submit">3)Click for result</button>
    <hr>
    <?php if($noerrors && !empty($_POST)) : ?>
    <p class="result"><?= $operation ?>:</p>
    <p class="result"><?= $result ?></p>
    <hr>
    <?php endif;?>
</form>

</body>
</html>
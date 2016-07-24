<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$dayofbirth = isset($_POST['dayofbirth']) ? $_POST['dayofbirth'] : '';
$monthofbirth = isset($_POST['monthofbirth']) ? $_POST['monthofbirth'] : '';
$yearofbirth = isset($_POST['yearofbirth']) ? $_POST['yearofbirth'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>task6</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task6.css" type="text/css">
</head>
<body>
<form id="container" method="post">

    <span>Name:</span>
    <input type="type" name="name" value="<?= $name ?>">


    <span>LastName:</span>
    <input type="text" name="lastname" value="<?= $lastname ?>">

    <span>Date of birth:</span>
    <div id="birth">
        <select name="dayofbirth">
                <option  ><?= $dayofbirth ?></option>
            <?php for ($i = 1; $i < 32; $i++) :?>
                <option><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <select name="monthofbirth" >
                <option><?= $monthofbirth ?></option>
            <?php for ($i = 1; $i < 13; $i++) :?>
                <option><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <select name="yearofbirth" >
                <option><?= $yearofbirth ?></option>
            <?php for ($i = 1900; $i < 2015; $i++) :?>
                <option><?= $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <button type="submit">Send</button>

</form>

</body>
</html>
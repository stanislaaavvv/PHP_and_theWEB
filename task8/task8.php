

<?php


if(isset($_POST['count'])){
    $count = $_POST['count'] + 1;
}else{
    $count = 0;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task8</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task8.css" type="text/css">
</head>
<body>
<form id="container" method="post">

    <input name="count" value="<?= $count ?>">
    <button type="submit" name="sent" >Send</button>



</form>
<br>
Submission:<?=" ".$count ?>



</body>
</html>
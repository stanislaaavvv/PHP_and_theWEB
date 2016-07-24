<?php
$information = $_SERVER['HTTP_USER_AGENT'];
$server = $_SERVER['SERVER_ADDR']." ".$_SERVER['SERVER_NAME']." ".$_SERVER['SERVER_SOFTWARE']." ".$_SERVER['SERVER_PROTOCOL'];
$host = $_SERVER['HTTP_HOST'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task7</title>
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="task7.css" type="text/css">
</head>

<body>


    Browser-info:
    <span><?= $information?></span>
    Server-info:
    <span><?= $server?></span>
    Host-info:
    <span><?= $host?></span>



</form>

</body>
</html>

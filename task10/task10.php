<?php
session_start();

function UnderlineWord($word) {
    $wordlength = strlen($word);
    $dottedword = "";
    for ($i = 0; $i < $wordlength; $i++) {
        $dottedword = "".$dottedword.".";
    }
    return $dottedword;
}


function WordFromFile() {

    $name = "words.txt";
    $openfile = fopen($name,"r");
    $content = fread($openfile,filesize($name));
    fclose($openfile);
    $words = preg_split("[/]", $content);
    $wordscount = count($words);

    $random_number = mt_rand(0,$wordscount - 1);

    $finalword = $words[$random_number];
    return $finalword;
}



if (isset($_POST['sendletter']) && $_SESSION['gameEnded'] != true) {
    if (isset($_POST['gameletter']) && preg_match("/[A-Z\s_]/i", $_POST['gameletter']) > 0) {

        $letter = htmlentities(stripslashes($_POST['gameletter']));

        $theWord = $_SESSION['theWord'];
        $guessword = $_SESSION['guessword'];
        $error = $_SESSION['error'];

        for ($d = 0; $d < strlen($theWord); $d++) {
            $theWordarr[$d] = substr($theWord, $d, 1);
            $guesswordarr[$d] = substr($guessword, $d, 1);
        }

        $letterOccured = false;
        for ($f = 0; $f < strlen($theWord); $f++) {
            if ($theWordarr[$f] == $letter) {
                $letterOccured = true;
                $guesswordarr[$f] = $theWordarr[$f];
            }
        }

        $guessword = "";
        for ($r = 0; $r < strlen($theWord); $r++) {
            $guessword = "".$guessword."".$guesswordarr[$r]."";
        }
        $_SESSION['guessword'] = $guessword;
        if ($_SESSION['guessword'] == $_SESSION['theWord'] && !empty($_SESSION)) {
            $_SESSION['message'] = "Congratulations!You won! <input type='submit' name='reset' class='result' value='Try again?' />";
            unset($_SESSION['theWord']);
            unset($_SESSION['guessword']);
            $_SESSION['gameEnded'] = true;
            $_SESSION['guessword'] = $theWord;
        }
        if ($letterOccured == false) {
            $error++;
            $_SESSION['error'] = $error;

            if ($error == 6) {
                $_SESSION['message'] = "You lost! <input type='submit' name='reset' value='Try again?' class='result' />";
                unset($_SESSION['theWord']);
                unset($_SESSION['guessword']);
                $_SESSION['gameEnded'] = true;
                $_SESSION['guessword'] = $theWord;
            }
        }
    } else {


            $_SESSION['message'] = "Enter a letter!";

    }
} else {
    $theWord = WordFromFile();
    $guessword = UnderlineWord($theWord);
    $error = 0;
    $_SESSION['theWord'] = $theWord;
    $_SESSION['guessword'] = $guessword;
    $_SESSION['error'] = $error;
    $_SESSION['gameEnded'] = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GET</title>
    <link rel="stylesheet" href="task10.css" type="text/css">
</head>

<body onload="document.getElementById('gameinput').focus()">
<div id="container">
    <form action="" method="post" onsubmit="return true;">
        <div id="Title" ">
            Hangman
        </div>
        <div id="InputPart">
            Letter:
            <input type="text" maxlength="1" size="1" id="gameinput" name="gameletter" />
            <input type="hidden" value="true" name="sendletter" />
            <input type="submit" id = "go" value="Go" name="sendletter_button" /><br />
            <span id="Guessingword"><?php echo $_SESSION['guessword']; ?></span>
            <br />
        </div>
        <div id="images">
            <img src="images/<?php echo $_SESSION['error']; ?>.jpg" id="imgprop"/>
        </div>
        <div id="messages" style="">
            <?php echo $_SESSION['message']; ?>
        </div>
    </form>
</div>
</body>
</html>


<!--Napravena po primer ot :https://www.daniweb.com/programming/web-development/code/267046/hangman-source-code-php*-->
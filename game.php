<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require ('Blackjack.php');
session_start();
/*$player = new Blackjack();
$player -> hit();
$dealer = new Blackjack();
$dealer ->hit();*/
startGame();
function startGame ()
{
    if (!isset($_SESSION["player"]) && !isset($_SESSION["dealer"])) {
        $_SESSION["player"] = new Blackjack(0);
        $_SESSION["dealer"] = new Blackjack(0);
    }
}
// you can call the getter to see the score of the object
// $lost= false;
if (isset($_REQUEST["action"])){
    if ($_REQUEST["action"] == 'hit'){
        $_SESSION["player"]->hit();
        if ($_SESSION["player"]->getScore() >= 21){
            $_SESSION["player"]->stand($_SESSION["dealer"]);
        }
    }
    if ($_REQUEST["action"] == 'stand'){
        $_SESSION["player"] ->stand($_SESSION["dealer"]);
    }
    if ($_REQUEST["action"] == 'surrender'){
        $_SESSION["player"]->surrender($_SESSION["dealer"]);
    }
    if ($_REQUEST["action"] == 'new'){
        resetGame();
    }
}
function resetGame () {
    unset($_SESSION['player']);
    unset($_SESSION['dealer']);
    startGame();
}

//ask about the session is it set or not

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
whatIsHappening();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>blackjack-home</title>
</head>
<body>
<div>
<form action="Blackjack.php" method="post">
<button type="submit"  name="action" value=hit" >HIT</button>
    <button type="submit" name="action" value="stand" >STAND</button>
    <button type="submit" name="action" value="surrender">SURRENDER</button>
    </form>
</div>
</body>
</html>

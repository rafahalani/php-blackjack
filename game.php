<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require('Blackjack.php');
session_start();
$stand = 0;
$surrender = 0;
$_SESSION["button"] = "";
$_SESSION["message"] = "";

/*$player = new Blackjack();
$player -> hit();
$dealer = new Blackjack();
$dealer ->hit();*/
function finish () {
    $_SESSION['player-score'] = null;
    $_SESSION['dealer-score'] = null;
}


if (isset($_SESSION['player-score'])) {
    $player = new Blackjack($_SESSION['player-score']);
} else {
    $player = new Blackjack(0,[]);
}
if (isset($_SESSION['dealer-score'])){
    $dealer = new Blackjack($_SESSION['dealer-score']);

} else {
    $dealer = new Blackjack(0,[]);

}
//ask about the session is it set or not

if (!isset($_GET["action"])){
    if ($_GET["action"] == "hit"){
        $player->hit();
        $_SESSION['player-score'] = $player->getScore();
        if($_SESSION['player-score'] > 21){
            $_SESSION['message'] = "YOU LOSE";
        }
        if ($_SESSION['player-score'] == 21){
            $_SESSION['message'] = "YOU WIN";
        }
    }
if($_GET["action"] == "stand") {
    $stand = 1;
    $player->stand();
    }
if($_GET["action"] == "surrender"){
    $surrender = 1 ;
    $player->surrender($_SESSION['dealer']);
}
}
function whatIsHappening()
{
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
<div class="game">
    <?php
    if(isset($_SESSION['player-score']) && $stand == 0 && $surrender == 0){
        echo "YOUR SCORE IS:" . $_SESSION['player-score'] . "</br>";
    if($_SESSION['player-score'] == 21){
        finish();
        echo "</br>" . $_SESSION['button'] . "</br>";
    }
    if (($_SESSION['player-score'] > 21)) {
        finish();
        echo "</br>" . $_SESSION['button'] . "</br>";
    }
    }
    if($stand == 1){
        echo $_SESSION['message']."<br/>";
        echo "Your score is ".$_SESSION['player-score']."<br/>";
        echo "Dealer score is ".$_SESSION['dealer-score']."<br/>";
        finish();
        echo "<br/>".$_SESSION['button']."<br/>";
    }
    if($surrender == 1){
        echo $_SESSION['message'];
        finish();
        echo "<br/>".$_SESSION['button']."<br/>";
    }
    ?>
</div>
<div>
    <form action="Blackjack.php" method="post">
        <button type="submit" name="action" value="hit">HIT</button>
        <button type="submit" name="action" value="stand">STAND</button>
        <button type="submit" name="action" value="surrender">SURRENDER</button>
    </form>
</div>
</body>
</html>

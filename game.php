<?php
require ('Blackjack.php');

$player = new Blackjack();
$player -> hit();
$dealer = new Blackjack();
$dealer ->hit();

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
echo '
<div>
<form action="Blackjack.php" method="post">
<button type="submit"  name="action" value=hit" >HIT</button>
    <button type="submit" name="action" value="stand" >STAND</button>
    <button type="submit" name="action" value="surrender">SURRENDER</button>
    </form>
</div>' ;

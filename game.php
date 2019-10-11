<?php
require ('Blackjack.php');

$player = new Blackjack();
$player -> hit();
$dealer = new Blackjack();
$dealer ->hit();
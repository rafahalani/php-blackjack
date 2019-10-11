<?php


class Blackjack
{
    public $score = 0 ;

    public $name = "palayer" ;
    const MINIMUM = 1;
    const MAXIMUM = 11;
    const Blackjack_MAX = 21;
    public $valuecards = array();



    //you need constructor here
    public function  hit ()  {
        $randomCard = rand(self::MINIMUM,self::MAXIMUM);
        $this->score = $randomCard;
        $_SESSION['score'] += $randomCard;
        echo $randomCard;
        if($_SESSION['score']>self::Blackjack_MAX)
        {

        }
    }


    public function stand (){


    }

    public function surrender (){

    }

}
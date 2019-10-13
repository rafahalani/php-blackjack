<?php


class Blackjack
{
    private $score ;
    private $lost = false;
    private $message;

    public $name = "palayer" ;
    const MINIMUM = 1;
    const MAXIMUM = 11;
    const Blackjack_MAX = 21;
    public $valuecards = array();




    //you need constructor here to create new objects

   public function __construct( $_score)
    {
        $this->score=$_score;
    }

    //functions to get the private variables
    public function getScore ()
    {
       return $this->score;
    }

    public function loser () {
       return $this->lost;
    }

    public function getMessages() {
       return $this->message;
    }


    public function  hit ()  {
        if ($this->score<self::Blackjack_MAX) {
            $randomCard = rand(self::MINIMUM, self::MAXIMUM);
            $this->score += $randomCard;
            echo $randomCard;
            return $randomCard;
        }
    }


    public function stand (Blackjack $dealer)
    {
        while ($dealer->getScore()< 16){
            $dealer->hit();
        }
        if ($this->getScore()<=21){
           if($this->getScore() > $dealer->getScore()){
               $this->message="YOU WIN!";
           }
           elseif ($dealer->getScore()>21){
               $this->message="YOU WIN!";
           }
           else {
               $this->lost=true;
               $this->message="YOU LOSE!";
           }
        }elseif ($this->getScore() == $dealer->getScore()){
            $this->message="IT'S A DRAW";
            $this->lost=true;
        }

         else{

             $this->lost=true;
             $this->message="YOU LOSE";
         }

    }


    public function surrender (Blackjack $dealer){

       $reset=0;
       $this->score=$reset;
       $dealer->score=$reset;
       $this->message="YOU SURRENDERED = YOU LOST";
    }

}
<?php


class Blackjack
{
    private $score ;
    private $cards;
    private $lost = false;
  //  private $message;

  //  public $name = "palayer" ;
    const MINIMUM = 1;
    const MAXIMUM = 11;
    const Blackjack_MAX = 21;
    const Dealer_Max = 16;
   // public $valuecards = array();




    //you need constructor here to create new objects

   public function __construct($score,$cards)
    {
        $this->score = $score;
        $this->cards = $cards;
    }



    public function  hit ()  {

            $randomCard = rand(self::MINIMUM, self::MAXIMUM);
            array_push($this->cards,$randomCard);
            $this->score += $randomCard;
            echo $randomCard;
            return $randomCard;

    }


    public function stand (Blackjack $dealer)
    {
        do {
            $_SESSION['dealer']->hit();
            $_SESSION['dealer-score'] = $_SESSION['dealer']->getScore();

        } while ($_SESSION['dealer-score']<15);
        if($_SESSION['dealer-score'] > 21){
            $_SESSION['message'] = 'YOU WIN!';
        } else {
            if($_SESSION['dealer-score'] >= $_SESSION['player-score']){
                $_SESSION['message'] = 'YOU LOSE.';
            } else{
                $_SESSION['message'] = "YOU WIN!";
            }
        }

    }


    public function surrender (Blackjack $dealer)
    {
        do {
            $dealer->hit();
            $_SESSION['dealer-score'] = $dealer->getScore();
        } while($dealer->getScore() < 15);
        $_SESSION['message'] = "YOU LOSE, DEALER SCORE: ".$dealer->getScore()."</br>";

    }

    /**
     * @return mixed
     */
    public function getCards()
    {
        return $this->cards;
    }
public function getScore(){
        return $this->score;
}
}
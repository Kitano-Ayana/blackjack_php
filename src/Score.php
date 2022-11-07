<?php  

class Score{

    private $player_score;
    private $dealer_score;

    // public function calculationPlayerScore($cards,$player_card){

    //     $player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
    //     $player_score += $player_card_number;
    //     return $player_score;
    // }
    public function setPlayerScore($player_score)
    {
       $this->player_score = $player_score;
    }

    public function getPlayerScore()
    {
       return $this->player_score;
    }

    public function setDealerScore($dealer_score)
    {
       $this->dealer_score = $dealer_score;
    }

    public function getDealerScore()
    {
       return $this->dealer_score;
    }

}
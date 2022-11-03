<?php  

class Score{

    private $player_score;
    private $dealer_score;

    public function calculationPlayerScore($cards,$player_card){

        $player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
        $player_score += $player_card_number;
        return $player_score;
    }

}
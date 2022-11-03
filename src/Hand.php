<?php

class Hand{

    public function dealCard($deck){

        $player_card = array_rand($deck);
        $player_card_number = preg_replace('/[^0-9]/', '', $deck[$player_card]);
        
        return $deck;
    }


}


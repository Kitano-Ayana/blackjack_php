<?php

require_once('Card.php');

class Deck extends Card {
    //Card配列
    private $cards;

    public function deal() {
        //デッキを作成していない場合は作成する
        if(!$this->cards){
            $this->cards = $this->makeDeck();
        }
    
        // $cardsからランダムに取り出したCardオブジェクトを返す
        $card_key = array_rand($this->cards);
        $card = $this->cards[$card_key];

        //一度使用したカードは使えないようにする
        unset($this->cards[$card_key]);

        return $card;
    }


   
}
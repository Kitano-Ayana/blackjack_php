<?php

require_once('Card.php');

class Deck{

     //Card配列
     private $cards;

    // デッキを初期化する
    function __construct() {
        $this->cards = [];
        foreach(Cards::TYPES as $type){
            for($i = 0; $i < count(Cards::NUMBERS); $i++){
                $this->cards[] = new Card($type, Cards::NUMBERS[$i], Cards::SCORES[$i]);
            }
        };
    }

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
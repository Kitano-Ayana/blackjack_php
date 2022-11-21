<?php

class Card
{
    /**
     * カードの点数
     */

     private const CARD_NUMBER = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10,
        'A' => 11,
     ];

     /**
      * カードの種類
      */
      private const CARD_TYPE = [
        'スペード',
        'ハート',
        'クラブ',
        'ダイヤ'
      ];

      /**
       * カードデッキ作成
       */
      public function createDeck(){
        $deck = [];
        foreach(self::CARD_TYPE as $card_type){
            foreach(self::CARD_NUMBER as $number => $card_score){
                $deck[] = [
                    'type'       => $card_type,
                    'number'     => $number,
                    'card_score' => $card_score
                ];
            }
        } ;  
        return $deck;
    }

}


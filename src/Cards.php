<?php

class Cards {
   
    /**
     *  カードの数字配列を作成する
     * 
     * 　@return $card_number
     */

     public function cardNumberMethod(){
        $card_number = ['2','3','4','5','6','7','8','9','10','J','Q','K','A',];
        return $card_number;
     }
    
    /**
     *  カードのスコア配列を作成する
     * 
     * 　@return $card_score
     */

    public function cardScoreMethod(){
        $card_score = ['2','3','4','5','6','7','8','9','10','10','10','10','11',];
        return $card_score;
     }

    /**
     *  カードの種類配列を作成する
     * 
     *  @return $card_type
    */
     public function cardTypeMethod(){
        $card_type = ['スペード', 'ハート', 'クラブ', 'ダイヤ'];
        return $card_type;
    } 

    //MEMO ----修正前コードですが一旦残してます（ここから）--------- 

    /**
     * カードの点数
     */ 

    // private const CARD_NUMBER = [
    //     '2' => 2,
    //     '3' => 3,
    //     '4' => 4,
    //     '5' => 5,
    //     '6' => 6,
    //     '7' => 7,
    //     '8' => 8,
    //     '9' => 9,
    //     '10' => 10,
    //     'J' => 10,
    //     'Q' => 10,
    //     'K' => 10,
    //     'A' => 11,
    //  ];


    //  /**
    //   * カードの種類
    //   */
    //   private const CARD_TYPE = [
    //     'スペード',
    //     'ハート',
    //     'クラブ',
    //     'ダイヤ'
    //   ];

    //   /**
    //    * カードデッキ作成
    //    */
    //   public function createDeck(){
    //     $deck = [];
    //     foreach(self::CARD_TYPE as $card_type){
    //         foreach(self::CARD_NUMBER as $number => $card_score){
    //             $deck[] = [
    //                 'type'       => $card_type,
    //                 'number'     => $number,
    //                 'card_score' => $card_score
    //             ];
    //         }
    //     } ;  
    //     return $deck;
    // }
    //MEMO ----修正前コードですが一旦残してます（ここまで）--------- 

}
<?php

require_once('Cards.php');

class Card extends Cards
{
    //--質問-------------
    //
    // カードのタイプや数字、スコアなど中身が配列になるものを変数にするとき、なんとなく
    //  
    // private const CARD_TYPE = [
    //    'スペード',
    //    'ハート',
    //    'クラブ',
    //    'ダイヤ'
    //  ];
    //
    //  このように、constで定数として宣言してしまうクセがあります。
    //  
    //  変数は変更可能、定数は変更不可という違いがあるので、中身が変わりそうな場合は変数、不変であれば定数と使い分けるのでしょうか？
    //  感覚的には、クラス内で使う変数（メンバ変数？）はスッキリしていた方が見やすいなと思ったので
    //  class 直下に書く場合は、変数で1行で書くほうがいいのかなとも思いますが、どうなんでしょうか？？
    //----------------------


    private $card_type;
    private $card_number;
    private $card_score;

    public function getCardType()
    {
       return $this->cardTypeMethod();
    }

    public function getCardNumber()
    {
       return $this->cardNumberMethod();
    }

    public function getCardScore()
    {
       return $this->cardScoreMethod();
    }

    public function makeDeck(){
        $this->card_number = $this->getCardNumber();
        $this->card_type = $this->getCardType();
        $this->card_score = $this->getCardScore();
    
        foreach($this->card_type as $card_type){
            for($i = 0; $i < count($this->card_number); $i++){
                $cards[] = [
                    'type' => $card_type,
                    'card_number' => $this->card_number[$i],
                    'card_score' => $this->card_score[$i]
                ];
            }
        };

        return $cards;
    }

}


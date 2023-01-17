<?php

class Message {

    public function firstPlayerMessage($card){
        echo '1枚目のカードは' . $card->type . 'の' . $card->number . 'です。';
    }

    public function secondPlayerMessage($card){
       echo '2枚目のカードは' . $card->type . 'の' . $card->number . 'です。';
    }

    public function firstDealerMessage($card){
        echo '1枚目のカードは' . $card->type . 'の' . $card->number . 'です。';
    }
    public function DealerMessage(){
        echo 'ディーラーの2枚目以降のカードは分かりません。';
    }

}
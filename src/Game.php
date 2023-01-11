<?php

require_once('Card.php');
require_once('Cards.php');
require_once('Deck.php');
require_once('Player.php');
require_once('Score.php');
require_once('Message.php');

/**
 *  ゲームクラスで実装すること
 *  1:ゲームを始める
 *  2:勝敗を決める
 *  3:ゲームを終了する
 * 
 *  getしてくるもの
 *  getDeck()
 *  getDealer
 *  getPlayer
 * 
 */

class Game {

    public function __construct(){
    
    }

    public function gameStart()
    {
        $this->card = !empty($this->card) ? $this->card : new Card();
        $this->cards = !empty($this->cards) ? $this->cards : new Cards();
        $this->deck = !empty($this->deck) ? $this->deck : new Deck();
        $this->score = !empty($this->score) ? $this->score : new Score();
        $this->player = !empty($this->player) ? $this->player : new Player();
        $this->message = !empty($this->message) ? $this->message : new Message();

        //最初のゲーム
        if($this->player->getStatus() == NULL){

            $card = $this->deck->deal();
            $this->score->setPlayerScore($card['card_score']);
            echo $this->message->firstPlayerMessage($card);

            $card = $this->deck->deal();
            $this->score->setPlayerScore($card['card_score']);
            echo $this->message->secondPlayerMessage($card);
            
            $card = $this->deck->deal();
            $this->score->setDealerScore($card['card_score']);
            echo $this->message->firstDealerMessage($card);
            

            $card = $this->deck->deal();
            $this->score->setDealerScore($card['card_score']);
            echo $this->message->DealerMessage($card);

            $this->judgeContinue();
            $this->gameStart();
        //２回目以降のゲーム    
        }else if($this->player->getStatus() == 'Continue'){
            $this->deck->deal();
            echo $this->message->PlayerMessage($this->deck);

            $this->deck->deal();
            echo $this->message->DealerMessage($this->deck);
            $this->judgeContinue();
            $this->gameStart();
        //ゲーム終了を選択    
        }else if($this->player->getStatus() == 'End'){
            $this->result();
        }  
        
    }

    public function judgeContinue()
    {
        $stdin = fopen("php://stdin", "r");

        $player_decision = '';
    
        if(!$stdin){
            exit("[error] STDIN failure.\n");
        }else{
            echo "もう一枚カードを引きますか? [y/n]: ";
            $player_decision = trim(fgets(STDIN));
            if($player_decision === 'y'){
                $this->player->setStatus('Continue');
            }else if($player_decision === 'n'){
                $this->player->setStatus('End');
            }   
        }

    }
    public function result()
    {
        echo "あなたのカードスコアは、".$this->score->getPlayerScore()."です。\n";
        echo "ディーラのカードスコアは、".$this->score->getDealerScore()."です。\n";
        if($this->score->getPlayerScore() >  $this->score->getDealerScore() ||$this->score->getDealerScore() > 21 ){
            echo "あなたの勝ちです。";
        }else{
            echo "あなたの負けです。";
        }  
    }

}    
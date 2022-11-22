<?php

require_once('Card.php');
require_once('Player.php');
require_once('Dealer.php');
require_once('Hand.php');
require_once('Score.php');

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

    public function gameStart()
    {
        $this->card = !empty($this->card) ? $this->card : new Card();
        $this->hand = !empty($this->hand) ? $this->hand : new Hand();
        $this->score = !empty($this->score) ? $this->score : new Score();
        $this->player = !empty($this->player) ? $this->player : new Player();
        $this->dealer = !empty($this->dealer) ? $this->dealer : new Dealer();

        
        if($this->player->getStatus() == NULL){
            $this->firstDeal();
            $this->dealerPlay();
            $this->checkScore();
            $this->judgeContinue();
            $this->gameStart();
        }else
        if($this->player->getStatus() == 'Continue'){
            $this->continuePlay();
            $this->dealerPlay();
            $this->checkScore();
            $this->judgeContinue();
            $this->gameStart();
        }else
        if($this->player->getStatus() == 'End'){
           $this->result();
        }  

            
        
    }

    public function firstDeal()
    {
        //カードをとってくる
        $deck = $this->card->createDeck();

        //カードを配る & あなたのカードはこれです　と出力
        $player_card_key = array_rand($deck);
        $player_socre = $deck[$player_card_key]['card_score'];
        echo 'あなたの1枚目のカードは'.$deck[$player_card_key ]['type'].'の'.$deck[$player_card_key ]['number'].'です'."\n";

        $player_card_key = array_rand($deck);
        $player_socre += $deck[$player_card_key]['card_score'];
        echo 'あなたの2枚目のカードは'.$deck[$player_card_key ]['type'].'の'.$deck[$player_card_key ]['number'].'です'."\n";


        $this->score->setPlayerScore($player_socre);

        //ディーラのカードを配る　ディラーのカードは不明と出力
        $dealer_card_key = array_rand($deck);
        $dealer_score = $deck[$dealer_card_key]['card_score'];
        echo 'ディーラー1枚目のカードは'.$deck[$dealer_card_key ]['type'].'の'.$deck[$dealer_card_key ]['number'].'です'."\n";

        $dealer_card_key = array_rand($deck);
        $dealer_score += $deck[$dealer_card_key]['card_score'];
        echo 'ディーラーのカードは分かりません。'."\n";

        $this->score->setDealerScore($dealer_score);
        $this->player->setStatus('Continue');     
    }

    public function continuePlay()
    {

    }

    public function checkScore()
    {
        if($this->score->getPlayerScore() > 21){
            $this->player->setStatus('End');
        }

    }


    public function judgeContinue()
    {
        $stdin = fopen("php://stdin", "r");
    
        // fopen に失敗した場合、これを記述しておかないと下の while で無限ループが発生する。
        if ( ! $stdin) {
            exit("[error] STDIN failure.\n");
        }

        echo "もう一枚カードを引きますか? [y/n]: ";
        if('y' == trim(fgets($stdin, 64))){
            $this->player->setStatus('Continue');
        }else
        if('n' == trim(fgets($stdin, 64))){
            $this->player->setStatus('End');
        }   

    }
    public function result()
    {
        if($this->score->getPlayerScore() >  $this->score->getDealerScore() ||$this->score->getDealerScore() > 21 ){
            echo "あなたの勝ちです。";
        }else  echo "あなたの負けです。";
    }

    public function dealerPlay()
    {
        
    }
}    
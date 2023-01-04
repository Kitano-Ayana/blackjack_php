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

        //最初のゲーム
        if($this->player->getStatus() == NULL){
            $this->firstDeal();
            $this->dealerPlay();
            $this->judgeContinue();
            $this->gameStart();
        }else
        //２回目以降のゲーム
        if($this->player->getStatus() == 'Continue'){
            $this->continuePlay();
            if($this->score->getDealerScore() < 17){
                $this->dealerPlay();
            }
            $this->judgeContinue();
            $this->gameStart();
        }else
        //プレイヤーがゲーム終了を選択
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

        //ディーラのカードを配る　ディラーの2枚目のカードは不明と出力
        $dealer_card_key = array_rand($deck);
        $dealer_score = $deck[$dealer_card_key]['card_score'];
        echo 'ディーラー1枚目のカードは'.$deck[$dealer_card_key ]['type'].'の'.$deck[$dealer_card_key ]['number'].'です'."\n";

        $dealer_card_key = array_rand($deck);
        $dealer_score += $deck[$dealer_card_key]['card_score'];
        echo 'ディーラーの2枚目のカードは分かりません。'."\n";

        $this->score->setDealerScore($dealer_score);
        $this->player->setStatus('Continue');     
    }

    public function continuePlay()
    {
        //カードをとってくる
        $deck = $this->card->createDeck();

        //カードを配る & あなたのカードはこれです　と出力
        $player_card_key = array_rand($deck);
        $player_socre = $deck[$player_card_key]['card_score'];
        echo 'あなたのカードは'.$deck[$player_card_key ]['type'].'の'.$deck[$player_card_key ]['number'].'です'."\n";

        //スコアを格納
        $this->score->setPlayerScore($this->score->getPlayerScore() +$player_socre);

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

        $player_decision = '';
    
    
        if ( ! $stdin) {
            exit("[error] STDIN failure.\n");
        }

        echo "もう一枚カードを引きますか? [y/n]: ";
        $player_decision = trim(fgets(STDIN));
        if($player_decision === 'y'){
            $this->player->setStatus('Continue');
        }else
        if($player_decision === 'n'){
            $this->player->setStatus('End');
        }   

    }
    public function result()
    {
        echo "あなたのカードスコアは、".$this->score->getPlayerScore()."です。\n";
        echo "ディーラのカードスコアは、".$this->score->getDealerScore()."です。\n";
        if($this->score->getPlayerScore() >  $this->score->getDealerScore() ||$this->score->getDealerScore() > 21 ){
            echo "あなたの勝ちです。";
        }else  echo "あなたの負けです。";


    }

    public function dealerPlay()
    {
        //カードをとってくる
        $deck = $this->card->createDeck();

        $dealer_card_key = array_rand($deck);
        $dealer_score = $deck[$dealer_card_key]['card_score'];
        echo 'ディーラーのカードは'.$deck[$dealer_card_key ]['type'].'の'.$deck[$dealer_card_key ]['number'].'です'."\n";

        $this->score->setDealerScore($this->score->getDealerScore() + $dealer_score);
    }
}    
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
        $this->card = new Card();
        $this->hand = new Hand();
        $this->score = new Score();
        $this->player = new Player();

        $player_status = 'continue';

        if($player_status == 'continue'){
            $this->play();
            $this->checkScore();
            $this->judgeContinue();
        }else{
            $this->result($score);
        }

    echo 'ゲームを開始します'."\n"; 
    
    //デッキとってくる
    $deck = $card->createDeck;

    //プレイヤーに1枚目のカードを配る
    
    $hand->dealCard($deck);

    //カードの計算をする
    $score->calculationPlayerScore($cards,$player_card);

     //プレイヤーに2枚目のカードを配る
     $hand->dealCard($deck);

    
     //カードの計算をする
     $score->calculationPlayerScore($cards,$player_card);


    $stdin = fopen("php://stdin", "r");
    
    // fopen に失敗した場合、これを記述しておかないと下の while で無限ループが発生する。
    if ( ! $stdin) {
        exit("[error] STDIN failure.\n");
    }

     //--------------------------
    // ゲームを続けるかYes or NO 
    //--------------------------
    while (true) {
        echo "もう一枚カードを引きますか? [y/n]: ";
    }    

    //ゲームを続けるかやめるか選択する
    $response = $player->judgeContinue();

    if($response == 'continue'){
        $hand->dealCard($deck);
        $score->calculationPlayerScore($cards,$player_card);
    }else{

    }


    // //カードデッキから2枚引いて、合計値をコンソール出力
    // $player_card = array_rand($cards);
    // $player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
    // $player_total_card_number = $player_card_number;
    // echo 'あなたのカードは'.$cards[$player_card].'です'."\n";

    // $player_card = array_rand($cards);
    // $player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
    // $player_total_card_number +=  $player_card_number;
    // echo 'あなたのカードは'.$cards[$player_card].'です'."\n";
    // echo 'あなたのカードの合計は'.$player_total_card_number.'です'."\n";

    // $dealer_card = array_rand($cards);
    // $dealer_card_number = preg_replace('/[^0-9]/', '', $cards[$dealer_card]);
    // $dealer_total_card_number = $dealer_card_number;
    // echo '相手のカードは'.$cards[$dealer_card].'です'."\n";

    // $dealer_card = array_rand($cards);
    // $dealer_card_number = preg_replace('/[^0-9]/', '', $cards[$dealer_card]);
    // $dealer_total_card_number += $dealer_card_number;
    // echo '相手のカードは分かりません'."\n";


    // $stdin = fopen("php://stdin", "r");
    
    // // fopen に失敗した場合、これを記述しておかないと下の while で無限ループが発生する。
    // if ( ! $stdin) {
    //     exit("[error] STDIN failure.\n");
    // }

    // //--------------------------
    // // ゲームを続けるかYes or NO 
    // //--------------------------
    // while (true) {
    //     echo "もう一枚カードを引きますか? [y/n]: ";
        
    //     if ('y' == trim(fgets($stdin, 64))) {
    //         $player_card = array_rand($cards);
    //         $player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
    //         $player_total_card_number +=  $player_card_number;
    //         echo 'あなたのカードは'.$cards[$player_card].'です'."\n";
    //         echo 'あなたのカードの合計は'.$player_total_card_number.'です'."\n";
            
    //         $dealer_card = array_rand($cards);
    //         $dealer_card_number = preg_replace('/[^0-9]/', '', $cards[$dealer_card]);
    //         $dealer_total_card_number += $dealer_card_number;
    //         echo '相手のカードは分かりません'."\n";
    //     } else {

    //     //-------------------
    //     //判定
    //     //-------------------
    //     if($player_total_card_number > 21){
    //         echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
    //         echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
    //         echo 'あなたの負けです';
    //         exit;
    //     }else
    //         if($dealer_total_card_number > 21 ){
    //             echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
    //             echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
    //             echo 'あなたの勝ちです'."\n";
    //             exit;
    //         }else
    //         if($dealer_total_card_number < $player_total_card_number ){
    //             echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
    //             echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
    //             echo 'あなたの勝ちです'."\n";
    //             exit;
    //             }else 
    //             echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
    //             echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
    //             echo 'あなたの負けです'."\n";
    //             exit;
    //         }
    //     }    
    // fclose($stdin);
    //     }
    
    }

    public function play()
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
        
    }

    public function checkScore()
    {
        if($this->score->getPlayerScore() > 21){
            $this->player;
        }

    }


    public function judgeContinue()
    {
        echo "もう一枚カードを引きますか? [y/n]: ";
        if ('y' == trim(fgets($stdin, 64))) {
            return $player_status = 'continue';
        }   

    }
    public function result($payer_score,$dealer_score)
    {
        if($payer_score > $dealer_score ||$dealer_score > 21 ){
            echo "あなたの勝ちです。";
        }else  echo "あなたの負けです。";
    }
}    
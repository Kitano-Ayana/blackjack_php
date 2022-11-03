<?php

require_once('Card.php');
require_once('Player.php');
require_once('Dealer.php');

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

    public function gameStart(){

    echo 'ゲームを開始します'."\n"; 
    
    //デッキとってくる
    $deck = new Card();
    $deck = $deck->createDeck;

    //プレイヤーに1枚目のカードを配る
    $hand = new Hand();
    $hand->dealCard($deck);

    //カードの計算をする


     //プレイヤーに2枚目のカードを配る
     $hand = new Hand();
     $hand->dealCard($deck);

    
     //カードの計算をする
    $score = new Score();
    $score->calculationPlayerScore($cards,$player_card);


    //ゲームを続けるかやめるか選択する
    $player = new Player();
    $player->judgeContinue();





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
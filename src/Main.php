<?php 
 
//----------------    
//カード準備
//----------------
$card_types =[
    'スペード',
    'ハート',
    'クラブ',
    'ダイヤ'
];

$card_numbers = [1,2,3,4,5,6,7,8,9,10,11,12,13];

$cards = [];

foreach($card_types as $card_type){
    foreach($card_numbers as $card_number){
        $cards[] = $card_type.$card_number;
    }
}

//----------------    
// ゲームスタート
//----------------

//プレーヤとディーラの合計値を入れる
$player_total_card_number = "";
$dealer_total_card_number = "";

//カードデッキから2枚引いて、合計値をコンソール出力
$player_card = array_rand($cards);
$player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
$player_total_card_number = $player_card_number;
echo 'あなたのカードは'.$cards[$player_card].'です'."\n";

$player_card = array_rand($cards);
$player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
$player_total_card_number +=  $player_card_number;
echo 'あなたのカードは'.$cards[$player_card].'です'."\n";
echo 'あなたのカードの合計は'.$player_total_card_number.'です'."\n";

$dealer_card = array_rand($cards);
$dealer_card_number = preg_replace('/[^0-9]/', '', $cards[$dealer_card]);
$dealer_total_card_number = $dealer_card_number;
echo '相手のカードは'.$cards[$dealer_card].'です'."\n";

$dealer_card = array_rand($cards);
$dealer_card_number = preg_replace('/[^0-9]/', '', $cards[$dealer_card]);
$dealer_total_card_number += $dealer_card_number;
echo '相手のカードは分かりません'."\n";


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
    
    if ('y' == trim(fgets($stdin, 64))) {
        $player_card = array_rand($cards);
        $player_card_number = preg_replace('/[^0-9]/', '', $cards[$player_card]);
        $player_total_card_number +=  $player_card_number;
        echo 'あなたのカードは'.$cards[$player_card].'です'."\n";
        echo 'あなたのカードの合計は'.$player_total_card_number.'です'."\n";
        
        $dealer_card = array_rand($cards);
        $dealer_card_number = preg_replace('/[^0-9]/', '', $cards[$dealer_card]);
        $dealer_total_card_number += $dealer_card_number;
        echo '相手のカードは分かりません'."\n";
    } else {

    //-------------------
    //判定
    //-------------------
    if($player_total_card_number > 21){
        echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
        echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
        echo 'あなたの負けです';
        exit;
    }else
        if($dealer_total_card_number > 21 ){
            echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
            echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
            echo 'あなたの勝ちです'."\n";
            exit;
        }else
        if($dealer_total_card_number < $player_total_card_number ){
            echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
            echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
            echo 'あなたの勝ちです'."\n";
            exit;
            }else 
            echo 'あなたの合計は'.$player_total_card_number.'です'."\n";
            echo 'ディーラーの合計は'.$dealer_total_card_number.'です'."\n";
            echo 'あなたの負けです'."\n";
            exit;
        }
    }    
fclose($stdin);






?>

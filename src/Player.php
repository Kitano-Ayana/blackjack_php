<?php

/**
 * プレイヤーができることは、カードを引くか決定する
 * →何かのアクションを起こす（インターフェースを使って実装する）
 */
class Player{

    private $response;

    public function judgeContinue(){

        echo "もう一枚カードを引きますか? [y/n]: ";

        $stdin = fopen("php://stdin", "r");
        $resposne =  trim(fgets($stdin, 64)) == 'y' ? 'continue' : 'stop';

        return $resposne;
    }

}
 
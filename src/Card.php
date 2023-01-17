<?php

require_once('Cards.php');

class Card{
    public $type;
    public $number;
    public $score;

    function __construct($type, $number, $score) {
        $this->type = $type;
        $this->number = $number;
        $this->score = $score;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getCardScore()
    {
        return $this->score;
    }
}


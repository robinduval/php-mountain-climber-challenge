<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool
     */
    public function giveMoney($price)
    {
        if ($this->total < $price)
            return false;
        $given = 0;
        sort($this->wallet);
        for ($i=count($this->wallet) - 1; $i >= 0 ; $i--) {
            $element = $this->wallet[$i];
            if (is_numeric($element) && $element <= ($price - $given)) {
                print("element ");
                print($element);
                print('at ');
                print($i);
                print('\n');
                $given += $element;
                array_splice($this->wallet, $i, 1);
            }
        }
        $this->computeTotal();
        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}

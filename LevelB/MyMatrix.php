<?php

namespace Hackathon\LevelB;

class MyMatrix
{
    private $iMax;
    private $jMax;
    private $matrix = array();

    public function __construct($i, $j, $value = null)
    {
        $this->iMax = $i;
        $this->jMax = $j;

        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                $this->matrix[$i][$j] = $value;
            }
        }
    }

    /**
     * This function generate a Matrix[i][j] from a String
     *
     * @param $str
     * @return $this
     * @throws \Exception
     */
    public function str2Matrix($str)
    {
        $lines = explode("\n", $str);
        if ($this->iMax !== count($lines)) {
            throw new \Exception();
        }

        foreach ($lines as $i => $line) {
            $cells = explode(',', $line);
            if ($this->jMax !== count($cells)) {
                throw new \Exception();
            }
            foreach ($cells as $j => $value) {
                $this->matrix[$i][$j] = trim($value);
            }
        }

        return $this;
    }

    /**
     * This function generates a string from the $matrix and displays it (if mode == 'cli')
     *
     * @param null $mode
     * @return string
     */
    public function prettyMatrix($mode = null)
    {
        $res = '';
        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                $val = '-';
                if (!is_null($this->matrix[$i][$j])) {
                    $val = $this->matrix[$i][$j];
                }
                $res .= $val."\t";
            }
            $res .= "\n";
        }

        if ('cli' === $mode) {
            echo $res;
        }

        return $res;
    }

    /**
     * This function replaces a column (i) and a line (j) with '0',
     * if the (i, j) cell equals to '0'
     *
     * @TODO
     * @return $this
     */
    public function fillZero()
    {
        /** @TODO */
        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                if ($this->matrix[$i][$j] == 0) {
                    for ($k = 0; $k < $this->iMax; ++$k) {
                        if ($this->matrix[$k][$j] != 0) {
                            $this->matrix[$k][$j] = -99999;
                        }
                    }
                    for ($l = 0; $l < $this->jMax; ++$l) {
                        if ($this->matrix[$i][$l] != 0) {
                            $this->matrix[$i][$l] = -99999;
                        }
                    }
                }
            }
        }
        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                if ($this->matrix[$i][$j] == -99999) {
                    $this->matrix[$i][$j] = 0;
                }
            }
        }
        return $this;
    }
}

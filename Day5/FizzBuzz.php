<?php
/**
 * This is part five of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Fizz Buzz
 * Task: Print all numbers from 1..100 and for multiple of 3 print Fizz,
 * multiples of 5 print Fuzz and for multiple of both echo FizzBuzz
 *
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class FizzBuzz {
    private $result = '';

    /**
     * run
     *
     * loop over range of numbers and store result in var
     * return var at end
     *
     * @access public
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            $this->processInt($i);
        }
        return rtrim($this->result, "\n");
    }

    /**
     * processInt
     *
     * convert $i to Fizz, Buzz, FizzBuzz or leave as is and append to $result
     *
     * @param integer $i
     * @access private
     * @return void
     */
    private function processInt($i)
    {
        $isModFive =  ( ($i % 5) === 0);
        $isModThree = ( ($i % 3) === 0);
        if ($isModFive || $isModThree) {
            if ($isModFive) {
                $this->result .= "Buzz";
            }
            if ($isModThree) {
                $this->result .= "Fizz";
            }
        } else {
            $this->result .= "$i";
        }
        $this->result .= "\n";
    }
}

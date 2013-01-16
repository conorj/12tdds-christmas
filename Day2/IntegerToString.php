<?php
/**
 * This is part two of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Number Names
 * Task: Spell out a number. For example 99 -> ninety nine
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class IntegerToString {
    // mapping of digits to string
    private $_mapping_digit = array(
        0 => array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine'),
        1 => array(
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen'),
        2 => array(
            1 => 'ten',
            2 => 'twenty',
            3 => 'thirty',
            4 => 'forty',
            5 => 'fifty',
            6 => 'sixty',
            7 => 'seventy',
            8 => 'eighty',
            9 => 'ninety')
    );
    // mapping of order of magnitude to string
    private $_magnitude = array(
        2 => 'hundred',
        3 => 'thousand',
        6 => 'million',
        9 => 'billion',
        12 => 'trillion',
        15 => 'quadrillion',
        18 => 'quintillion',
        21 => 'sextillion',
        24 => 'septillion',
	27 => 'octillion',
	30 => 'nonillion',
	33 => 'decillion',
	36 => 'undecillion',
	39 => 'duodecillion',
	42 => 'tredecillion'
    );
    // result string
    private $result = '';

    /**
     * convert
     *
     * public function to convert integer input to string
     *
     * @param integer $input
     * @access public
     * @return string
     */
    public function convert($input)
    {
        $inputs = array_chunk(array_reverse(str_split((String) $input)), 3);

        foreach ($inputs as $chunk_index => $chunk) {
            $res = '';
            if (isset($chunk[2])) {
                $res = $this->digit2char(0, $chunk[2], $this->_magnitude[2]);
            }
            if ( ($res !== '') && (0 < $chunk[0] . $chunk[1]) ) {
                $res .= ' and ';
            }
            if (isset($chunk[1])) {
                if ($chunk[1] == 0) {
                    // skip if zero, no corresponding word
                } else if ($chunk[1] == 1) {
                    $res .= $this->digit2char(1, $chunk[1] . $chunk[0]);
                } else {
                    $res .= $this->digit2char(2, $chunk[1]);
                }
            }
            if (!isset($chunk[1]) || ( ($chunk[1] != 1)  && ($chunk[0] != 0) ) ) {
                $res .= $this->digit2char(0, $chunk[0]);
            }
            if (isset($this->_magnitude[$chunk_index * 3])) {
                $res .= $this->_magnitude[$chunk_index * 3] . ', ';
            }
            $this->result = $res . $this->result;
        }
        return trim($this->result);
    }

    /**
     * digit2char
     *
     * convert digit to corresponding word
     *
     * @param integer $index
     * @param integer $value
     * @param string $multiplicand
     * @access private
     * @return string
     */
    private function digit2char($index, $value, $multiplicand = '')
    {
        $res = '';
        if (($index === 0) || ((int) $value !== 0)) {
            $res = $this->_mapping_digit[$index][$value];
        }
        if ('' !== $res) {
            $res .=  ' ' . $multiplicand;
        }
        return $res;
    }
}

<?php

/**
 * This is part three of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Mine Field
 * Task: A field of N x M squares is represented by N lines of exactly M
 * characters each. The character '*' represents a mine and the character '.'
 * represents no-mine.
 *
 * Example input(3x4 mine field)<pre>
 * *...
 * ..*.
 * ....</pre>
 *
 *
 * Expected output:<pre>
 * *211
 * 12*1
 * 0111</pre>
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class MineField {
    private $mineChar = '*';
    private $input    = array();
    private $output   = '';

    /**
     * convert
     *
     * @param mixed $input
     * @access public
     * @return string
     */
    public function convert($input)
    {
        $this->parseInput($input);
        $this->processInput();
        return $this->output;
    }

    /**
     * processInput
     *
     * loop through input and create output string
     *
     * @access private
     */
    private function processInput()
    {
        foreach ($this->input as $row_index => $row_array) {
            foreach ($row_array as $i => $c) {
                $this->output .= $this->convertChar($row_index, $i, $c);
            }
            if ($row_index + 1 < count($this->input)) {
                $this->output .= "\n";
            }
        }
    }

    /**
     * convertChar
     *
     * convert input character to either mine character or number
     *
     * @param integer $row_index
     * @param integer $char_index
     * @param string $char
     * @access private
     * @return integer
     */
    private function convertChar($row_index, $char_index, $char)
    {
        if ($this->mineChar === $char) {
            return $char;
        }
        // grab all surrounding characters
        $charsToTest  = '';
        $charsToTest .= $this->getChar($row_index - 1, $char_index - 1);
        $charsToTest .= $this->getChar($row_index - 1, $char_index);
        $charsToTest .= $this->getChar($row_index - 1, $char_index + 1);
        $charsToTest .= $this->getChar($row_index, $char_index - 1);
        $charsToTest .= $this->getChar($row_index, $char_index + 1);
        $charsToTest .= $this->getChar($row_index + 1, $char_index - 1);
        $charsToTest .= $this->getChar($row_index + 1, $char_index);
        $charsToTest .= $this->getChar($row_index + 1, $char_index + 1);

        return strlen($charsToTest) - strlen(str_replace($this->mineChar, '', $charsToTest));
    }

    /**
     * getChar
     *
     * @param integer $row_index
     * @param integer $char_index
     * @access private
     * @return char
     */
    private function getChar($row_index, $char_index)
    {
        if (array_key_exists($row_index, $this->input) && array_key_exists($char_index, $this->input[$row_index])) {
            return $this->input[$row_index][$char_index];
        } else {
            return '';
        }
    }

    /**
     * parseInput
     *
     *  process input. convert string to array if necessary
     *
     * @param mixed $input
     * @access private
     * @return void
     */
    private function parseInput($input)
    {
        if (is_string($input)) {
            $tmp = explode("\n", $input);
            foreach ($tmp as $l) {
                $this->input[] = str_split($l);
            }
        } else if (is_array($input)) {
            $this->input = $input;
        } else {
            throw new Exception('Fatal error: Input must be array or string!');
        }
    }
}

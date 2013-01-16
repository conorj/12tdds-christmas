<?php
/**
 * This is part one of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * CalcStats
 * Task: Your task is to process a sequence of integer numbers
 * to determine the following statistics:
 * <ul>
 *   <li>minimum value</li>
 *   <li>maximum value</li>
 *   <li>mumbe of elements in sequence</li>
 *   <li>average value</li>
 * </ul>
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class CalcStats {
    private $input = array();

    /**
     * __construct
     *
     * @param Array $input
     * @access public
     */
    public function __construct(Array $input)
    {
        $this->input = $input;
        sort($this->input, SORT_NUMERIC);
    }

    /**
     * getMinNumber
     *
     * return minimum number
     *
     * @access public
     * @return int
     */
    public function getMinNumber()
    {
        return $this->input[0];
    }

    /**
     * getMaxNumber
     *
     * return maximum number
     *
     * @access public
     * @return int
     */
    public function getMaxNumber()
    {
        return end($this->input);
    }

     /**
     * getInputLength
     *
     * return number of items in input
     *
     * @access public
     * @return int
     */
    public function getInputLength()
    {
        return count($this->input);
    }

     /**
     * getAverage
     *
     * return average of items in input
     *
     * @access public
     * @return int
     */
    public function getAverage()
    {
        return array_sum($this->input) / $this->getInputLength();
    }
}

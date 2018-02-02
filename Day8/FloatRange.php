<?php
/**
 * This is part 8 of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * FloatRange
 * Task: Write a Range class that accepts two floating opint numbers and creates a range from them
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class FloatRange
{
    public $range;

    /**
     * __construct
     *
     * @param integer $start
     * @param integer $end
     * @return Range
     */
    public function __construct($start, $end, $step = 0.1)
    {
        $this->range = range($start, $end - $step, $step);
    }

    /**
     * contains
     *
     * return true if $needle contained in range
     *
     * @param integer $needle
     * @return boolean
     */
    public function contains($needle)
    {
        return in_array($needle, $this->range);
    }

    /**
     * intersect with $otherRange
     *
     * @param Range $otherRange
     * @return array
     */
    public function intersect($otherRange)
    {
        return array_values(array_intersect($this->range, $otherRange->range));
    }
}

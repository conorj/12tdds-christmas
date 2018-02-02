<?php
use PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../../Day8/IntegerRange.php');
/**
 * IntegerRangeTest
 *
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class IntegerRangeTest extends TestCase {
    public function testIntegerInRange()
    {
        $range = new IntegerRange(1, 10);
        $this->assertCount(9, $range->range);
        $this->assertFalse($range->contains(11));
        $this->assertTrue($range->contains(9));
    }

    public function testIntersectRange()
    {
        $rangeA = new IntegerRange(1, 10);
        $rangeB = new IntegerRange(5, 15);
        $this->assertEquals([5,6,7,8,9], $rangeA->intersect($rangeB));
    }
}

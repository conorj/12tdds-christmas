<?php
use PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../../Day8/FloatRange.php');
/**
 * FloatRangeTest
 *
 * @uses PHPUnit
 * @uses TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class FloatRangeTest extends TestCase
{
    public function testFloatInRange()
    {
        $range = new FloatRange(1.0, 1.5);
        $this->assertCount(5, $range->range);
        $this->assertFalse($range->contains(1.6));
        $this->assertTrue($range->contains(1.3));
    }

    public function testIntersectRange()
    {
        $rangeA = new FloatRange(1, 1.5);
        $rangeB = new FloatRange(1.3, 1.8);
        $this->assertEquals([1.3, 1.4], $rangeA->intersect($rangeB));
    }
}

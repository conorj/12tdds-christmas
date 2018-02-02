<?php
use PHPUnit\Framework\TestCase;

include('/home/cryan/.config/composer/vendor/autoload.php');
require_once(__DIR__.'/../../Day9/TenPinBowling.php');
/**
 * TenPinBowlingTest
 *
 * @uses PHPUnit
 * @uses TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class TenPinBowlingTest extends TestCase
{
    private $obj;

    public function setUp()
    {
        $this->obj = new TenPinBowling();
    }

    public function testAllMisses()
    {
        $this->assertEquals(0, $this->obj->calculateScore('--|--|--|--|--|--|--|--|--|--||'));
    }

    public function testAllNumbers()
    {
        $this->assertEquals(90, $this->obj->calculateScore('45|45|45|45|45|45|45|45|45|45||'));
    }

    public function testAllSpares()
    {
        $this->assertEquals(140, $this->obj->calculateScore('4/|4/|4/|4/|4/|4/|4/|4/|4/|4/||4'));
    }

    public function testAllStrikes()
    {
        $this->assertEquals(300, $this->obj->calculateScore('X|X|X|X|X|X|X|X|X|X||XX'));
        $this->assertEquals(285, $this->obj->calculateScore('X|X|X|X|X|X|X|X|X|X||55'));
        $this->assertEquals(270, $this->obj->calculateScore('X|X|X|X|X|X|X|X|X|X||--'));
    }

    public function testMix()
    {
        $this->assertEquals(168, $this->obj->calculateScore('X|-/|X|1/|X|--|X|45|-/|X||XX'));
    }
}

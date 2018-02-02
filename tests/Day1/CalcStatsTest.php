<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../../Day1/CalcStats.php');
class CalcStatsTest extends TestCase {
    public function setUp() {
      $input = array(-3,-2,-1,0,1,2,3);
      $this->obj   = new CalcStats($input);
    }
  public function testGetMinNumber() {
    $this->assertEquals(-3,$this->obj->getMinNumber(),'Minimum number should be -3!');
  }
  public function testGetMaxNumber() {
    $this->assertEquals(3,$this->obj->getMaxNumber(),'Maximum number should be 3!');
  }
  public function testNumberOfElements() {
    $this->assertEquals(7,$this->obj->getInputLength(),'Number of items in input should be 7!');
  }
  public function testAverageValue() {
    $this->assertEquals(0,$this->obj->getAverage(),'Average of numbers should be 0!');
  }
}

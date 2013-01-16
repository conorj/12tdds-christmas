<?php
require_once(__DIR__.'/../../Day2/IntegerToString.php');
class IntegerToStringTest extends PHPUnit_Framework_TestCase {
    private $_test_data = array(
        0 => 'zero',
        1 => 'one',
        10 => 'ten',
        11 => 'eleven',
        20 => 'twenty',
        21 => 'twenty one',
        99 => 'ninety nine',
        300 => 'three hundred',
        301 => 'three hundred and one',
        310 => 'three hundred and ten',
        1501 => 'one thousand, five hundred and one',
        12609 => 'twelve thousand, six hundred and nine',
        512607 => 'five hundred and twelve thousand, six hundred and seven',
        43112603 => 'forty three million, one hundred and twelve thousand, six hundred and three',
        943112603 => 'nine hundred and forty three million, one hundred and twelve thousand, six hundred and three',
        5943112603 => 'five billion, nine hundred and forty three million, one hundred and twelve thousand, six hundred and three',
        9875943112603 => 'nine trillion, eight hundred and seventy five billion, nine hundred and forty three million, one hundred and twelve thousand, six hundred and three',
  );
  public function testData() {
    foreach($this->_test_data as $i => $s) {
        $obj = new IntegerToString();
        $this->assertEquals($s,$obj->convert($i),"Error: expecting \'$s\'!");
        unset($obj);
    }
  }
}

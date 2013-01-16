<?php
require_once(__DIR__.'/../../Day3/MineField.php');
class MineFieldTest extends PHPUnit_Framework_TestCase {
    private $_test_data = array(
        "..\n.." => "00\n00",
        ".*\n.." => "1*\n11",
        ".*.\n..." => "1*1\n111",
        ".*..\n...." => "1*10\n1110",
  );
  public function testData() {
    foreach($this->_test_data as $i => $s) {
        $obj = new MineField();
        $this->assertEquals($s,$obj->convert($i),"Error: expecting \'$s\'!");
        unset($obj);
    }
  }
}

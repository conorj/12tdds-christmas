<?php
require_once(__DIR__.'/../../Day4/MontyHall.php');

/**
 * MontyHallTest
 *
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class MontyHallTest extends PHPUnit_Framework_TestCase {
    public function testSimulation()
    {
        $obj = new MontyHall();
        echo $obj->runSimulation();
    }
}

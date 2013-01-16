<?php
require_once(__DIR__.'/../../Day5/FizzBuzz.php');
/**
 * FizzBuzzTest
 *
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class FizzBuzzTest extends PHPUnit_Framework_TestCase {
    private $expected_output = "1\n2\nFizz\n4\nBuzz\nFizz\n7\n8\nFizz\nBuzz\n11\nFizz\n13\n14\nBuzzFizz\n16\n17\nFizz\n19\nBuzz\nFizz\n22\n23\nFizz\nBuzz\n26\nFizz\n28\n29\nBuzzFizz\n31\n32\nFizz\n34\nBuzz\nFizz\n37\n38\nFizz\nBuzz\n41\nFizz\n43\n44\nBuzzFizz\n46\n47\nFizz\n49\nBuzz\nFizz\n52\n53\nFizz\nBuzz\n56\nFizz\n58\n59\nBuzzFizz\n61\n62\nFizz\n64\nBuzz\nFizz\n67\n68\nFizz\nBuzz\n71\nFizz\n73\n74\nBuzzFizz\n76\n77\nFizz\n79\nBuzz\nFizz\n82\n83\nFizz\nBuzz\n86\nFizz\n88\n89\nBuzzFizz\n91\n92\nFizz\n94\nBuzz\nFizz\n97\n98\nFizz\nBuzz";

    /**
     * testFizzBuzz
     *
     * @covers FizzBuzz::run
     * @access public
     * @return void
     */
    public function testFizzBuzz()
    {
        $obj = new FizzBuzz();
        $this->assertEquals($this->expected_output,$obj->run(),'Unexpected output!');
    }
}

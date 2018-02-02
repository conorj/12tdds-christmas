<?php
use PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../../Day7/TemplateEngine.php');

/**
 * TemplateEngineTest
 *
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class TemplateEngineTest extends TestCase {
    public function SetUp()
    {
        $this->obj = new TemplateEngine();
    }
    public function testSetTemplateVariable()
    {
        $this->obj->setVariable('Name','Peter');
    $this->assertEquals('Peter',$this->obj->getVariable('Name'),'Error: variable not set correctly!');
    }
    public function testSingleReplacement()
    {
        $this->obj->setVariable('name','Tom');
    $this->assertEquals('My name is Tom',$this->obj->evaluate('My name is {$name}'),'Error: template not evaluated correctly!');
    }
    public function testMultipleReplacements()
    {
        $this->obj->setVariable('firstName','Tim');
        $this->obj->setVariable('lastName','Thumb');
    $this->assertEquals('My name is Tim Thumb',$this->obj->evaluate('My name is {$firstName} {$lastName}'),'Error: template not evaluated correctly!');
    }
    public function testMissingReplacements()
    {
        $this->expectException(MissingValueException::class);
        $this->obj->evaluate('My name is {$firstName}');
    }
    public function testComplexReplacements()
    {
        $this->obj->setVariable('firstName','Tim');
        $this->obj->setVariable('lastName','Thumb');
        $this->assertEquals('My name is ${Tim} Thumb',$this->obj->evaluate('My name is ${{$firstName}} {$lastName}'),'Error: template not evaluated correctly!');
    }
}

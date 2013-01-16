<?php
require_once(__DIR__.'/../../Day6/RecentlyUsedList.php');
/**
 * RecentlyUsedList
 *
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class RecentlyUsedListTest extends PHPUnit_Framework_TestCase {
    private $expected_output = "";

    /**
     * testListIsInitiallyEmpty
     *
     * @covers RecentlyUsedList::length()
     * @access public
     * @return void
     */
    public function testListIsInitiallyEmpty()
    {
        $obj = new RecentlyUsedList();
        $this->assertEquals(0, $obj->length(), 'Error: List should initially be empty!');
    }

    /**
     * testListOrdering
     *
     * test items added to list ion correct order
     *
     * @covers RecentlyUsedList::add()
     * @covers RecentlyUsedList::indexAt()
     * @covers RecentlyUsedList::length()
     * @access public
     * @return void
     */
    public function testListOrdering()
    {
        $obj = new RecentlyUsedList();
        $obj->add('First');
        $obj->add('Last');
        $this->assertEquals('Last', $obj->indexAt(0), 'Error: first item in list should be last added!');
        $this->assertEquals('First', $obj->indexAt($obj->length() - 1), 'Error: last-in should be first-out!');
    }

    /**
     * testListUniqueness
     *
     * test string not added to list twice
     *
     * @covers RecentlyUsedList::add()
     * @covers RecentlyUsedList::all()
     * @covers RecentlyUsedList::length()
     * @access public
     * @return void
     */
    public function testListUniqueness()
    {
        $obj = new RecentlyUsedList();
        $obj->add('First');
        $obj->add('Middle');
        $obj->add('Last');
        $unique_length = $obj->length();
        $obj->add('Middle');
        $this->assertEquals($unique_length, $obj->length(), 'Error: all list items should be unique!');
        $this->assertEquals(array('Middle', 'Last', 'First'), $obj->all(), 'Error: all list items should be unique!');
    }

    /**
     * testEmptyStringIgnored
     *
     * test that empty string not added to list
     *
     * @covers RecentlyUsedList::add()
     * @covers RecentlyUsedList::all()
     * @access public
     * @return void
     */
    public function testEmptyStringIgnored()
    {
        $obj = new RecentlyUsedList();
        $obj->add('First');
        $obj->add('Middle');
        $obj->add('Last');
        $obj->add('');
        $this->assertEquals(array('Last', 'Middle', 'First'), $obj->all(), 'Error: Empty string should be ignored!');
    }

    /**
     * testLimit
     *
     * test that only specified number of items kept in array
     *
     * @covers RecentlyUsedList::add()
     * @covers RecentlyUsedList::all()
     * @access public
     * @return void
     */
    public function testLimit()
    {
        $obj = new RecentlyUsedList(2);
        $obj->add('First');
        $obj->add('Middle');
        $obj->add('Last');
        $this->assertEquals(array('Last', 'Middle'), $obj->all(), 'Error: List should be limited to 2 items!');
    }
}

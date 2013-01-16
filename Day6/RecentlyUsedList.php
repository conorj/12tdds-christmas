<?php
/**
 * This is part six of the 12 TDDs of Christmas as appeared on
 * http://www.wiredtothemoon.com/
 *
 * Recently Used List
 * Task: Keep unique list of strings in last-in first-out order
 *
 *
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class RecentlyUsedList {
    private $list  = array();
    private $limit = -1;

    /**
     * __construct
     *
     * @param integer $limit
     * @access public
     * @return void
     */
    public function __construct($limit = -1)
    {
        $this->list  = array();
        $this->limit = $limit;
    }

    /**
     * length
     *
     * return length of list
     *
     * @access public
     * @return integer
     */
    public function length()
    {
        return count($this->list);
    }

    /**
     * add
     *
     * add item to list, if non-empty, and move previous entry if present
     *
     * @param string $item
     * @access public
     * @return void
     */
    public function add($item)
    {
        if ('' === (String) $item) {
            return;
        }
        // prepend item to list
        array_unshift($this->list, $item);
        // remove duplicate items and reindex
        $this->list = array_values(array_unique($this->list));
        if ($this->limit > 0) {
            $this->list = array_slice($this->list, 0, $this->limit);
        }
    }

    /**
     * indexAt
     *
     * return item from list at specified index
     *
     * @param integer $index
     * @access public
     * @return string
     */
    public function indexAt($index)
    {
        return $this->list[$index];
    }

    /**
     * all
     *
     * return entire list as array
     *
     * @access public
     * @return array
     */
    public function all()
    {
        return $this->list;
    }
}

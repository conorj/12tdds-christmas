<?php

class PhoneNumber
{
    const OK = 0;
    const NOT_OK = 1;
    const EMPTY_INPUT = 2;

    // var to hold trie
    public $trie = null;
    public $status;

    /**
     * add item to trie and return self
     *
     * @param string $key
     * @param string $value
     * @return MyTrie
     */
    public function add($key, $value)
    {
        // strip out whitespace and test for empty string
        $data = $this->cleanKey($key);
        if ('' === $data) {
            $this->status = self::EMPTY_INPUT;
            return $this;
        }

        $this->assignKeys($data);

        $this->assignValue($value);

        return $this;
    }

    /**
     * strip all whitespace from $key
     *
     * @param string $key
     * @return string
     */
    private function cleanKey($key)
    {
        return str_replace(' ', '', $key);
    }

    /**
     * assign chars in $data to trie
     *
     * @param string $data
     * @return void
     */
    private function assignKeys($data)
    {
        $this->currNode = &$this->trie;
        $index = 0;

        while ($index < strlen($data)) {
            if (is_null($this->currNode) || (!array_key_exists($data[$index], $this->currNode))) {
                $this->currNode[$data[$index]] = null;
                $this->currNode =& $this->currNode[$data[$index]];
            } else {
                $this->currNode =& $this->currNode[$data[$index]];
            }
            $index++;
        }
    }

    /**
     * assign $value to last char
     *
     * need to check if updates allowed if char already has value assigned
     *
     * @param string $value
     * @return void
     */
    private function assignValue($value)
    {
        if (!$this->isNew() && $this->forbiddenPrefix()) {
            $this->status = self::NOT_OK;
            return;
        }

        $this->currNode['value'] = $value;
        $this->status = self::OK;
    }

    /**
     * item being added is new
     *
     * @return boolean
     */
    private function isNew()
    {
        return is_null($this->currNode);
    }

    /**
     * return true if key prefix of previous value and allowPrefixes is false, true otherwise
     *
     * @return boolean
     */
    private function forbiddenPrefix()
    {
        // count number of keys other than 'value' and explicitly cast to boolean. zero is false, all others ar true
        $hasOtherPrefixes = (boolean) count(array_diff_key($this->currNode, ['value' => '']));
        if ($hasOtherPrefixes) {
            return true;
        }

        return false;
    }
}

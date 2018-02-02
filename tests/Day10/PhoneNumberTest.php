<?php

use PHPUnit\Framework\TestCase;

include('/home/cryan/.config/composer/vendor/autoload.php');
require_once(__DIR__.'/../../Day10/PhoneNumber.php');

/**
 * PhoneNumber
 *
 * @uses PHPUnit
 * @uses TestCase
 * @author Conor Ryan <conor.ryan1302@gmail.com>
 */
class PhoneNumberTest extends TestCase
{
    /**
     * test empty input handled correctly
     *
     */
    public function testEmptyInput()
    {
        $trie = new PhoneNumber();
        $trie->add(' ', '');
        $this->assertEquals(PhoneNumber::EMPTY_INPUT, $trie->status);
    }

    /**
     * test basic input handled correctly
     *
     */
    public function testBasicInput()
    {
        $trie = new PhoneNumber();
        $trie->add('91 12 54 26', 'Tim')->add('92 13 55 26', 'Tam');
        $this->assertEquals(PhoneNumber::OK, $trie->status);
        $this->assertEquals(
            ['9' =>
                ['1' => ['1' => ['2' => ['5' => ['4' => ['2' => ['6' => ['value' => 'Tim']]]]]]],
                '2' => ['1' => ['3' => ['5' => ['5' => ['2' => ['6' => ['value' => 'Tam']]]]]]]]
            ],
            $trie->trie
        );
    }

    /**
     * test forbidden prefixes
     *
     */
    public function testPrefixes()
    {
        $trie = new PhoneNumber();
        $trie->add('91 12 54 26', 'Tim')->add('911', 'Emergency');
        $this->assertEquals(PhoneNumber::NOT_OK, $trie->status);
        $this->assertEquals(
            ['9' =>
                ['1' => ['1' => ['2' => ['5' => ['4' => ['2' => ['6' => ['value' => 'Tim']]]]]]]]
            ],
            $trie->trie
        );
    }
}

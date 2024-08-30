<?php

declare(strict_types=1);

namespace tests\L43_SearchEngine;

use DSA\L43_SearchEngine\LongestMatch;
use PHPUnit\Framework\TestCase;

class LongestMatchTest extends TestCase
{
    public function testByTrieTree()
    {
        $actual = LongestMatch::byTrieTree(
            '大家好中国人民解放了',
            ['中国', '中国人', '中国人民', '中国人民解放军', '好中国人民', '中国人民解放']
        );
        self::assertSame('中国人民解放', $actual);
    }
}

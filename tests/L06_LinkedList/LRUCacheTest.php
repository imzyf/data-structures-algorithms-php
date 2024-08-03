<?php

namespace tests\L06_LinkedList;

use DSA\L06_LinkedList\LRUCache;
use PHPUnit\Framework\TestCase;

class LRUCacheTest extends TestCase
{

    public function testMain()
    {
        $cache = new LRUCache(3);
        $cache->put("a", "a");
        $cache->put("a", "a");
        $cache->put("b", "b");
        self::assertSame(["a", "b"], $cache->getKeys());

        $cache->put("a", "a");
        self::assertSame(["b", "a",], $cache->getKeys());

        $cache->put("c", "c");
        self::assertSame(["b", "a", "c"], $cache->getKeys());

        $cache->put("e", "e");
        self::assertSame(["a", "c", "e"], $cache->getKeys());

        $cache->put("c", "c");
        self::assertSame(["a", "e", "c",], $cache->getKeys());
    }
}

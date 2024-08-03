<?php

namespace tests\L06_LinkedList;

use DSA\L06_LinkedList\LinkedLRUCache;
use PHPUnit\Framework\TestCase;

class LinkedLRUCacheTest extends TestCase
{
    public function testMain()
    {
        $cache = new LinkedLRUCache(2);
        self::base($cache);
    }

    public static function base(LinkedLRUCache $cache)
    {
        $cache->put(1, 1);
        $cache->put(2, 2);
        self::assertSame([1, 2], $cache->getKeys());
        self::assertSame(1, $cache->get(1));
        self::assertSame([2, 1], $cache->getKeys());

        $cache->put(3, 3);
        self::assertSame([1, 3], $cache->getKeys());
        self::assertSame(null, $cache->get(2));
        self::assertSame([1, 3], $cache->getKeys());

        $cache->put(4, 4);
        self::assertSame(null, $cache->get(1));
        self::assertSame([3, 4], $cache->getKeys());
        //        self::assertSame(4, $cache->get(4));
    }
}

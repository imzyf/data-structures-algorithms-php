<?php

namespace tests\L06_LinkedList;

use DSA\L06_LinkedList\LRUCacheGPT;
use PHPUnit\Framework\TestCase;

class LRUCacheGPTTest extends TestCase
{
    public function testMain()
    {
        $cache = new LRUCacheGPT(2);

        $cache->put(1, 1);
        $cache->put(2, 2);
        self::assertSame(1, $cache->get(1));


        $cache->put(3, 3);      // 移除键 2
        self::assertSame(-1, $cache->get(2));

        $cache->put(4, 4);      // 移除键 1
        self::assertSame(-1, $cache->get(1));
        self::assertSame(3, $cache->get(3));
        self::assertSame(4, $cache->get(4));
    }
}

<?php

namespace tests\L07_LinkedList;

use DSA\L07_LinkedList\Guard;
use PHPUnit\Framework\TestCase;

class GuardTest extends TestCase
{
    public function testFind()
    {
        $a = [4, 2, 3, 5, 9, 6];
        $n = count($a);
        $key = 7;

        $guard = new Guard();
        self::assertSame(-1, $guard->find($a, $n, $key));
        self::assertSame(-1, $guard->without($a, $n, $key));

        $key = 6;
        self::assertSame(5, $guard->find($a, $n, $key));
        self::assertSame(5, $guard->without($a, $n, $key));

        $key = 2;
        self::assertSame(1, $guard->find($a, $n, $key));
        self::assertSame(1, $guard->without($a, $n, $key));
    }
}

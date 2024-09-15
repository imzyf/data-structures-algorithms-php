<?php

declare(strict_types=1);

namespace tests\L13_Sort;

use DSA\L13_Sort\CountingSort;
use PHPUnit\Framework\TestCase;

class CountingSortTest extends TestCase
{
    public function testMain()
    {
        self::assertSame([0, 0, 2, 2, 3, 3, 3, 5], CountingSort::main([2, 5, 3, 0, 2, 3, 0, 3]));
    }
}

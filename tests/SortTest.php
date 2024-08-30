<?php

declare(strict_types=1);

namespace tests;

use L99_Interview\Sort;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public function testSort()
    {
        $m = new Sort();
        self::assertSame([[1, 2], [2, 1]], $m->main([1, 2]));
    }
}

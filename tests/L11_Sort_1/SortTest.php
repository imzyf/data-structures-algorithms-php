<?php

declare(strict_types=1);

namespace tests\L11_Sort_1;

use DSA\L11_Sort_1\Sort;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public function testBubbleSort()
    {
        self::assertSame([1, 2, 3, 4, 5, 6], Sort::bubbleSort([6, 4, 5, 2, 3, 1], 6));
    }

    public function testInsertionSort()
    {
        self::assertSame([1, 2, 3, 4, 5, 6], Sort::insertionSort([4, 5, 6, 1, 3, 2], 6));
    }

    public function testSelectionSort()
    {
        self::assertSame([1, 2, 3, 4, 5, 6], Sort::selectionSort([4, 5, 6, 1, 3, 2], 6));
        self::assertSame([2, 5, 5, 8, 9], Sort::selectionSort([5, 8, 5, 2, 9], 5));
    }
}

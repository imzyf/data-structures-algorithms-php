<?php

declare(strict_types=1);

namespace tests\L99_Interview;

use DSA\L99_Interview\ArrayPermutation;
use PHPUnit\Framework\TestCase;

class ArrayPermutationTest extends TestCase
{
    public function testPermute()
    {
        $e = [[1, 2, 3], [1, 3, 2], [2, 1, 3], [2, 3, 1], [3, 1, 2], [3, 2, 1]];
        $a = (new ArrayPermutation())->permute([1, 2, 3]);

        self::assertSame($e, $a);
    }
}

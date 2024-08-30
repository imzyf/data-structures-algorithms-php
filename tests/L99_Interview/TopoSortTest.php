<?php

declare(strict_types=1);

namespace tests\L99_Interview;

use DSA\L99_Interview\TopoSort;
use PHPUnit\Framework\TestCase;

class TopoSortTest extends TestCase
{
    public function testCalc()
    {
        $model = new TopoSort(3, [[0, 1]]);
        self::assertSame([1, 0, 2], $model->calcOneResult());
        $model = new TopoSort(3, [[0, 1]]);
        self::assertSame([[1, 0, 2], [1, 2, 0], [2, 1, 0]], $model->calcAllResult());

        $model = new TopoSort(3, [[1, 0], [2, 0]]);
        self::assertSame([0, 1, 2], $model->calcOneResult());
        $model = new TopoSort(3, [[1, 0], [2, 0]]);
        self::assertSame([[0, 1, 2], [0, 2, 1]], $model->calcAllResult());

        $model = new TopoSort(3, [[1, 0], [2, 0], [1, 2]]);
        self::assertSame([0, 2, 1], $model->calcOneResult());
        $model = new TopoSort(3, [[1, 0], [2, 0], [1, 2]]);
        self::assertSame([[0, 2, 1]], $model->calcAllResult());

        $model = new TopoSort(4, [[1, 0], [3, 2], [1, 2], [3, 1]]);
        self::assertSame([0, 2, 1, 3], $model->calcOneResult());
    }
}

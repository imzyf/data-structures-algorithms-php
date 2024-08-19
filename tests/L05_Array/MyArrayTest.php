<?php

declare(strict_types=1);

namespace tests\L05_Array;

use DSA\L05_Array\MyArray;
use PHPUnit\Framework\TestCase;

class MyArrayTest extends TestCase
{
    public function testAll()
    {
        $myArr1 = new MyArray(10);
        for ($i = 0; $i < 9; ++$i) {
            $myArr1->insert($i, $i + 1);
        }
        // |1|2|3|4|5|6|7|8|9
        $myArr1->printData();
        // 差一个
        self::assertFalse($myArr1->checkIfFull());

        // 无法插入
        self::assertTrue($myArr1->insert(6, 999));
        // 满了
        self::assertTrue($myArr1->checkIfFull());
        // |1|2|3|4|5|6|999|7|8|9
        $myArr1->printData();

        // 删除一个
        self::assertTrue($myArr1->delete(5));
        // |1|2|3|4|5|999|7|8|9
        $myArr1->printData();

        self::assertTrue($myArr1->delete(0));
        // |2|3|4|5|999|7|8|9
        $myArr1->printData();

        self::assertSame(2, $myArr1->find(0));
        // |2|3|4|5|999|7|8|9
        $myArr1->printData();
    }
}

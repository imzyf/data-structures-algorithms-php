<?php

declare(strict_types=1);

namespace tests\L13_Sort;

use DSA\L13_Sort\RadixSort;
use PHPUnit\Framework\TestCase;

class RadixSortTest extends TestCase
{
    public function testMain()
    {
        $list = [
            '13812345678',
            '15987654321',
            '17123456789',
            '18234567890',
            '13987654321',
            '15123456789',
            '17987654321',
            '18123456789',
            '13234567890',
            '15987654321',
            '15987432421',
            '18112256789',
        ];

        self::assertSame([
            0 => '13234567890',
            1 => '13812345678',
            2 => '13987654321',
            3 => '15123456789',
            4 => '15987432421',
            5 => '15987654321',
            6 => '15987654321',
            7 => '17123456789',
            8 => '17987654321',
            9 => '18112256789',
            10 => '18123456789',
            11 => '18234567890',
        ], RadixSort::main($list));
    }

    public function testSortIntList()
    {
        $list = [
            1234,
            4321,
            12,
            31,
            412,
        ];

        self::assertSame([
            12,
            31,
            412,
            1234,
            4321,
        ], RadixSort::sortIntList($list));
    }
}

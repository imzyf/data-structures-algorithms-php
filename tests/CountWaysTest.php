<?php

declare(strict_types=1);

namespace tests;

use DSA\L99_Interview\CountWays;
use PHPUnit\Framework\TestCase;

class CountWaysTest extends TestCase
{
    public function testMain()
    {
        $dom = new CountWays();

        $amount = 100;
        $size = [1, 2, 5, 10, 20, 50];
        $max = 10;
        $ret = $dom->test2(5);

        dump($ret);
    }
}

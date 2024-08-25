<?php

declare(strict_types=1);

namespace tests\L34_KMP;

use DSA\L34_KMP\StringKMP;
use PHPUnit\Framework\TestCase;

class StringKMPTest extends TestCase
{
    public function testGetPrefix()
    {
        $partten = 'ABCDABD';

        var_dump(StringKMP::getPrefix($partten));
    }
}

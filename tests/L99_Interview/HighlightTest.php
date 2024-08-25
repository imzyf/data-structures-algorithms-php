<?php

declare(strict_types=1);

namespace tests\L99_Interview;

use DSA\L99_Interview\Highlight;
use PHPUnit\Framework\TestCase;

class HighlightTest extends TestCase
{
    public function testMain(): void
    {
        $s = '你好大家好';
        $keys = ['好大', '大家'];
        $actual = Highlight::highlight($s, $keys);
        self::assertSame('你<highlight>好大家</highlight>好', $actual);

        $s = '你好大家好';
        $keys = ['好', '好大', '大家'];
        $actual = Highlight::highlight($s, $keys);
        self::assertSame('你<highlight>好大家好</highlight>', $actual);

        $s = '你好大大家好';
        $keys = ['大', '大家'];
        $actual = Highlight::highlight($s, $keys);
        self::assertSame('你好<highlight>大大家</highlight>好', $actual);

        $s = '你好大大家好大大';
        $keys = ['大', '大家'];
        $actual = Highlight::highlight($s, $keys);
        self::assertSame('你好<highlight>大大家</highlight>好<highlight>大大</highlight>', $actual);

        $s = '你好大大家好大大';
        $keys = ['大', '大家好', '大家'];
        $actual = Highlight::highlight($s, $keys);
        self::assertSame('你好<highlight>大大家好大大</highlight>', $actual);
    }
}

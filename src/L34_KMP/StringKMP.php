<?php

declare(strict_types=1);

namespace DSA\L34_KMP;

class StringKMP
{
    public static function getPrefix(string $partten)
    {
        $prefix = [
            0 => 0,
        ];
        $plen = strlen($partten);

        $len = 0;
        for ($i = 1; $i < $plen; ++$i) {
            while ($len > 0 && $partten[$len] !== $partten[$i]) {
                // 缩小范围
                $len = $prefix[$len - 1];
            }

            if ($partten[$len] === $partten[$i]) {
                ++$len;
            }
            $prefix[$i] = $len;
        }

        return $prefix;
    }
}

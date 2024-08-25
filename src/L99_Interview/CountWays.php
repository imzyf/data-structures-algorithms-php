<?php

declare(strict_types=1);

namespace DSA\L99_Interview;

// 把一张100元面值的纸币，换成1，2，5，10，20，50元面值的纸币共有多少种换法。如果限制换来的纸币总数不能超过N张，又有多少种换法?
class CountWays
{
    /**
     * @param int $n 商品金额
     */
    public function test2($n)
    {
        // 纸币面额
        $money = [1, 5, 10, 20, 50, 100];
        $dp = array_fill(0, $n + 1, 0);
        $dp[0] = 1; // 组成0元的方式有1种

        for ($i = 0, $iMax = count($money); $i < $iMax; ++$i) {
            for ($j = $money[$i]; $j <= $n; ++$j) {
                $dp[$j] += $dp[$j - $money[$i]];
            }
        }
        echo $dp[$n]."\n"; // 输出组合数
    }

    // $startTime = microtime(true);
    // // 指定200元的金额
    // test2(200);
    // $endTime = microtime(true);
    // echo "执行时间：" . (($endTime - $startTime) * 1000) . "ms\n";
}

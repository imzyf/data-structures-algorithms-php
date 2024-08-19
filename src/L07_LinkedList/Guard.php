<?php

declare(strict_types=1);

namespace DSA\L07_LinkedList;

// 哨兵
class Guard
{
    // 在数组 a 中，查找 key，返回 key 所在的位置
    // 其中，n 表示数组 a 的长度
    public function without(?array $a, int $n, int $key): int
    {
        if (null === $a || $n <= 0) {
            return -1;
        }

        $i = 1;
        while ($i < $n) {
            if ($a[$i] === $key) {
                return $i;
            }
            ++$i;
        }

        return -1;
    }

    public function find(?array $a, int $n, int $key): int
    {
        if (null === $a || $n <= 0) {
            return -1;
        }

        // // 这里因为要将 a[n-1] 的值替换成 key，所以要特殊处理这个值
        if ($a[$n - 1] === $key) {
            return $n - 1;
        }

        // 把 key 的值放到 a[n-1] 中，此时 a = {4, 2, 3, 5, 9, 7}
        // 也就是从 $a 一定能找到 $key
        $a[$n - 1] = $key;

        $i = 0;
        // while 循环比起代码一，少了 i<n 这个比较操作
        while ($a[$i] !== $key) {
            ++$i;
        }

        if ($i === $n - 1) {
            // 如果 i == n-1 说明，在 0...n-2 之间都没有 key，所以返回 -1
            return -1;
        }

        // 否则，返回 i，就是等于 key 值的元素的下标
        return $i;
    }
}

<?php

declare(strict_types=1);

namespace DSA\L13_Sort;

/**
 * 基数排序
 * 先根据个位排序、百位、千位...
 *
 * 基数排序对要排序的数据是有要求的，需要可以分割出独立的“位”来比较，而且位之间有递进的关系，如果 a 数据的高位比 b 数据大，那剩下的低位就不用比较了。
 * 除此之外，每一位的数据范围不能太大，要可以用线性排序算法来排序，否则，基数排序的时间复杂度就无法做到 O(n) 了。
 */
class RadixSort
{
    public static function main(array $list): array
    {
        // 手机号码的长度都是 11
        // 切分为数组
        $arrList = $list;
        array_walk($arrList, static function (string|array &$v, int $k) {
            $v = mb_str_split($v);
        });

        for ($i = 10; $i >= 0; --$i) {
            $arrList = static::sort($i, $arrList);
        }

        array_walk($arrList, static function (string|array &$v, int $k) {
            $v = implode($v);
        });

        return $arrList;
    }

    protected static function sort(int $numIdx, array $arrList): array
    {
        $count = 10;
        // 统计个数
        $map = array_fill(0, $count, 0);
        foreach ($arrList as $v) {
            ++$map[$v[$numIdx]];
        }

        // 累计数量
        for ($i = 1; $i <= $count; ++$i) {
            $map[$i] += $map[$i - 1];
        }

        // 倒算
        $ret = new \SplFixedArray(count($arrList));
        for ($i = count($arrList) - 1; $i >= 0; --$i) {
            $v = $arrList[$i][$numIdx];
            $idx = $map[$v];
            --$idx;

            $ret[$idx] = $arrList[$i];

            $map[$v] = $idx;
        }

        return $ret->toArray();
    }

    /**
     * @param array<int> $list
     *
     * @return array<int>
     */
    public static function sortIntList(array $list): array
    {
        // 最大的长度 决定循环的次数
        $loop = strlen((string) max($list));

        // O(最大长度*n+桶的个数10)
        for ($i = 0; $i < $loop; ++$i) {
            $divisor = 10 ** $i;
            /**
             * @var $buckets<int, int[]>
             */
            $buckets = array_fill(0, 10, []);

            // 放入桶里
            foreach ($list as $number) {
                // 尾数
                $idx = $number / $divisor % 10;
                $buckets[$idx][] = $number;
            }

            // 遍历桶
            $listIdx = 0;
            foreach ($buckets as $bucket) {
                while (count($bucket) > 0) {
                    // 重新排序
                    $list[$listIdx++] = array_shift($bucket);
                }
            }
        }

        return $list;
    }
}

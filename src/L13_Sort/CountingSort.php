<?php

declare(strict_types=1);

namespace DSA\L13_Sort;

/**
 * 计数排序其实是桶排序的一种特殊情况。当要排序的 n 个数据，所处的范围并不大的时候，比如最大值是 k，我们就可以把数据划分成 k 个桶。
 * 每个桶内的数据值都是相同的，省掉了桶内排序的时间。
 *
 * 计数排序只能用在数据范围不大的场景中，如果数据范围 k 比要排序的数据n 大很多，就不适合用计数排序了。
 * 而且，计数排序只能给非负整数排序，如果要排序的数据是其他类型的，要将其在不改变相对大小的情况下，转化为非负整数。
 */
class CountingSort
{
    /**
     * @param array<int> $arr
     *
     * @return array<int>
     */
    public static function main(array $arr): array
    {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }

        $max = max($arr);

        // 计算每个元素的个数，放入 c 中
        $c = array_fill(0, $max, 0);
        foreach ($arr as $v) {
            ++$c[$v];
        }

        // 依次累加
        for ($i = 1; $i <= $max; ++$i) {
            $c[$i] += $c[$i - 1];
        }

        $ret = new \SplFixedArray($count);

        //        // 倒序遍历原数组
        //        for ($i = $count - 1; $i >= 0; --$i) {
        //            $v = $arr[$i];
        //            $idx = $c[$v];
        //            --$idx;
        //            $ret[$idx] = $v;
        //            $c[$v] = $idx;
        //        }

        foreach ($arr as $value) {
            // 减少
            --$c[$value];
            $ret[$c[$value]] = $value;
        }

        return $ret->toArray();
    }
}

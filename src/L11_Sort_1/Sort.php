<?php

declare(strict_types=1);

namespace DSA\L11_Sort_1;

// https://mp.weixin.qq.com/s/HQg3BzzQfJXcWyltsgOfCQ
class Sort
{
    /**
     * 一个原地排序算法 空间 O(1)
     * 是稳定排序算法
     * 最好 O(n) 最差 O(n2)
     *
     * @param array<int> $arr [3,5,4,1,2,6]
     */
    public static function bubbleSort(array $arr, int $n): array
    {
        if ($n < 1) {
            return $arr;
        }

        for ($i = 0; $i < $n; ++$i) {
            $isSwap = false;
            // 第 $i 个数据
            for ($j = 0; $j < $n - $i - 1; ++$j) {
                if ($arr[$j] > $arr[$j + 1]) {
                    [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
                    $isSwap = true;
                }
            }
            if (!$isSwap) {
                break;
            }
        }

        return $arr;
    }

    /**
     * @param array<int> $arr
     */
    public static function insertionSort(array $arr, int $n): array
    {
        if ($n < 1) {
            return $arr;
        }
        for ($i = 1; $i < $n; ++$i) {
            // 第 $i 个元素，从索引 1 开始
            // 要处理的值
            $value = $arr[$i];
            // 前一个索引
            $j = $i - 1;
            // 倒退检查 注意这里是 >=，要退到底
            for (; $j >= 0; --$j) {
                if ($arr[$j] > $value) {
                    // 前面的值比后面的值大，要向后移动数据
                    $arr[$j + 1] = $arr[$j];
                } else {
                    break;
                }
            }

            // 前一个索引+1
            $arr[$j + 1] = $value; // 插入数据
        }

        return $arr;
    }

    // 最后 n^2 因为要报数据全部比较一遍
    public static function selectionSort(array $arr, int $length): array
    {
        if ($length < 1) {
            return $arr;
        }

        // 这里应该 $length - 1
        for ($i = 0; $i < $length - 1; ++$i) {
            // 记录最少索引
            $minIndex = $i;
            for ($j = $i + 1; $j < $length; ++$j) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }

            [$arr[$i], $arr[$minIndex]] = [$arr[$minIndex], $arr[$i]];
        }

        return $arr;
    }
}

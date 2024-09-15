<?php

declare(strict_types=1);

namespace DSA\L99_Interview;

class ArrayPermutation
{
    /**
     * 递归回溯法
     *
     * 选择一个元素作为排列的第一个元素。
     * 对剩下的元素进行全排列。
     * 将第一个元素与每个子排列组合。
     * 重复这个过程,直到所有元素都被选择过。
     *
     * @param int[] $nums
     *
     * @return int[][]
     */
    public function permute(array $nums): array
    {
        if (count($nums) < 2) {
            return [$nums];
        }

        // $i 开始的元素
        $ret = [];
        foreach ($nums as $i => $first) {
            $sub = $nums;
            unset($sub[$i]);
            $perms = self::permute(array_values($sub));
            foreach ($perms as $perm) {
                array_unshift($perm, $first);
                // $perm[] = $first;
                $ret[] = $perm;
            }
        }

        return $ret;
    }

    public function swap(array $nums): array
    {
    }

    protected function backtrack(int $n, int $first, $output)
    {
    }
}

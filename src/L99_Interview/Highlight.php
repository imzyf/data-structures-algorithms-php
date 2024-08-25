<?php

declare(strict_types=1);

namespace DSA\L99_Interview;

// env PHP8.1+
class Highlight
{
    /**
     * @param array<string> $keys
     */
    public static function highlight(string $s, array $keys): string
    {
        $root = new TrieNode();

        // 构建 字典树
        foreach ($keys as $key) {
            // 每个模式串 以根为起点
            $node = $root;
            // $deep trie 深度
            foreach (mb_str_split($key) as $deep => $char) {
                if (!isset($node->children[$char])) {
                    // 子节点 不存在，创建新的子节点
                    $node = $node->children[$char] = new TrieNode($deep + 1);

                    continue;
                }
                // 存在
                $node = $node->children[$char];
            }

            // 到底了 是结尾
            $node->ending = true;
        }

        // flags 0 1 表示 单字是否需要 highlight，前后设置2个守卫值，方便后续判断
        $flags = array_fill(-1, mb_strlen($s) + 2, 0);

        // 遍历 $s array
        // 切割为单个汉字的数组
        $sArr = mb_str_split($s);
        foreach ($sArr as $idx => $char) {
            // 每个字都从 root 找
            $node = $root->children[$char] ?? null;
            // 广度优先 防止子串问题：好，好你 时优先匹配 好你。
            $deepNode = null;
            $i = $idx;
            while (null !== $node) {
                // 向跟更深处遍历，检查下一个字
                if ($node->ending) {
                    $deepNode = $node;
                }
                ++$i;
                $node = $node->children[$sArr[$i]] ?? null;
            }

            if (null === $deepNode) {
                // 没有找到合适的 路径
                continue;
            }

            // 深度
            $deep = $deepNode->deep;
            while ($deep > 0) {
                --$deep;
                // 回溯标示位
                $flags[$idx + $deep] = 1;
            }
        }

        $ret = '';
        for ($i = 0, $count = mb_strlen($s); $i < $count; ++$i) {
            // 前0后1 是开头
            if (0 === $flags[$i - 1] && 1 === $flags[$i]) {
                $ret .= '<highlight>'.$sArr[$i];
            } elseif (1 === $flags[$i] && 0 === $flags[$i + 1]) {
                // 前1后0 是结尾
                $ret .= $sArr[$i].'</highlight>';
            } else {
                $ret .= $sArr[$i];
            }
        }

        return $ret;
    }
}

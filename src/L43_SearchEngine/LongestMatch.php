<?php

declare(strict_types=1);

namespace DSA\L43_SearchEngine;

class LongestMatch
{
    public static function byTrieTree(string $text, array $haystack): string
    {
        // 构建
        $root = new TrieNode();
        foreach ($haystack as $word) {
            $node = $root;
            foreach (mb_str_split($word) as $char) {
                if (!isset($node->children[$char])) {
                    $node->children[$char] = new TrieNode();
                }
                $node = $node->children[$char];
            }
            $node->isEnding = true;
        }

        // 从长度1开始
        $longestMatch = '';

        for ($i = 0, $iMax = mb_strlen($text); $i < $iMax; ++$i) {
            $node = $root;
            $j = $i;
            $currentMatch = '';
            $textArr = mb_str_split($text);
            while ($j < mb_strlen($text) && isset($node->children[$textArr[$j]])) {
                $currentMatch .= $textArr[$j];
                $node = $node->children[$textArr[$j]];

                if ($node->isEnding && mb_strlen($currentMatch) > mb_strlen($longestMatch)) {
                    $longestMatch = $currentMatch;
                }

                ++$j;
            }
        }

        return $longestMatch;
    }
}

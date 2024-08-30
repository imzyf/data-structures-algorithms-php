<?php

declare(strict_types=1);

namespace DSA\L43_SearchEngine;

class TrieNode
{
    /**
     * @var array<string, static> 每个 item 一个字
     */
    public array $children = [];

    public bool $isEnding = false;

    /**
     * @param int $deep 深度 回源使用
     */
    public int $deep = 0;
}

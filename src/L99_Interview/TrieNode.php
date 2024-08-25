<?php

declare(strict_types=1);

namespace DSA\L99_Interview;

class TrieNode
{
    /**
     * @var array<string, TrieNode> 每个 item 一个字
     */
    public array $children = [];

    public bool $ending = false;

    /**
     * @param int $deep 深度 回源使用
     */
    public function __construct(public int $deep = 0)
    {
    }
}

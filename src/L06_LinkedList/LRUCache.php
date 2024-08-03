<?php

namespace DSA\L06_LinkedList;

/**
 * LRU 最近最少使用策略 LRU（Least Recently Used）。
 *
 * 1. 如果此数据之前已经被缓存在链表中了，我们遍历得到这个数据对应的结点，并将其从原来的位置删除，然后再插入到链表的头部。
 * 2. 如果此数据没有在缓存链表中，又可以分为两种情况：
 *  如果此时缓存未满，则将此结点直接插入到链表的头部；
 *  如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。这样我们就用链表实现了一个 LRU 缓存
 *
 *   空间复杂度 O(n)
 *   时间复杂度O(n) 操作链表每次需要查询遍历
 */
class LRUCache
{
    /**
     * @var array<string, string> key value
     */
    protected array $cache = [];


    public function __construct(protected int $capacity)
    {
    }

    public function put(string $key, string $value): void
    {
        if (isset($this->cache[$key])) {
            // 如果此数据之前已经被缓存在链表中了，我们遍历得到这个数据对应的结点，并将其从原来的位置删除，然后再插入到链表的头部。
            unset($this->cache[$key]);
            $this->cache[$key] = $value;

            return;
        }
        // 如果此数据没有在缓存链表中，又可以分为两种情况：
        if (count($this->cache) === $this->capacity) {
            // 如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。这样我们就用链表实现了一个 LRU 缓存
            unset($this->cache[array_key_first($this->cache)]);
        }

        $this->cache[$key] = $value;
    }

    public function get(string $key): ?string
    {
        return $this->cache[$key] ?? null;
    }

    public function getKeys(): array
    {
        return array_keys($this->cache);
    }
}

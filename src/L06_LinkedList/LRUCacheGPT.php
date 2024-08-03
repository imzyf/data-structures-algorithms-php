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
class LRUCacheGPT
{
    private $capacity;
    private $cache;
    private $accessOrder;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->cache = [];
        $this->accessOrder = [];
    }

    public function get($key)
    {
        if (!isset($this->cache[$key])) {
            return -1;
        }
        $this->updateAccessOrder($key);

        return $this->cache[$key];
    }

    public function put($key, $value)
    {
        if (isset($this->cache[$key])) {
            $this->cache[$key] = $value;
            $this->updateAccessOrder($key);

            return;
        }

        if (count($this->cache) >= $this->capacity) {
            $lruKey = array_shift($this->accessOrder);
            unset($this->cache[$lruKey]);
        }

        $this->cache[$key] = $value;
        $this->accessOrder[] = $key;
    }

    private function updateAccessOrder($key)
    {
        $index = array_search($key, $this->accessOrder);
        unset($this->accessOrder[$index]);
        $this->accessOrder[] = $key;
    }
}

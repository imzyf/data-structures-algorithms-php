<?php

namespace DSA\L06_LinkedList;

class LinkedLRUCache
{
    // 最新 右侧
    protected ?LinkedNode $head = null;
    // 最旧 左侧
    protected ?LinkedNode $tail = null;

    /**
     * @var array<string|int, LinkedNode> 是无序的
     */
    private array $cache = [];

    public function __construct(protected int $capacity)
    {
    }

    public function get($key): string|int|null
    {
        if (!isset($this->cache[$key])) {
            return null;
        }
        $node = $this->cache[$key];
        $this->moveToHead($node);

        return $node->value;
    }

    public function getKeys(): array
    {
        $keys = [];
        $node = $this->tail;
        while (null !== $node) {
            $keys[] = $node->key;
            $node = $node->next;
        }

        return $keys;
    }

    public function put(string|int $key, string|int $value): void
    {
        if (null === $this->head) {
            // 第一个节点
            $this->cache[$key] = $this->tail = $this->head = new LinkedNode($key, $value);

            return;
        }

        if (isset($this->cache[$key])) {
            $node = $this->cache[$key];
            $node->value = $value;
            $this->moveToHead($node);
        } else {
            if (count($this->cache) >= $this->capacity) {
                $removed = $this->removeTail();
                unset($this->cache[$removed->key]);
            }
            $newNode = new LinkedNode($key, $value);
            $this->cache[$key] = $newNode;
            $this->addToHead($newNode);
        }
    }

    private function removeNode(LinkedNode $node)
    {
        if (null === $node->prev) {
            // node 是开头 只移动下一个
            $node->next->prev = null;
            $this->tail = $node->next;

            return;
        }

        if (null === $node->next) {
            // node 是结尾 不用操作
            $node->next->prev = null;

            return;
        }

        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    private function moveToHead(LinkedNode $node)
    {
        $this->removeNode($node);
        $this->addToHead($node);
    }

    private function removeTail(): LinkedNode
    {
        $node = $this->tail;
        $this->removeNode($node);

        return $node;
    }

    private function addToHead(LinkedNode $node)
    {
        $node->prev = $this->head;
        $node->next = null;
        $this->head->next = $node;

        $this->head = $node;
    }
}

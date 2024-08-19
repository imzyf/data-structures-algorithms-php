<?php

declare(strict_types=1);

namespace DSA\L08_Stack;

class Stack
{
    protected array $item = [];
    protected int $count = 0;

    public function __construct(protected int $size)
    {
    }

    // O(1)
    public function push(mixed $value): bool
    {
        if ($this->isFull()) {
            return false;
        }

        $this->item[$this->count] = $value;
        ++$this->count;

        return true;
    }

    // O(1)
    public function pop()
    {
        $value = $this->item[$this->count - 1];

        --$this->count;

        return $value;
    }

    // O(1)
    public function isFull(): bool
    {
        return $this->size === count($this->item);
    }
}

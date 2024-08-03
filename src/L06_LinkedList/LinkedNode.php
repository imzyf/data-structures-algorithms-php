<?php

namespace DSA\L06_LinkedList;

class LinkedNode
{
    public function __construct(
        public string|int $key,
        public string|int $value,
        public ?LinkedNode $prev = null,
        public ?LinkedNode $next = null
    ) {
    }
}

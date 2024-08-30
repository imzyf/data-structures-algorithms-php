<?php

declare(strict_types=1);

namespace DSA\L99_Interview;

class Graph
{
    /**
     * @var array<int, int[]> 相邻 依赖
     */
    private array $edgeMap = [];

    public function __construct(int $count)
    {
    }

    public function addEdge(int $first, int $next): void
    {
        $this->edgeMap[$first][] = $next;
    }
}

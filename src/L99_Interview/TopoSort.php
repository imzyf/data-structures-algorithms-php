<?php

declare(strict_types=1);

namespace DSA\L99_Interview;

class TopoSort
{
    /**
     * @var array<int, int[]> 相邻 依赖
     */
    private array $nodeEdgeMap = [];

    /**
     * @param int          $count          数量
     * @param array<int[]> $dependenceList 依赖关系 i 依赖于 j 表示为 [i,j]，j 要先完成 i 才能执行
     */
    public function __construct(protected int $count, protected array $dependenceList)
    {
        for ($i = 0; $i < $this->count; ++$i) {
            // init
            $this->nodeEdgeMap[$i] = [];
        }
    }

    // 深度优先 计算一种情况
    public function calcOneResult(): array
    {
        foreach ($this->dependenceList as [$i, $j]) {
            $this->nodeEdgeMap[$i][] = $j;
        }

        $visited = [];
        $stack = [];
        foreach (array_keys($this->nodeEdgeMap) as $node) {
            // 遍历每个定点
            if (!isset($visited[$node])) {
                // 深度优先
                $this->dfs($node, $visited, $stack);
            }
        }

        return $stack;
    }

    private function dfs(int $node, array &$visited, array &$stack): void
    {
        $visited[$node] = true;

        foreach ($this->nodeEdgeMap[$node] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $this->dfs($neighbor, $visited, $stack);
            }
        }

        $stack[] = $node;
    }

    // 计算所有可能的情况
    public function calcAllResult(): array
    {
        foreach ($this->dependenceList as [$i, $j]) {
            $this->nodeEdgeMap[$j][] = $i;
        }

        $visited = [];
        $stack = [];
        $allResult = [];

        $this->allResult($visited, $stack, $allResult);

        return $allResult;
    }

    public function allResult(array &$visited, array &$stack, array &$allResult): void
    {
        // 当前递归层是否找到并添加了至少一个新的顶点
        $isFound = false;
        foreach (array_keys($this->nodeEdgeMap) as $node) {
            // 遍历每个定点
            if (!$visited[$node] && $this->isNotVisitedTopNode($node, $visited)) {
                $visited[$node] = true;
                $stack[] = $node;
                // 继续深入
                $this->allResult($visited, $stack, $allResult);

                // 回退本次本层
                $visited[$node] = false;
                array_pop($stack);
                $isFound = true;
            }
        }

        if (!$isFound) {
            // 找不到了 到了最深层
            $allResult[] = $stack;
        }
    }

    // 是否是 没有被访问过的顶点
    private function isNotVisitedTopNode(int $checkNode, array $visited): bool
    {
        foreach ($this->nodeEdgeMap as $node => $edge) {
            // 只看没有别访问过的 node
            if (!$visited[$node] && in_array($checkNode, $edge, true)) {
                // 在没有范围过的 node 的边上，所有不能当定点
                return false;
            }
        }

        // 可以做顶点
        return true;
    }
}

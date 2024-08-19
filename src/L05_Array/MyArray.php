<?php

declare(strict_types=1);

namespace DSA\L05_Array;

class MyArray
{
    /**
     * @var array<int, mixed>
     */
    protected array $data = [];
    protected int $length = 0;

    public function __construct(protected int $capacity)
    {
    }

    /**
     * 数组是否已满
     */
    public function checkIfFull(): bool
    {
        return $this->length === $this->capacity;
    }

    /**
     * 判断索引index是否超出数组范围
     */
    private function checkOutOfRange(int $index): bool
    {
        return $index >= $this->length;
    }

    /**
     * 在索引index位置插入值value，返回错误码，0为插入成功
     */
    public function insert(int $index, mixed $value): bool
    {
        if ($index < 0) {
            return false;
        }

        if ($index + 1 > $this->capacity) {
            return false;
        }

        if ($this->checkIfFull()) {
            return false;
        }

        for ($i = $this->length - 1; $i >= $index; --$i) {
            // 倒序挪位置
            $this->data[$i + 1] = $this->data[$i];
        }

        $this->data[$index] = $value;
        ++$this->length;

        return true;
    }

    /**
     * 删除索引index上的值，并返回
     */
    public function delete(int $index): bool
    {
        if ($index < 0) {
            return false;
        }

        if ($this->checkOutOfRange($index)) {
            return false;
        }

        // 注意这里是 < 不是 <=，
        for ($i = $index; $i < $this->length - 1; ++$i) {
            // 正序 向前挪位置
            $this->data[$i] = $this->data[$i + 1];
        }

        $this->data[$this->length - 1] = null;
        --$this->length;

        return true;
    }

    public function find(int $index): mixed
    {
        if ($index < 0) {
            return null;
        }

        if ($this->checkOutOfRange($index)) {
            return null;
        }

        return $this->data[$index];
    }

    public function printData()
    {
        $format = '';
        for ($i = 0; $i < $this->length; ++$i) {
            $format .= '|'.$this->data[$i];
        }

        return $format;
    }
}

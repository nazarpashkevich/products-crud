<?php

namespace App\Values;

class Money
{
    public function __construct(protected float $money)
    {
    }

    public static function make(float $money): static
    {
        return new static($money);
    }

    public function getValue(): float
    {
        return $this->money;
    }

    public function format(): string
    {
        return number_format($this->money, 2, '.', ' ') . '$';
    }

    public function __toString(): string
    {
        return $this->format();
    }
}

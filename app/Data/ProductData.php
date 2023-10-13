<?php

namespace App\Data;

use App\Models\Product;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public string $title,
        public string $description,
        public float $price,
    ) {}

    public function toModel(null|Product|int $product = null): Product
    {
        $model = $product instanceof Product ? $product : Product::query()->findOrNew((int) $product);

        $model->fill($this->all());

        return $model;
    }
}

<?php

namespace App\Services;

use App\Data\ProductData;
use App\Jobs\ExportProductsToCsvJob;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductService
{
    public function list(): Collection
    {
        return Product::query()->orderBy('id')->get(); // there can be filters/pagination etc.
    }

    public function create(ProductData $data): Product
    {
        $product = $data->toModel();
        $product->save();

        return $product;
    }

    public function update(Product $product, ProductData $data): Product
    {
        $product = $data->toModel($product);
        $product->save();

        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function exportToCsv(string $uniqId): void
    {
        ExportProductsToCsvJob::dispatch($uniqId);
    }
}

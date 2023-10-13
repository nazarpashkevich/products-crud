<?php

namespace App\Actions;

use App\Models\Product;
use App\Services\ProductService;
use League\Csv\Writer;

class ExportProductsToCsvAction
{
    protected ProductService $service;

    public function __construct()
    {
        $this->service = app(ProductService::class);
    }

    /**
     * @throws \League\Csv\UnavailableStream
     * @throws \League\Csv\CannotInsertRecord
     * @throws \League\Csv\Exception
     */
    public function handle(string $uuId): string
    {
        $tempPath = $this->getTempDir();

        $csvFileName = "{$tempPath}/product-export-{$uuId}.csv";

        $csv = Writer::createFromPath($csvFileName, 'w+');

        $products = $this->service->list();

        $exampleProduct = $products->first();

        if ($exampleProduct instanceof Product) {
            $csv->insertOne(array_diff(array_keys($exampleProduct->getAttributes()), $exampleProduct->getHidden()));
            $csv->insertAll($products->toArray());
        }

        return $csv->getPathname();
    }

    public function getTempDir(): string
    {
        $tempPath = storage_path('app/public/temp');

        if (!is_dir($tempPath)) {
            mkdir($tempPath, 0755, true);
        }

        return $tempPath;
    }
}

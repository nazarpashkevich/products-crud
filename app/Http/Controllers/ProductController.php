<?php

namespace App\Http\Controllers;

use App\Data\ProductData;
use App\Http\Requests\ExportProductRequest;
use App\Http\Requests\ExportProductsRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class ProductController
{
    use ApiResponseHelpers;

    public function __construct(protected ProductService $service)
    {
    }

    public function index(): JsonResponse
    {
        return $this->respondWithSuccess(
            ProductResource::collection($this->service->list())
        );
    }

    public function show(Product $product): JsonResponse
    {
        return $this->respondWithSuccess(
            ProductResource::make($product)
        );
    }

    public function create(ProductRequest $request): JsonResponse
    {
        return $this->respondWithSuccess(
            ProductResource::make(
                $this->service->create(ProductData::from($request->validated()))
            )
        );
    }

    public function update(Product $product, ProductRequest $request): JsonResponse
    {
        return $this->respondWithSuccess(
            ProductResource::make(
                $this->service->update($product, ProductData::from($request->validated()))
            )
        );
    }

    public function delete(Product $product): JsonResponse
    {
        $this->service->delete($product);

        return $this->respondOk('ok');
    }

    public function exportToCsv(ExportProductsRequest $request): JsonResponse
    {
        $this->service->exportToCsv($request->getUId());

        return $this->respondOk('ok');
    }
}

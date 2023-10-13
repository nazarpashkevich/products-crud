<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property \App\Models\Product $resource
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->resource->id,
            'title'       => $this->resource->title,
            'description' => $this->resource->description,
            'price'       => $this->resource->price->getValue(),
            'price_formatted'       => $this->resource->price->format(),
        ];
    }
}

<?php

namespace App\Http\Resources\Products;

use App\Models\Brand;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        $brand = Brand::find($this->brand_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'ske' => $this->ske,
            'image' => $this->image_path,
            'brand' => $brand->name,
            'brand_slug' => $brand->slug,
        ];

    }


}

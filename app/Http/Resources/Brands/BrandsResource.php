<?php

namespace App\Http\Resources\Brands;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandsResource extends JsonResource
{

    public function toArray($request)
    {

        $allcats = [];
        foreach ($this->categories as $cat) {
            array_push($allcats, [
                'id' => $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
            ]);
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'categories' => $allcats
        ];

    }


}

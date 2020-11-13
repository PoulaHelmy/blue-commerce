<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ResponseHandler;
use App\Http\Resources\Brands\BrandsResource;
use App\Models\Brand;

class BrandsController extends Controller
{
    use ResponseHandler;

    public function index()
    {
        $allData = Brand::all();
        if ($allData) {
            return $this->responseData('data', BrandsResource::collection($allData));
        }
        return $this->errorResponse(404, 'NO Data Found');
    }//End Of Index
}

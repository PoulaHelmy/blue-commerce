<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ResponseHandler;
use App\Http\Resources\Products\ProductResource;
use App\Models\Product;

class ProductsController extends Controller
{
    use ResponseHandler;

    public function index()
    {
        $allData = Product::all();
        if ($allData) {
            return $this->responseData('data', ProductResource::collection($allData));
        }
        return $this->errorResponse(404, 'NO Data Found');
    }
}

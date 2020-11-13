<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ResponseHandler;
use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;

class CategoriesController extends Controller
{

    use ResponseHandler;

    public function index()
    {
        $allData = Category::all();
        if ($allData) {
            return $this->responseData('data', CategoryResource::collection($allData));
        }
        return $this->errorResponse(404, 'NO Data Found');
    }//End Of Index
}

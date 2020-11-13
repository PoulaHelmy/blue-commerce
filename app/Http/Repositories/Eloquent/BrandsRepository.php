<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Interfaces\BrandsRepositoryInterface;
use App\Models\Brand;

class BrandsRepository implements BrandsRepositoryInterface
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }//END OF __construct

    public function Create($request)
    {
        $brand = Brand::create($request);
        $brand->categories()->sync($request['categories']);
    }//END OF CreateCategory

    public function Update($request, $row)
    {
        $row->update($request);
        $row->categories()->sync($request['categories']);
    }//END OF UpdateCategory

    public function Delete($row)
    {
        $row->delete();
    }//END OF DeleteCategory


}//END OF CLASS

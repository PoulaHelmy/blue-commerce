<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductsRepository implements ProductsRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }//END OF __construct

    public function Create($request)
    {
        $request_data = $request;
        if (isset($request['image'])) {
            Image::make($request['image'])
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request['image']->hashName()));
            $request_data['image'] = $request['image']->hashName();
        }//end of if
        $brand = Product::create($request_data);

    }//END OF CreateCategory

    public function Update($request, $row)
    {
        $request_data = $request;
        if (isset($request['image'])) {
            Storage::disk('public_uploads')->delete('product_images/' . $row->image);
            Image::make($request['image'])
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request['image']->hashName()));
            $request_data['image'] = $request['image']->hashName();
        }//end of external if
        $row->update($request);
    }//END OF UpdateCategory

    public function Delete($row)
    {
        Storage::disk('public_uploads')->delete('product_images/' . $row->image);
        $row->delete();
    }//END OF DeleteCategory


}//END OF CLASS

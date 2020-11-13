<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryInterface
{


    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }//END OF __construct

    public function GetAllCategories($request, $paginateSize)
    {
        return $finalResults = $this->category->where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate($paginateSize);
    }//END OF GetAllDestinations

    public function CreateCategory($request)
    {
        $cat = $this->category->create($request);

    }//END OF CreateCategory

    public function UpdateCategory($request, $category)
    {
        $category->update($request);
    }//END OF UpdateCategory

    public function DeleteCategory($category)
    {
        $category->delete();
    }//END OF DeleteCategory


}//END OF CLASS




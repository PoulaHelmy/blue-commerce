<?php

namespace App\Http\Repositories\Interfaces;

interface CategoriesRepositoryInterface
{

    public function GetAllCategories($request, $paginateSize);

    public function CreateCategory($request);

    public function UpdateCategory($request, $category);

    public function DeleteCategory($category);


}//End OF Class

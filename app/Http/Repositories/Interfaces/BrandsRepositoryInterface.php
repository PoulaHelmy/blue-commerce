<?php

namespace App\Http\Repositories\Interfaces;

interface BrandsRepositoryInterface
{


    public function Create($request);

    public function Update($request, $category);

    public function Delete($category);


}//End OF Class

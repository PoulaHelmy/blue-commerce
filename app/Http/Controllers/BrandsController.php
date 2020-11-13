<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Interfaces\BrandsRepositoryInterface;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Brand;

class BrandsController extends Controller
{
    protected $repo;

    public function __construct(BrandsRepositoryInterface $repository)
    {
        //create read update delete
        $this->middleware(['permission:read_brands'])->only('index');
        $this->middleware(['permission:create_brands'])->only('create');
        $this->middleware(['permission:update_brands'])->only('edit');
        $this->middleware(['permission:delete_brands'])->only('destroy');
        $this->repo = $repository;
    }//END OF __construct

    public function index(\Symfony\Component\HttpFoundation\Request $request)
    {
        $finalResults = Brand::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(5);
        return view('Dashboard.brand.index', compact('finalResults'));
    }//END OF index

    public function create()
    {
        return view('Dashboard.brand.create');
    }//END OF create

    public function store(Store $request)
    {
        $this->repo->Create($request->all());
        session()->flash('SUCCESS', 'Data Added Successfully');
        return back();
    }//END OF store


    public function edit(Brand $brand)
    {
        $selected_categories = [];
        foreach ($brand->categories as $category) {
            array_push($selected_categories, $category->id);
        }
        return view('Dashboard.brand.edit', compact('brand', 'selected_categories'));
    }//END OF edit

    public function update(Store $request, Brand $brand)
    {
        $this->repo->Update($request->all(), $brand);
        session()->flash('SUCCESS', 'Data Updated Successfully');
        return back();
    }//END OF update

    public function destroy(Brand $brand)
    {
        $this->repo->Delete($brand);
        session()->flash('SUCCESS', 'Data Deleted Successfully');
        return back();
    }//END OF destroy


}//END OF CLASS


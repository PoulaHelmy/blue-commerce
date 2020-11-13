<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoriesController extends Controller
{
    protected $repo;

    public function __construct(CategoriesRepositoryInterface $repository)
    {
        //create read update delete
        $this->middleware(['permission:read_categories'])->only('index');
        $this->middleware(['permission:create_categories'])->only('create');
        $this->middleware(['permission:update_categories'])->only('edit');
        $this->middleware(['permission:delete_categories'])->only('destroy');
        $this->repo = $repository;
    }//END OF __construct

    public function index(Request $request)
    {
        $finalResults = Category::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(5);
        return view('Dashboard.Category.index', compact('finalResults'));
    }//END OF index

    public function create()
    {
        return view('Dashboard.Category.create');
    }//END OF create

    public function store(Store $request)
    {
        $this->repo->CreateCategory($request->all());
        session()->flash('SUCCESS', 'Data Added Successfully');
        return back();
    }//END OF store


    public function edit(Category $category)
    {

        return view('Dashboard.Category.edit', compact('category'));

    }//END OF edit

    public function update(Store $request, Category $category)
    {
        $this->repo->UpdateCategory($request->all(), $category);
        session()->flash('SUCCESS', 'Data Updated Successfully');
        return back();
    }//END OF update

    public function destroy(Category $category)
    {
        $this->repo->DeleteCategory($category);
        session()->flash('SUCCESS', 'Data Deleted Successfully');
        return back();
    }//END OF destroy


}//END OF CLASS


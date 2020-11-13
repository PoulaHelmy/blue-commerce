<?php

namespace App\Http\Controllers;


use App\Http\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Http\Requests\BackEnd\Products\Store;
use App\Models\Product;

class ProductsController extends Controller
{
    protected $repo;

    public function __construct(ProductsRepositoryInterface $repository)
    {
        //create read update delete
        $this->middleware(['permission:read_products'])->only('index');
        $this->middleware(['permission:create_products'])->only('create');
        $this->middleware(['permission:update_products'])->only('edit');
        $this->middleware(['permission:delete_products'])->only('destroy');
        $this->repo = $repository;
    }//END OF __construct

    public function index(\Symfony\Component\HttpFoundation\Request $request)
    {
        $finalResults = Product::where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(5);
        return view('Dashboard.Products.index', compact('finalResults'));
    }//END OF index

    public function create()
    {
        return view('Dashboard.Products.create');
    }//END OF create

    public function store(Store $request)
    {
        $this->repo->Create($request->all());
        session()->flash('SUCCESS', 'Data Added Successfully');
        return back();
    }//END OF store


    public function edit(Product $product)
    {
        return view('Dashboard.Products.edit', compact('product'));
    }//END OF edit

    public function update(Store $request, Product $product)
    {
        $this->repo->Update($request->all(), $product);
        session()->flash('SUCCESS', 'Data Updated Successfully');
        return back();
    }//END OF update

    public function destroy(Product $product)
    {
        $this->repo->Delete($product);
        session()->flash('SUCCESS', 'Data Deleted Successfully');
        return back();
    }//END OF destroy


}//END OF CLASS

<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Interfaces\UsersRepositoryInterface;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    protected $repo;

    public function __construct(UsersRepositoryInterface $repo)
    {
        //create read update delete
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
        $this->middleware(['permission:read_profile'])->only('readprofile');
        $this->middleware(['permission:update_profile'])->only('updateprofile');
        $this->middleware(['permission:restore_users'])->only('restore');
        $this->middleware(['permission:forcedelete_users'])->only('forceDelete');
        $this->middleware(['permission:readtrashed_users'])->only('trashed');
        $this->repo = $repo;
    }//end of constructor

    public function index()
    {
        return view('Dashboard.users.index');
    }//end of index

    public
    function create()
    {
        return view('Dashboard.users.create');
    }//end of create

    public
    function store(Store $request)
    {
        $this->repo->CreateUser($request->all());
        session()->flash('SUCCESS', 'User Added Successfully');
        return back();
    }//end of store


    public
    function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }//end of user

    public
    function update(Update $request, User $user)
    {
        $this->repo->UpdateUser($request->all(), $user);
        session()->flash('SUCCESS', 'User Data Updated Successfully');
        return back();
    }//end of update

    public
    function destroy(User $user)
    {
        $this->repo->DeleteUser($user);
        session()->flash('SUCCESS', 'User Data Deleted Successfully');
        return back();
    }//end of destroy

    public function trashed(Request $request)
    {
        $finalResults = User::onlyTrashed()->where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(5);
        return view('Dashboard.users.trashed_index', compact('finalResults'));
    }// END OF trashedExcursions

    public function restore($id)
    {
        User::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('SUCCESS', 'User Restored Successfully');
        return back();
    }// END OF restoreExcursion

    public function forceDelete($id)
    {
        $this->repo->ForceDelete($id);
        session()->flash('SUCCESS', 'User Deleted ForEver Successfully');
        return back();
    }// END OF forceDeleteExcursion


}//end of Class

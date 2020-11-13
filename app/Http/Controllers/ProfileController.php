<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Interfaces\UsersRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repo;

    public function __construct(UsersRepositoryInterface $repo)
    {
        //create read update delete
        $this->middleware(['permission:read_profile'])->only('readprofile');
        $this->middleware(['permission:update_profile'])->only('edit');
        $this->middleware(['permission:update_profile'])->only('update');
        $this->repo = $repo;

    }//end of constructor

    public
    function readprofile(User $user)
    {
        return view('Dashboard.users.user_profile');
    }//end of destroy

    public
    function edit(User $user)
    {
        return view('dashboard.users.edit_profile', compact('user'));
    }//end of user

    public
    function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $this->repo->UpdateUser($request->all(), $user);
        session()->flash('SUCCESS', 'User Data Updated Successfully');
        return back();
    }//end of destroy
}

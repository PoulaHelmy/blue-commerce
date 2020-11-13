<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Interfaces\UsersRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UsersRepository implements UsersRepositoryInterface
{


    protected $category;

    public function __construct(User $category)
    {
        $this->category = $category;
    }//END OF __construct

    public function GetAllUsers($request, $paginateSize)
    {
        return $finalResults = $this->category->where(function ($q) use ($request) {
            return $q->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate($paginateSize);
    }//END OF GetAllUSERS

    public function CreateUser($request)
    {
        $request_data = $request;
//        dd($request);
//        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = Hash::make($request['password']);
        if (isset($request['image'])) {
            Image::make($request['image'])
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request['image']->hashName()));
            $request_data['image'] = $request['image']->hashName();
        }//end of if
        if (isset($request['status'])) {
            $request_data['status'] = 1;
        }
//        dd($request_data);

        $user = User::create($request_data);
        $user->attachRole($request_data['role']);
    }//END OF CreateUser

    public function UpdateUser($request, $user)
    {

        $request_data = $request;
        unset($request_data['password']);
        unset($request_data['image']);
        if (isset($request['image'])) {
            if ($user->image != 'default.png') {
                Storage::disk('public_uploads')->delete('user_images/' . $user->image);
            }//end of inner if
            Image::make($request['image'])
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request['image']->hashName()));
            $request_data['image'] = $request['image']->hashName();
        }//end of external if

        if (isset($request['password'])) {
            $request_data['password'] = Hash::make($request['password']);
        }
        if (isset($request['status'])) {
            $request_data['status'] = 1;
        } else {
            $request_data['status'] = 0;
        }
        if (isset($request['role'])) {
            foreach ($user->roles as $role) {
                $user->detachRole($role->id);
            }
//            $user->attachRole('user');
            $user->attachRole($request_data['role']);
        }
        $user->update($request_data);
    }//END OF UpdateUser

    public function DeleteUser($user)
    {
        $user->delete();
    }//END OF DeleteUser

    public function ForceDelete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);
        }//end of if
        $user->delete();
    }//END OF ForceDelete

}//END OF CLASS

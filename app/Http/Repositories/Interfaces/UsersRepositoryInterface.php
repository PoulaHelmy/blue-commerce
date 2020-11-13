<?php

namespace App\Http\Repositories\Interfaces;
interface UsersRepositoryInterface
{
    public function GetAllUsers($request, $paginateSize);

    public function CreateUser($request);

    public function UpdateUser($request, $user);

    public function DeleteUser($user);

    public function ForceDelete($user);

}//END OF INTERFACE

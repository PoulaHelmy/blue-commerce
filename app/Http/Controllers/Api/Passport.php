<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ResponseHandler;
use App\Http\Resources\Users\UserDetailsResource;
use App\Models\User;
use App\Notifications\SignupActivate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Passport extends Controller
{
    use ResponseHandler;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        $credentials['status'] = 1;
        $credentials['deleted_at'] = null;
        if (!auth()->attempt($credentials))
            return $this->errorResponse(400, 'Unauthorized');
        $user = $request->user();
        $success['token'] = $user->createToken('Personal Access Token')->accessToken;
        $success['name'] = $user->name;
        return $this->responseData('data', $success, 200, 'Success Login Operation');
    }//end of login

    public function signup(Request $request)
    {
        $v = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($v->fails())
            return $this->responseData('errors', $v->errors()->all(), 400, 'Validation Error.!');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activation_token' => Str::random(60)
        ]);
        $user->attachRole('4');
        $user->notify(new SignupActivate($user));
        $success['token'] = $user->createToken('FindMe')->accessToken;
        $success['name'] = $user->name;
        return $this->responseData('data', $success, 200, 'Successfully created user!');

    }//end of register

    public function details()
    {
        return new UserDetailsResource(auth()->user());
    }//end of details

    public function update(Request $request)
    {
//        $v = validator($request->all(), [
//            'name' => 'string|max:255',
//            'email' => 'string|email|max:255|unique:users',
//            'password' => 'string|min:6',
//            'photo' => 'string'
//        ]);
//        if ($v->fails())
//            return $this->sendError('Validation Error.!', $v->errors()->all(), 400);
//        if (!auth()->user())
//            return $this->sendError('Unauthorized', 400);
//        $requestArray = $request->all();
//        if (isset($requestArray['password']) && $requestArray['password'] != "") {
//            $requestArray['password'] = Hash::make($requestArray['password']);
//        } else {
//            unset($requestArray['password']);
//        }
//        if ($request['photo']) {
//            if ($requestArray['photo'] != '' && $requestArray['photo'] != null) {
//                Storage::disk('public')->delete('avatars/' . auth()->user()->id . '/' . auth()->user()->avatar);
//                $image_64 = $requestArray['photo']; //your base64 encoded data
//                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
//                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
//                // find substring fro replace here eg: data:image/png;base64,
//                $image = str_replace($replace, '', $image_64);
//                $image = str_replace(' ', '+', $image);
//                $imageName = 'avatar.' . $extension;
//                auth()->user()->avatar = $imageName;
//                auth()->user()->save();
//                Storage::disk('public')->put('avatars/' . auth()->user()->id . '/' . $imageName, base64_decode($image));
//            }
//        }
//        $user = auth()->user()->update($requestArray);
//        return $this->sendResponse(new UserDetailsResource(auth()->user()), 'Successfully created user!');
    }//end of Update

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $request->user()->token()->delete();
        return $this->successfulResponse('Successfully Loged OUT user!', 200);
    }//end of logout

    public function SignupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user)
            return $this->errorResponse(404, 'This activation token is invalid.!');
        $user->status = 1;
        $user->activation_token = '';
        $user->save();
        return $user;
    }//end of signup Activate

    // LET Admin To Activate The User
    public function SignupActivate2(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if (!$user)
            return $this->errorResponse(404, 'This USer Not Found.!');
        $user->status = 1;
        $user->activation_token = '';
        $user->save();
        return $this->successfulResponse('Successfully Activate This User!', 200);
    }//end of signup Activate

    public function UserData($id)
    {
        return new UserDetailsResource(User::find($id));
    }//end of UserData

    public function updatePassword(Request $request)
    {
        $v = validator($request->all(), [
            'old_password' => 'string|min:6',
            'new_password' => 'string|min:6',
            'new_password_Confim' => 'string|min:6'
        ]);
        if ($v->fails())
            return $this->responseData('errors', $v->errors()->all(), 400, 'Validation Error.!');
        if (!auth()->user())
            return $this->errorResponse(400, 'Unauthorized');
        if (Hash::check($request->old_password, auth()->user()->getAuthPassword())) {
            auth()->user()->password = Hash::make($request->new_password);
            auth()->user()->save();
            return $this->successfulResponse('PassWord Updated Successfully', 200);

        }
        return $this->errorResponse(400, 'Validation Error.!');

    }//end of Update PassWord
}//enf of controller

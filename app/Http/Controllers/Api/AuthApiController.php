<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function registration(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validate->fails()) {
            return $this->responseWithError($validate->getMessageBag());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => bcrypt($request->password),
        ]);

        return $this->responseWithSuccess($user, 'Registration Success');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if ($validate->fails()) {
            return $this->responseWithError($validate->getMessageBag());
        }

        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);

        if ($token) {
            return $this->responseWithSuccess($token, 'Login Success');
        }

        return $this->responseWithError('Invalid User.');
    }
}

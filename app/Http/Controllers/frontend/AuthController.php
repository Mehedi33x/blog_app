<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.pages.auth.register');
    }

    public function registore(Request $request)
    {

        $validate = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->warning('Invalid Information');
            return redirect()->route('webhome');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => "user"
        ]);
        toastr()->success('Registration Successful');
        return redirect()->route('webhome');
    }

    public function weblogin()
    {

        return view('frontend.pages.auth.login');
    }

    public function doweblogin(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            toastr()->warning('Invalid Information');
            return redirect()->back();
        }

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            toastr()->success('Login Successful');
            return redirect()->route('webhome');
        }

        toastr()->warning('Invalid Information');
        return redirect()->back();
    }

    public function weblogout()
    {
        session()->flush();
        auth()->logout();
        toastr()->success('Logout Successful');
        return redirect()->route('webhome');
    }
}

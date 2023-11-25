<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editProfile()
    {
        return view('frontend.pages.profile.edit_profile');
    }
    public function storeProfile(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);
        // dd($request->all());
        $user_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $user_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/user', $user_image);
        }

        $user = User::find(auth()->user()->id);
        // dd($user);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'profession' => $request->profession,
            'address' => $request->address,
            'about_user' => $request->about_user,
            'password' => $request->password ?? bcrypt($request->password),
            'image' => $user_image,
        ]);
        return to_route('user.profile');
    }
}

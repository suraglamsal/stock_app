<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        //  dd($request->all());   
        // validation
        $data = $request->validate([

            'uname' => 'required|string|max:255',

            'uaddress' => 'required|string|max:255',

            'uage' => 'required|integer|min:1|max:100',

            'uphone' => 'required|digits_between:7,15',

            'gender' => 'required|in:male,female,other',

            'ueducation' => 'required|string|max:255',

            'email' => 'required|email|unique:role_user,email',

            'password' => 'required|string|min:8',

            'img' => 'required|file|mimes:jpg,jpeg,png|max:2048'
        ]);

        // image upload
        $path = $request->file('img')->store('image', 'public');

        // save user
        $user = RoleUser::create([

            'uname' => $request->uname,

            'uaddress' => $request->uaddress,

            'uage' => $request->uage,

            'uphone' => $request->uphone,

            'gender' => $request->gender,

            'ueducation' => $request->ueducation,

            'email' => $request->email,

            'password' => bcrypt($request->password),

            'img' => $path,

            'role' => 's_keeper'
        ]);
        

        // auto login
        Auth::guard('role_user')->login($user);

        return redirect()->route('home')
            ->with('success', 'Data saved successfully');
    }
}
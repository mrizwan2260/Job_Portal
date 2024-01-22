<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLoginRequest;

class AccountController extends Controller
{
    public function register()
    {
        return view('front.account.register');
    }


    //User data store after register
    public function store(UserStoreRequest $request)
    {
        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->save();

        // Set a success toast, with a title
        toastr()->success('Data has been saved successfully!');
        return response()->json([
            'status'        => true,
            'redirect'      => route('account.login')
        ]);
    }


    public function login()
    {
        return view('front.account.login');
    }

    //User Authentication
    public function authenticate(UserLoginRequest $request)
    {
        if (Auth::attempt([
            'email'         => $request->email,
            'password'      => $request->password
        ])) {
            toastr()->success('You are login successfully.');
            return response()->json([
                'status'        => true,
                'redirect'      => route('account.profile')
            ]);
        } else {
            toastr()->error('someting went wrong!');
            return response()->json([
                'status'       => false,
                'redirect'      => route('account.login')
            ]);
        }
    }


    //User profile
    public function profile()
    {
        return view('front.account.profile');
    }


    //user logout
    public function logout()
    {
        Auth::logout();
        toastr()->success('You are loged out.');
        return redirect()->route('account.login');
    }
}

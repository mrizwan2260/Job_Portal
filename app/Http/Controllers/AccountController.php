<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        return response()->json([
            'success'       => true,
            'redirect'      => route('account.login')
        ]);
    }


    public function login()
    {
        return view('front.account.login');
    }
}

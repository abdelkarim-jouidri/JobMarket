<?php

namespace App\Http\Controllers\auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name'=>'required|min:3|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|confirmed',

        ]);

        $credentials['password'] = Hash::make($request->password);
        $role = $request->checkbox ? 'employer' : 'candidate';

        $role = Role::whereName($role)->first();

        $user = User::create($credentials);
        $user->assignRole($role);

        return response()->json([
            'user'=>$user,
            'message'=>'Your just created an account. Head back to login to enter'
        ]);
    }


}

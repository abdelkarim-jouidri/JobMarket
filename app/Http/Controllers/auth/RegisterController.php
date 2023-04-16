<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'fullname'=>'required|min:3|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|confirmed',
            
        ]);

        $credentials['password'] = Hash::make($request->password);
        // dd($credentials);
        $role = Role::whereName($request->checkbox)->first();
        $user = User::create($credentials);
        $user->assignRole($role);

        Auth::login($user);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request){
        $loginData = $request->validate([
            'email' =>  'required|email',
            'password'  =>  'required'
        ]);
        // Check for User Model for Email and Password
        // $user = User::where(['email' => $loginData['email']], [ "password" => Hash::make($loginData['password'])])->first();
        if(!auth()->attempt($loginData)){
            return response()->json(['message' => __('auth.failed')],403);
        }

        $response = [
            'user' => auth()->user(),
            'access_token' => auth()->user()->createToken('authToken')->accessToken
        ];

        return response()->json($response,200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $response = [
            'message' => 'User Created',
            'user' => $user,
            'access_token' => $user->createToken('authToken')->accessToken
        ];

        return response()->json($response,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $response = [
            'user' => $user
        ];

        return response()->json($response,200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        $response = [
            'message' => 'User Updated',
            'user' => $user
        ];

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

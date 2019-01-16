<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register', 'login']]);
    }


    public function register(Request $request) {

        $request->validate([
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = new User();

        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();


        return response()->json(['status' => 'success', 'user' => $user]);
    }


}

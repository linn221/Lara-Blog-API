<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255'
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            abort(401, 'invalid credentials');
        }
        
        return Auth::user()->createToken(Carbon::now()->getTimestamp())->plainTextToken;
    }

    public function logout(Request $request)
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'logout successful'
        ]);
    }
}

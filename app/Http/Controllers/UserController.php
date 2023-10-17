<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfile()
    {
        return new UserResource(Auth::user());
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|min:8|max:255'
        ]);

        $user = Auth::user();
        // $user->password = Hash::make($request->new_password);
        $user->password = $request->new_password;
        $user->save();

        // log out of other sessions
        $user->tokens()->whereNot('name', $user->currentAccessToken()->name)->delete();

        return response()->json([
            'message' => 'Password changed successfully'
        ]);
    }

    public function updateProfile(Request $request)
    {
        // return $request->only(['name', 'email', 'bio', 'information', 'profile_image']);
        $request->validate([
            'name' => 'sometimes|min:4|max:100',
            'email' => 'sometimes|email',
            'bio' => 'sometimes|min:4|max:255',
            'information' => 'sometimes|min:4',
            'profile_image' => 'sometimes|min:4|max:255' 
        ]);

        Auth::user()->update($request->only(['name', 'email', 'bio', 'information', 'profile_image']));
        return new UserResource(Auth::user());
    }
    //
}

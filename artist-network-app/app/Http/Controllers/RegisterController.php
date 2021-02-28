<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle registration.
     */

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'checkboxes' => 'required|array'
        ]);
        User::create(array_merge($request->only(['email', 'name', 'username']), [
            'password' => Hash::make($request->input('password')),
            'newsletter' => false,
        ]));
        return response()->json(['registration' => 'ok']);
    }
}

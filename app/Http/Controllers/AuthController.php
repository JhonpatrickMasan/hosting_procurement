<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function verify(Request $request)
    {
        $credentials = $request->only('user_id', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt(['user_id' => $credentials['user_id'], 'password' => $credentials['password']])) {
            // Authentication was successful, retrieve the authenticated user
            $user = Auth::user();

            // Retrieve the role_id
            $role_id = $user->role_id;

            // Redirect to the appropriate view based on role_id
            switch ($role_id) {
                case 1:
                    return redirect()->route('admin.dashboard');
                case 2:
                    return redirect()->route('user.dashboard');
                // Add more cases as needed for different roles
                default:
                    return redirect()->route('home');
            }
        } else {
            // Authentication failed
            return redirect()->route('login')->withErrors(['user_id' => 'Invalid credentials']);
        }
    }
}
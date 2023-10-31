<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoogleSignInController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = json_decode($request->data);

        if (!$data->email_verified || $data->iss !== 'https://accounts.google.com') {
            return response()->json(['Unauthorized'], 401);
        }

        $user = User::firstOrCreate(['email' => $data->email, 'password' => bcrypt(str()->random(12))]);

        if ($user->is_complete) {
            auth()->login($user);
            $message = $user->wasRecentlyCreated ? 'New user created and logged in' : 'Logged in';
            return response()->json(['success' => true, 'message' => $message], 201);
        } else {
            auth()->login($user);
            return response()->json(['success' => true, 'message' => 'User account found but not complete'], 201);
        }
    }
}

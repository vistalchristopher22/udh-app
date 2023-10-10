<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(int $id)
    {
        return view('profile', [
            'id' => $id,
        ]);
    }
}

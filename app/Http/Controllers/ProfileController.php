<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        return abort(404);
    }

    public function show(int $id)
    {
        return view('profile', [
            'id' => $id,
        ]);
    }
}

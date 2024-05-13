<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function indexReg()
    {
        return view('dashboard.register', [
            "title" => "Daftar - MediGuide"
        ]);
    }

    public function prosesReg(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "unique:users"],
            "email" => ["required", "email:dns", "unique:users", "email"],
            "password" => ["required", "min:8"]
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        $request->session()->flash('success', 'Daftar berhasil, silahkan Login.');
        return redirect('/login');
    }
}

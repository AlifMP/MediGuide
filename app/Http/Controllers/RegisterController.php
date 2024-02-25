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
            "email" => ["required", "email:dns"],
            "password" => ["required"]
        ]);
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        $request->session()->flash('success', 'Daftar berhasil!, silahkan login.');
        return redirect('/login');
    }
}

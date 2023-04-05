<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $data['title'] = 'Register';

        return view('auth.register', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16|unique:users',
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'telp' => 'required',
        ]);

        $validatedData['password'] = hash::make($validatedData['password']);
        $validatedData['level'] = 'masyarakat';

        User::create($validatedData);
      
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}

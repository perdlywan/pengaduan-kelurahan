<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        if (Auth::user()->username == $user->username) {
            $data = [
                'title' => 'Profil',
                'user' => $user
            ];
            return view('home.profile.index', $data);
        } else {
            return redirect('/');
        }
    }

    public function edit(User $user)
    {
        if (Auth::user()->username == $user->username) {
            $data = [
                'title' => 'Ubah Profil',
                'user' => $user
            ];

            return response()->json($data);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->username == $user->username) {
            $validatedData = $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email:dns|unique:users',
                'telp' => 'required',
            ]);

            if ($request->password) {
                $validatedData['password'] = hash::make($request->password);
            }

            $user->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diubah',
                'data' => $user
            ]);
            // return redirect('/profile/' . $user->username)->with('success', 'Profil berhasil diubah!');
        } else {
            return redirect('/');
        }
    }
}

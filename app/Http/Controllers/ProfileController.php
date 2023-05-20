<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == 'masyarakat') {
            $data = User::where('users.id', Auth::user()->id)->get();
            return view('home.profile.index', [
                'user' => $data[0],
            ]);
        } else {
            $data = User::where('users.id', Auth::user()->id)->get();
            return view('dashboard.profile.index', [
                'user' => $data[0],
                'title' => 'Profile Saya'
            ]);
        }
    }

    public function update(Request $request, User $profile)
    {
        $rules = [
            'nama' => 'required',
            'telp' => 'required',
        ];

        if ($request->nik != $profile->nik) {
            $rules['nik'] = 'required|min:16|unique:users';
        }

        if ($request->username != $profile->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $profile->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if ($request->password != null) {
            $rules['password'] = 'min:8';
        }

        $validatedData = $request->validate($rules);

        if ($request->password != null) {
            $validateData['password'] = hash::make($request->password);
        }

        User::where('id', $profile->id)->update($validatedData);

        return redirect('/profile')->with('success', 'Data Masyarakat Berhasil Diubah!');
    }
}

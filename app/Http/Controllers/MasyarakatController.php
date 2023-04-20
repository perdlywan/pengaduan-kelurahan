<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index()
    {
        $this->authorize('admin&staff');
        $data["masyarakats"] = User::where('users.level', 'masyarakat')->get();
        $data["title"] = "Masyarakat";
        return view('dashboard.masyarakat.index', $data);
    }

    public function add()
    {
        $this->authorize('admin&staff');
        $data["title"] = "Tambah Masyarakat";
        return view('dashboard.masyarakat.add', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('admin&staff');
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
        return redirect('/masyarakat')->with('success', 'Masyarakat berhasil ditambahkan!');
    }

    public function edit(User $masyarakat)
    {
        $this->authorize('admin&staff');
        $data = User::where('users.username', $masyarakat->username)->get();
        return view('dashboard.masyarakat.edit', [
            'masyarakat' => $data[0],
            'title' => "Ubah Data Masyarakat"
        ]);
    }

    public function update(Request $request, User $masyarakat)
    {
        $this->authorize('admin&staff');
        $rules = [
            'nama' => 'required',
            'telp' => 'required',
        ];

        if ($request->nik != $masyarakat->nik) {
            $rules['nik'] = 'required|min:16|unique:users';
        }

        if ($request->username != $masyarakat->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $masyarakat->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if ($request->password != null) {
            $rules['password'] = 'min:8';
        }

        $validatedData = $request->validate($rules);

        if ($request->password != null) {
            $validateData['password'] = hash::make($request->password);
        }

        User::where('id', $masyarakat->id)->update($validatedData);

        return redirect('/masyarakat')->with('success', 'Data Masyarakat Berhasil Diubah!');
    }

    public function destroy(User $masyarakat)
    {
        $this->authorize('admin&staff');
        User::destroy($masyarakat->id);
        return redirect('/masyarakat')->with('success', 'Data Masyarakat Berhasil Dihapus!');
    }
}

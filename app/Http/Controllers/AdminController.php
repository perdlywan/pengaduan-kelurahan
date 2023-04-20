<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $data["admins"] = User::where('users.level', 'admin')->get();
        $data["title"] = "Admin";
        return view('admin.index', $data);
    }

    public function add()
    {
        $this->authorize('admin');
        $data["title"] = "Tambah Admin";
        return view('admin.add', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nik' => 'required|min:16|unique:users',
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'telp' => 'required',
        ]);
        
        $validatedData['password'] = hash::make($validatedData['password']);
        $validatedData['level'] = 'admin';

        User::create($validatedData);
        return redirect('/admin')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function edit(User $admin)
    {
        $this->authorize('admin');
        $data = User::where('users.username', $admin->username)->get();
        return view('admin.edit', [
            'admin' => $data[0],
            'title' => "Ubah Data Admin"
        ]);
    }

    public function update(Request $request, User $admin)
    {
        $this->authorize('admin');
        $rules = [
            'nama' => 'required',
            'telp' => 'required',
        ];

        if ($request->nik != $admin->nik) {
            $rules['nik'] = 'required|min:16|unique:users';
        }

        if ($request->username != $admin->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $admin->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if($request->password != null){
            $rules['password'] = 'min:8';
        }

        $validatedData = $request->validate($rules);
        
        if($request->password != null){
            $validateData['password'] = hash::make($request->password);
        }
    
        User::where('id', $admin->id)->update($validatedData);

        return redirect('/admin')->with('success', 'Data Admin Berhasil Diubah!');
    }

    public function destroy(User $admin)
    {
        $this->authorize('admin');
        User::destroy($admin->id);
        return redirect('/admin')->with('success', 'Data Admin Berhasil Dihapus!');
    }
}

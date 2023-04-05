<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $data["staffs"] = User::where('users.level', 'staff')->get();
        $data["title"] = "Staff";
        return view('staff.index', $data);
    }

    public function add()
    {
        $data["title"] = "Tambah Staff";
        return view('staff.add', $data);
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
        $validatedData['level'] = 'staff';

        User::create($validatedData);
        return redirect('/staff')->with('success', 'Staff berhasil ditambahkan!');
    }

    public function edit(User $staff)
    {
        $data = User::where('users.username', $staff->username)->get();
        return view('staff.edit', [
            'staff' => $data[0],
            'title' => "Ubah Data Staff"
        ]);
    }

    public function update(Request $request, User $staff)
    {
        $rules = [
            'nama' => 'required',
            'telp' => 'required',
        ];

        if ($request->nik != $staff->nik) {
            $rules['nik'] = 'required|min:16|unique:users';
        }

        if ($request->username != $staff->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $staff->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if($request->password != null){
            $rules['password'] = 'min:8';
        }

        $validatedData = $request->validate($rules);
        
        if($request->password != null){
            $validateData['password'] = hash::make($request->password);
        }
    
        User::where('id', $staff->id)->update($validatedData);

        return redirect('/staff')->with('success', 'Data Staff Berhasil Diubah!');
    }

    public function destroy(User $staff)
    {
        User::destroy($staff->id);
        return redirect('/staff')->with('success', 'Data Staff Berhasil Dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $data['title'] = 'Pengaduan';

        if (Auth::user()->level == 'masyarakat') {
            $data['pengaduan'] = Pengaduan::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return view('home.pengaduan.index', $data);
        } else {
            $data['pengaduan'] = Pengaduan::all();
            return view('dashboard.pengaduan.index', $data);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'pesan' => 'required',
            'status' => 'required',
        ]);

        $pengaduan = Pengaduan::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan',
            'data' => $pengaduan
        ]);
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $pengaduan
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'pesan' => 'required',
        ]);

        $pengaduan = Pengaduan::where('id', $id)->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diubah',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        Pengaduan::where('id', $id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ]);
    }
}

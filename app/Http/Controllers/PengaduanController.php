<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pesan' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/pengaduan';
            $file->move($tujuan_upload, $nama_file);
        } else {
            $nama_file = null;
        }

        $pengaduan = new Pengaduan;
        $pengaduan->user_id = Auth::user()->id;
        $pengaduan->foto = $nama_file;
        $pengaduan->pesan = $request->pesan;
        $pengaduan->status = 'proses';
        $pengaduan->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
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

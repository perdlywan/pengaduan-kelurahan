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
            $data['pengaduan'] = Pengaduan::where('user_id', Auth::user()->id)->orderBy('status', 'asc')->orderBy('created_at', 'asc')->get();
            return view('dashboard.pengaduan.index', $data);
        } else {
            $data['pengaduan'] = Pengaduan::with('user', 'modified')->orderBy('status', 'asc')->orderBy('created_at', 'asc')->get();
            return view('dashboard.pengaduan.index', $data);
        }
    }

    public function add()
    {
        $this->authorize('masyarakat');
        $data['title'] = 'Buat Pengaduan';
        return view('dashboard.pengaduan.add', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('masyarakat');
        $validator = $request->validate([
            'user_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pesan' => 'required',
            'status' => 'required',
        ]);

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

        return redirect('/pengaduan')->with('success', 'Pengaduan berhasil dikirim');
    }

    public function rating($id)
    {
        if (Auth::user()->level == 'masyarakat') {
            $data = Pengaduan::where('id', $id)->where('user_id', Auth::user()->id)->first();

            return response()->json([
                'success' => true,
                'pengaduan' => $data
            ]);
        }
    }

    public function edit($id)
    {
        if (Auth::user()->level == 'masyarakat') {
            $data = Pengaduan::where('id', $id)->where('user_id', Auth::user()->id)->first();

        } else {
            $data = Pengaduan::where('id', $id)->with('user')->first();
        }

        return view('dashboard.pengaduan.edit', [
            'pengaduan' => $data,
            'title' => 'Ubah Data Pengaduan'
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->level == 'masyarakat') {
            if ($request->rating == null) {
                $data = $request->validate([
                    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'pesan' => 'required',
                ]);

                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $nama_file = time() . "_" . $file->getClientOriginalName();
                    $tujuan_upload = 'images/pengaduan';
                    $file->move($tujuan_upload, $nama_file);

                    $pengaduan = Pengaduan::where('id', $id)->update([
                        'foto' => $nama_file,
                        'pesan' => $request->pesan,
                    ]);
                } else {
                    $pengaduan = Pengaduan::where('id', $id)->update([
                        'pesan' => $request->pesan,
                    ]);
                }

                return redirect('/pengaduan')->with('success', 'Laporan pengaduan berhasil diubah');
            } else {
                $data = $request->validate([
                    'rating' => 'nullable',
                ]);

                $pengaduan = Pengaduan::where('id', $id)->update($data);

                return redirect()->route('pengaduan.index')->with('success', 'Berhasil memberikan rating');
            }
        } else {
            $data = $request->validate([
                'modified_by' => 'nullable',
                'status' => 'required',
                'tanggapan' => 'required',
            ]);

            $pengaduan = Pengaduan::where('id', $id)->update($data);

            return redirect('/pengaduan')->with('success', 'Laporan pengaduan berhasil ditanggapi');
        }
    }

    public function destroy($id)
    {
        Pengaduan::where('id', $id)->delete();

        return redirect('/pengaduan')->with('success', 'Data berhasil dihapus');
    }
}
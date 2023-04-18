<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $data["title"] = "Pengaduan";

        if (Auth::user()->level == 'masyarakat') {
            return view('home.pengaduan.index');
        } else {
            return view('dashboard.pengaduan.index', $data);
        }
    }
}

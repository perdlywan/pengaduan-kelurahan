<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $data["title"] = "Pengaduan";
        return view('pengaduan.index', $data);
    }
}
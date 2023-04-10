<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'count_pengaduan_proses' => Pengaduan::where('status', 'proses')->count(),
            'count_pengaduan_selesai' => Pengaduan::where('status', 'selesai')->count(),
        ];

        return view('dashboard.index', $data);
    }
}
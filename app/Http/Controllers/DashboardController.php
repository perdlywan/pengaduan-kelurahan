<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('admin&staff');
        $data = [
            'title' => 'Dashboard',
            'count' => [
                'pengaduan' => Pengaduan::count(),
                'pengaduan_proses' => Pengaduan::where('status', 'proses')->count(),
                'pengaduan_selesai' => Pengaduan::where('status', 'selesai')->count(),
                'users' => User::count(),
                'masyarakat' => User::where('level', 'masyarakat')->count(),
                'admin' => User::where('level', 'admin')->count(),
                'staff' => User::where('level', 'staff')->count(),
            ]
        ];

        return view('dashboard.index', $data);
    }
}

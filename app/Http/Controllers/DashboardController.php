<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        if (Auth::user()->level == 'admin') {
            $data['count'] = [
                'pengaduan' => Pengaduan::count(),
                'pengaduan_proses' => Pengaduan::where('status', 'proses')->count(),
                'pengaduan_selesai' => Pengaduan::where('status', 'selesai')->count(),
                'users' => User::count(),
                'masyarakat' => User::where('level', 'masyarakat')->count(),
                'admin' => User::where('level', 'admin')->count(),
                'staff' => User::where('level', 'staff')->count(),
            ];
        } else {
            $data['count'] = [
                'pengaduan' => Pengaduan::where('user_id', Auth::user()->id)->count(),
                'pengaduan_proses' => Pengaduan::where('user_id', Auth::user()->id)->where('status', 'proses')->count(),
                'pengaduan_selesai' => Pengaduan::where('user_id', Auth::user()->id)->where('status', 'selesai')->count(),
            ];
        }
        return view('dashboard.index', $data);
    }
}

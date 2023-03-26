<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data["masyarakats"] = User::where('users.level', 'masyarakat')->get();
        $data["title"] = "Masyarakat";
        return view('masyarakat.index', $data);
    }
}

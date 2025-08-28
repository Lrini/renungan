<?php

namespace App\Http\Controllers;
use App\Models\Renungan;
use App\Models\User;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $renungans = Renungan::with('user')->orderBy('tanggal', 'desc')->take(1)->get(); //ambil 5 renungan terbaru
        $kegiatans = Kegiatan::with('user')->orderBy('waktu', 'desc')->get(); //ambil 5 kegiatan terbaru
        return view('index', compact('renungans', 'kegiatans'));
    }
}
 
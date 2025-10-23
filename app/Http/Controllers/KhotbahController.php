<?php

namespace App\Http\Controllers;

use App\Models\khotbah;
use Illuminate\Http\Request;

class KhotbahController extends Controller
{
    public function index()
    {
       $khotbahs = khotbah::orderBy('tanggal', 'desc')->take(1)->get();
       return view('khotbah.index',[
        'title' => 'Khotbah mingguan',
        'khotbahs' => $khotbahs,
       ]);
    }

    public function show(khotbah $khotbah) 
    {
        return view('khotbah.show',[
            'title' => $khotbah->judul,
            'khotbah' => $khotbah
        ]);
    }
}

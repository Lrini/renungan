<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all(); // Mengambil semua data kegiatan
        return view('kegiatan.index', compact('kegiatans')); // Mengirim data kegiatan ke view
    }

    public function show(Kegiatan $kegiatan){
    return view('kegiatan',[
        'kegiatan' => $kegiatan
    ]);
   }
}

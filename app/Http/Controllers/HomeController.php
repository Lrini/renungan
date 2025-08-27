<?php

namespace App\Http\Controllers;
use App\Models\Renungan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $renungans = Renungan::with('user')->orderBy('tanggal', 'desc')->take(1)->get(); //ambil 5 renungan terbaru
        return view('index', compact('renungans'));
    }
}

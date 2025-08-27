<?php

namespace App\Http\Controllers;
use App\Models\Renungan;
use App\Models\User;
use Illuminate\Http\Request;

class RenunganController extends Controller
{
   public function index(){
    return view ('index',[
        'renungans' => Renungan::with('user')->orderBy('tanggal', 'desc')->take(5)->get()
    ]);
   }

   public function show(Renungan $renungan){
    return view('renungan',[
        'renungan' => $renungan
    ]);
   }
}

<?php

namespace App\Http\Controllers;

use App\Models\Renungan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RenunganPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dashboard.renungan.index',[
            'renungans' => Renungan::where('user_id', auth()->user()->id)->get(), // ambil semua post yang dibuat oleh user yang sedang login
            'title' => 'My Posts'
        ])->with('success', 'Post retrieved successfully'
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.renungan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'ayat' => 'required|max:255',
            'image' => 'image|file|max:1024', // maksimal ukuran file
            'tanggal' => 'required|date',
            'isi' => 'required'
        ]);
        if ($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images'); // simpan file gambar ke folder post-images
        }
        // Tambahkan user_id ke dalam data yang akan disimpan
        // ambil user yang sedang login dan simpan id-nya
        // 'excerpt' diambil dari isi, maksimal 200 karakter
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi), 200);

        // Strip HTML tags from isi before saving
        $validatedData['isi'] = strip_tags($validatedData['isi']);

        Renungan::create($validatedData); // simpan data post ke database

        // Redirect ke halaman posts dengan pesan sukses
        return redirect('/dashboard/renungan')->with('success', 'Post has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function show(Renungan $renungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Renungan $renungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renungan $renungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renungan $renungan)
    {
        //
    }
}

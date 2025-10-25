<?php

namespace App\Http\Controllers;

use App\Models\khotbah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KhotbahPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view ('dashboard.khotbah.index',[
            'khotbahs' => khotbah::with('user')->orderBy('tanggal')->get() // menampilkan semua khotbah terbaru
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.khotbah.create');
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
            'pengkhotbah' => 'required|max:255',
            'youtube_url' => 'required|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required'
        ]);

        if (isset($validatedData['judul'])) {
            $validatedData['slug'] = Str::slug($validatedData['judul']);
        }

        
        // Tambahkan user_id ke dalam data yang akan disimpan
        // ambil user yang sedang login dan simpan id-nya
        $validatedData['user_id'] = auth()->user()->id;

        // Strip HTML tags from deskripsi before saving
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);

        khotbah::create($validatedData); // simpan data post ke database



        // Redirect ke halaman posts dengan pesan sukses
        return redirect('/dashboard/khotbah')->with('success', 'Post has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khotbah  $khotbah
     * @return \Illuminate\Http\Response
     */
    public function show(khotbah $khotbah)
    {
        return view('dashboard.khotbah.show',[
            'khotbahs' => $khotbah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khotbah  $khotbah
     * @return \Illuminate\Http\Response
     */
    public function edit(khotbah $khotbah)
    {
        return view('dashboard.khotbah.edit',[
            'khotbahs' => $khotbah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khotbah  $khotbah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, khotbah $khotbah)
    {
        $rules = [
            'judul' => 'sometimes|required|max:255',  //sometimes artinya field ini opsional
            'pengkhotbah' => 'sometimes|required|max:255',
            'tanggal' => 'sometimes|required|date',
            'youtube_url' => 'sometimes|required|max:255',
            'deskripsi' => 'sometimes|required'
        ];

        $validatedData = $request->validate($rules);


        $validatedData['user_id'] = auth()->user()->id;
         // Strip HTML tags from deskripsi before saving
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);

        khotbah::where('id', $khotbah->id)->update($validatedData);

        return redirect('/dashboard/khotbah')->with('success', 'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khotbah  $khotbah
     * @return \Illuminate\Http\Response
     */
    public function destroy(khotbah $khotbah)
    {
        khotbah::destroy($khotbah->id);
        return redirect('/dashboard/khotbah')->with('success', 'Post has been deleted successfully');
    }
}

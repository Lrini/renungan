<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class KegiatanPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kegiatan.index',[
            'kegiatans' => Kegiatan::where('user_id', auth()->user()->id)->get(), // ambil semua post yang dibuat oleh user yang sedang login
            'title' => 'My Kegiatan'
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
        return view('dashboard.kegiatan.create');
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
            'nama' => 'required|max:255',
            'tempat' => 'required|max:255',
            'image' => 'image|file|max:1024', // maksimal ukuran file
            'waktu' => 'required|date',
            'deskripsi' => 'required'
        ]);
        if ($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images'); // simpan file gambar ke folder post-images
        }
        // Tambahkan user_id ke dalam data yang akan disimpan
        // ambil user yang sedang login dan simpan id-nya
        // 'excerpt' diambil dari isi, maksimal 200 karakter
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200);

        // Strip HTML tags from isi before saving
        $validatedData['deskripsi'] = strip_tags($validatedData['deskripsi']);

        Kegiatan::create($validatedData); // simpan data post ke database

        // Redirect ke halaman posts dengan pesan sukses
        return redirect('/dashboard/kegiatan')->with('success', 'Post has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('dashboard.kegiatan.show',[
            'kegiatans' => $kegiatan,
            'title' => 'Kegiatan Details'
        ])->with('success', 'Kegiatan retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
         return view('dashboard.kegiatan.edit',[
            'kegiatans' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $rules = [
            'nama' => 'sometimes|required|max:255',  //sometimes artinya field ini opsional
            'tempat' => 'sometimes|required|max:255',
            'waktu' => 'sometimes|required|date',
            'image' => 'sometimes|image|file|max:1024',
            'deskripsi' => 'sometimes|required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        if (isset($validatedData['deskripsi'])) {
            $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['deskripsi']), 200);
            $validatedData['deskripsi'] = strip_tags($validatedData['deskripsi']);
        }

        Kegiatan::where('id', $kegiatan->id)->update($validatedData);

        return redirect('/dashboard/kegiatana')->with('success', 'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if($kegiatan->image){
                Storage::delete($kegiatan->image);
            }
         Kegiatan::destroy($kegiatan->id); // simpan data post ke database
        // Redirect ke halaman posts dengan pesan sukses

        return redirect('/dashboard/kegiatan')->with('success', 'Post has been deleted successfully');
    }
}

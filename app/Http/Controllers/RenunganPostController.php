<?php

namespace App\Http\Controllers;

use App\Models\Renungan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
      //  $validatedData['isi'] = strip_tags($validatedData['isi']);
      $validatedData['isi'] = $request->isi;

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
         return view('dashboard.renungan.show',[
            'renungans' => $renungan,
            'title' => 'Renungan Details'
        ])->with('success', 'Renungan retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Renungan $renungan)
    {
          return view('dashboard.renungan.edit',[
            'renungans' => $renungan
        ]);
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
        // Validation rules with nullable to allow partial updates
        $rules = [
            'judul' => 'sometimes|required|max:255',  //sometimes artinya field ini opsional
            'ayat' => 'sometimes|required|max:255',
            'tanggal' => 'sometimes|required|date',
            'image' => 'sometimes|image|file|max:1024',
            'isi' => 'sometimes|required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        if (isset($validatedData['isi'])) {
            $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['isi']), 200);
            $validatedData['isi'] = $request->isi;
        }

        Renungan::where('id', $renungan->id)->update($validatedData);

        return redirect('/dashboard/renungan')->with('success', 'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renungan $renungan)
    {
        if($renungan->image){
                Storage::delete($renungan->image);
            }
         Renungan::destroy($renungan->id); // simpan data post ke database
        // Redirect ke halaman posts dengan pesan sukses

        return redirect('/dashboard/renungan')->with('success', 'Post has been deleted successfully');
    }

    public function latest()
    {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $renungan = Renungan::whereNotNull('tanggal')
                ->orderBy('tanggal', 'desc')
                ->orderBy('id', 'desc')
                ->first();

            if (!$renungan) {
                // fallback to latest record by id if no record with non-null tanggal
                $renungan = Renungan::orderBy('id', 'desc')->first();
            }

            if (!$renungan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada renungan'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Renungan terbaru berhasil diambil',
                'data' => $renungan
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            Log::error('Error fetching latest renungan: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data renungan'
            ], 500);
        }
    }

}

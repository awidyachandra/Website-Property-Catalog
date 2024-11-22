<?php

namespace App\Http\Controllers;

use App\Models\tbl_galeri;
use App\Models\tbl_image;
use App\Models\tbl_user;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;


class contentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = tbl_galeri::orderBy('id', 'asc')->paginate(10);
        return view('manajemen.konten', ['galeri' => $galeri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('manajemen.addcon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validasi input untuk multiple images
    $request->validate([
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan data galeri
    $galeri = tbl_galeri::create([
        'nama_aset' => $request->nama_aset,
        'type_aset' => $request->type_aset,
        'deskripsi' => $request->deskripsi,
        'lokasi' => $request->lokasi,
        'kondisi' => $request->kondisi,
        'status' => $request->status,
        'luas_tanah' => $request->luas_tanah,
        'jml_lantai' => $request->jml_lantai,
        'jml_ruangan' => $request->jml_ruangan,
    ]);

    // Proses upload gambar jika ada
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $index => $file) {
            // Generate nama file baru untuk gambar
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);

            // Menyimpan gambar ke tabel tbl_image melalui relasi images
            $galeri->images()->create([
                'image' => $fileName,  // Nama file gambar
            ]);

            // Jika gambar pertama, simpan sebagai gambar utama
            if ($index === 0) {
                $galeri->update([
                    'image' => $fileName, // Ubah 'images' ke 'main_image' jika kolom utama menggunakan nama ini
                ]);
            }
        }
    }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('content.index')
                     ->with('success', 'Content added successfully with multiple images.');
    }
    
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $galeri = tbl_galeri::with('images')->findOrFail($id);

            return view('manajemen.editcont', compact('galeri'));
        }

        public function update(Request $request, $id)
        {
            // Validasi input untuk multiple images
    $request->validate([
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Ambil data galeri berdasarkan ID
    $galeri = tbl_galeri::findOrFail($id);

    // Update data galeri
    $galeri->update([
        'nama_aset' => $request->nama_aset,
        'type_aset' => $request->type_aset,
        'deskripsi' => $request->deskripsi,
        'lokasi' => $request->lokasi,
        'kondisi' => $request->kondisi,
        'status' => $request->status,
        'luas_tanah' => $request->luas_tanah,
        'jml_lantai' => $request->jml_lantai,
        'jml_ruangan' => $request->jml_ruangan,
    ]);

    // Cek dan hapus gambar lama jika ada gambar baru yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama dari direktori dan database
        foreach ($galeri->images as $oldImage) {
            if (file_exists(public_path('img/' . $oldImage->image))) {
                unlink(public_path('img/' . $oldImage->image));
            }
            $oldImage->delete(); // Hapus dari tabel tbl_image
        }

        // Simpan gambar baru
        foreach ($request->file('image') as $index => $file) {
            // Generate nama file baru untuk gambar
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);

            // Menyimpan gambar ke tabel tbl_image melalui relasi images
            $galeri->images()->create([
                'image' => $fileName,  // Nama file gambar
            ]);

            // Set gambar pertama sebagai gambar utama di tbl_galeri
            if ($index === 0) {
                $galeri->update([
                    'image' => $fileName, // Simpan nama file gambar pertama sebagai gambar utama
                ]);
            }
        }
    }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('content.index')
                     ->with('success', 'Content updated successfully with multiple images.');
        }

    public function destroy(string $id) {
        //
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $galeri = tbl_galeri::where('nama_aset', 'LIKE', '%'.$search.'%')->paginate(10);
        return view('manajemen.konten', compact('galeri'));
    }

    public function deleteImage($id) 
    {
        $image = tbl_image::findOrFail($id);

        // Hapus gambar dari folder public/img
        $imagePath = public_path('img/' . $image->images);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Hapus file gambar
        }
    
        // Hapus record gambar dari database
        $image->delete();
    
        // Redirect atau kembali dengan pesan sukses
        return back()->with('success', 'Image deleted successfully.');
    }
}
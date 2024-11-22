<?php

namespace App\Http\Controllers;

use App\Models\tbl_galeri;
use Illuminate\Http\Request;

class detailcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = tbl_galeri::paginate(12);
        return view('manajemen.catalog', compact('properties')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $properties = tbl_galeri::findOrFail($id);
        return view('manajemen.detail', compact('properties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); 
        
        session(['searchPerformed' => true]);
        
        $properties = tbl_galeri::where('nama_aset', 'like', "%$query%")
            ->orWhere('type_aset', 'like', "%$query%")
            ->orWhere('deskripsi', 'like', "%$query%")
            ->orWhere('lokasi', 'like', "%$query%")
            ->paginate(12);

        return view('manajemen.catalog', compact('properties', 'query'));
    }
}

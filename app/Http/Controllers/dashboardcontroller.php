<?php

namespace App\Http\Controllers;

use App\Models\tbl_galeri;
use App\Models\tbl_guest;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = tbl_galeri::all();
        $total = tbl_galeri::count(); // Menghitung jumlah data
        $guesttotal = tbl_guest::count();
        return view('manajemen.dashboard', compact('total', 'guesttotal', 'galeri'));
        
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
        //
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
}

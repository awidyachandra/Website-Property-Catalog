<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    
    public function index()
    {
        $properties = Property::where('status', 'tersedia')->take(6)->get();
        return view('landing-page', compact('properties'));
    }

    

    public function search(Request $request)
    {
        $query = $request->input('query'); 
        
        session(['searchPerformed' => true]);
        
        $properties = Property::where('nama_aset', 'like', "%$query%")
            ->orWhere('type_aset', 'like', "%$query%")
            ->orWhere('deskripsi', 'like', "%$query%")
            ->orWhere('lokasi', 'like', "%$query%")
            ->get();

        return view('landing-page', compact('properties', 'query'));
    }

    public function pripol()
    {
        return view('privacy-policy');
    }
}

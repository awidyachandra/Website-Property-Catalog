<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function katalog()
    {
        $properties = Property::paginate(12);
        return view('list-katalog', compact('properties')) ;
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); 
        
        session(['searchPerformed' => true]);
        
        $properties = Property::where('nama_aset', 'like', "%$query%")
            ->orWhere('type_aset', 'like', "%$query%")
            ->orWhere('deskripsi', 'like', "%$query%")
            ->orWhere('lokasi', 'like', "%$query%")
            ->paginate(12);

        return view('list-katalog', compact('properties', 'query'));
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:16',
            'city' => 'required|string|max:255',
        ]);

        Guest::create($validatedData);

    
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    
}

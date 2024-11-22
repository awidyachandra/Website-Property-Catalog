<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_user; 
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = tbl_user::orderBy('id_user', 'asc')->paginate(10);
        return view('manajemen.manajemen1', ['user' => $user]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manajemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = [
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password), 
            'status' => $request->status,
        ];
    
        // Simpan data user
        tbl_user::create($user);
    
        return redirect()->route('manajemen.store') 
                         ->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ...
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_user)
    {
        $user = tbl_user::where('username', $id_user)->first();
        return view('manajemen.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_user)
    {
        
        $user = [
            'status' => $request->status,
        ];
        
       
        tbl_user::where('username', $id_user)->update($user);
        
        return redirect()->route('manajemen.index') 
                         ->with('success', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ...
    }
    
    public function search(Request $request) {
        $search = $request->input('search');
        $user = tbl_user::where('username', 'LIKE', '%'.$search.'%')->paginate(10);
        return view('manajemen.manajemen1', compact('user'));
    }
}

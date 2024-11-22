<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use App\Models\tbl_guest;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        $guest = tbl_guest::orderBy('id', 'asc')->paginate(10);
        return view('manajemen.guest', ['guest' => $guest]);
    }

    public function index2()
    {
        $guest = tbl_guest::orderBy('id', 'asc')->paginate(10);
        return view('manajemen.guest2', ['guest' => $guest]);
    }
}
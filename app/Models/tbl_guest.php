<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_guest extends Model
{
    use HasFactory;
    protected $table = 'tbl_guest';
    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_hp',
    ];
}

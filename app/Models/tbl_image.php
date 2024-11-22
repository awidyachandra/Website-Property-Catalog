<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_image extends Model
{
    use HasFactory;
    protected $table = 'tbl_image';
    protected $fillable = ['image', 'galeri_id']; // Pastikan kolom 'galeri_id' ada

    // Relasi ke tbl_galeri
    public function galeri()
    {
        return $this->belongsTo(tbl_galeri::class, 'galeri_id');
    }
}

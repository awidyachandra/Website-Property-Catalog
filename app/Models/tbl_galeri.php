<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_galeri extends Model
{
    use HasFactory;
    protected $table = 'tbl_galeri';
    protected $fillable = [
        'nama_aset',
        'type_aset',
        'deskripsi',
        'lokasi',
        'image',
        'kondisi',
        'status',
        'luas_tanah',
        'jml_ruangan',
        'jml_lantai',
    ];
    public function images()
    {
        return $this->hasMany(tbl_image::class, 'galeri_id'); // Asumsikan 'galeri_id' adalah kolom yang menghubungkan dengan tabel galeri
    }
}

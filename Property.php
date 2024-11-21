<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'tbl_galeri';

    protected $fillable = [
        'nama_aset', 'type_aset', 'deskripsi', 'lokasi', 'image', 'kondisi', 'status', 'luas_tanah', 'jml_ruangan', 'jml_lantai'
    ];

    protected $primaryKey = 'id'; // Menggunakan id_galeri sebagai primary key
    public $incrementing = true;
    protected $keyType = 'int';
}

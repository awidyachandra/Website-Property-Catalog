<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',  
        'email', 
        'phone',
        'city',  
    ];
    protected $table = 'guests';
    protected $primaryKey = 'id_guest';
    public $incrementing = true;
    protected $keyType = 'int';
}

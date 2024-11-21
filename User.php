<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role'
    ];
  
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Metode untuk memeriksa apakah pengguna adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Metode untuk memeriksa apakah pengguna adalah operator
    public function isOperator(): bool
    {
        return $this->role === 'operator';
    }
}

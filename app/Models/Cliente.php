<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clientes';
    protected $fillable = [
        'usuario', 'email', 'contraseña'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}

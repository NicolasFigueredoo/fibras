<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'usuario', 'email', 'password','admin','zonaprivada'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ClienteEmpresa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clientesempresa';
    protected $fillable = [
        'nombre', 'imagen', 
    ];




}

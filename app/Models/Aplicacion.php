<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    use HasFactory;
    protected $table = 'aplicaciones';

    protected $fillable = ['orden','nombre', 'imagen', 'nombreAlternativo'];
}

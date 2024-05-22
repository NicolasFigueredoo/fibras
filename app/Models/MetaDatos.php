<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaDatos extends Model
{
    use HasFactory;
    protected $table = 'metadatos';

    protected $fillable = ['seccion','clave'];


}

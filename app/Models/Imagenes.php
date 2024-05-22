<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;
    protected $table = 'imagenes';

    protected $fillable = ['id_producto', 'path'];

    public function Producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

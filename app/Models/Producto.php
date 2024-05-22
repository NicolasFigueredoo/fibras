<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = ['orden', 'nombre', 'texto', 'destacado'];


    public function SubProductos()
    {
        return $this->hasMany(SubProducto::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'id_producto', 'id');
    }
}

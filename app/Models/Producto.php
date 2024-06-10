<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = ['orden', 'nombre', 'texto', 'hojaseguridad','fichatecnica'];


    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'id_producto', 'id');
    }
}

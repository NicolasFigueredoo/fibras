<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Litro extends Model
{
    use HasFactory;
    protected $table = 'litros';

    protected $fillable = ['imagen', 'cantidad'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valores extends Model
{
    use HasFactory;
    protected $table = 'valores';

    protected $fillable = ['orden','titulo','texto', 'imagen'];

   
}
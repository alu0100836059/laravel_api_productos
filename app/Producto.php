<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $filable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen'
    ];
}

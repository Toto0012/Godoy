<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = "inventario";

    protected $fillable = [
        'nombre',
        'habia',
        'entro',
        'quedo',
        'gasto',
        'precio',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'datetime'
    ];
}
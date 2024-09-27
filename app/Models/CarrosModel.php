<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrosModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'carro',
        'placa',
        'ano',
        'modelo',
        'valor',
        'tipo',
        'marca'
    ];
}

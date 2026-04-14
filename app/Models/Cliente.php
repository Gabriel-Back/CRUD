<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf'
    ];
    
}

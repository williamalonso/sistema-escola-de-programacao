<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [ //Serve para criar registro em massa
        'titulo', 'descricao', 'imagem', 'valor', 'publicado',
    ];
}

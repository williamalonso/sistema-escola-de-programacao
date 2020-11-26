<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [ //Serve para criar registro em massa
        'titulo', 'descricao', 'imagem', 'valor', 'publicado',
    ];

    public static function atualiza_id() {
        $conn = DB::connection('mysql')->select("ALTER TABLE cursos AUTO_INCREMENT = 0"); //reseta o auto_increment do o "id"
        return $conn;
    }
    public static function pega_ultimo_id() { //pega o último id do curso criado
        $conn = DB::connection('mysql')->select("SELECT id from cursos order by id desc limit 1");
        return $conn;
    }
}

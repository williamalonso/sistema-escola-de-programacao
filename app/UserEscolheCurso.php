<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserEscolheCurso extends Model
{
    protected $fillable = [ //Serve para criar registro em massa
        'iduser', 'idcurso',
    ];

    public static function insert_join($idusuario, $idcurso) {
        
        $conn = DB::connection('mysql')->select("INSERT INTO user_escolhe_curso VALUES (default, '$idusuario', '$idcurso')"); // insere na tabela de join o usuário logado com o curso que ele acabou de criar
        return $conn;
    }
    public static function atualiza_id() {
        $conn = DB::connection('mysql')->select("ALTER TABLE user_escolhe_curso AUTO_INCREMENT = 0"); //reseta o auto_increment do "id"
        return $conn;
    }
    public static function deleta($id) {
        $conn = DB::connection('mysql')->select("DELETE from user_escolhe_curso where idcurso like '$id' limit 1"); //deleta o curso da tabela que faz o Join
        return $conn;
    }

}

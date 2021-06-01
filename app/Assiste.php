<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Assiste extends Model
{
	protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = "user_escolhe_curso";
    protected $fillable = ['id', 'iduser', 'idcurso',];

    public static function index($id) {

        $conn = DB::table('user_escolhe_curso')
    					    ->select('name', 'titulo', 'publicado', 'imagem', 'descricao')
    						->from('user_escolhe_curso')
    						->join('users', 'users.id', '=', 'user_escolhe_curso.iduser')
                            ->join('cursos', 'cursos.id', '=', 'user_escolhe_curso.idcurso')
                            ->where('users.id', '=', $id)
                            ->paginate(3);
    	return $conn;
    }

    public static function conecta($id) {

        $conn = DB::table('user_escolhe_curso')
    					    ->select('name', 'titulo', 'publicado', 'imagem', 'descricao')
    						->from('user_escolhe_curso')
    						->join('users', 'users.id', '=', 'user_escolhe_curso.iduser')
                            ->join('cursos', 'cursos.id', '=', 'user_escolhe_curso.idcurso')
                            ->where('users.id', '=', $id)
                            ->paginate(3);
    	return $conn;
    }

    public static function lista_admin($id) {
        
        $conn = DB::table('user_escolhe_curso')
                            ->select('name', 'titulo', 'publicado', 'imagem', 'descricao', 'valor', 'cursos.id')
                            ->from('user_escolhe_curso')
                            ->join('users', 'users.id', '=', 'user_escolhe_curso.iduser')
                            ->join('cursos', 'cursos.id', '=', 'user_escolhe_curso.idcurso')
                            ->where('users.id', '=', $id)
                            ->get();
        return $conn;
    }
}

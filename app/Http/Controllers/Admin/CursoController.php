<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;
use App\UserEscolheCurso;
use Session;
use App\Assiste;
use Auth;

class CursoController extends Controller
{
    public function index() {
        $registros = Assiste::lista_admin(Auth::user()->id);
        return view('admin.cursos.index', compact('registros'));
    }

    public function adicionar() {
        return view('admin.cursos.adicionar');
    }

    public function salvar(Request $req) {

        Curso::atualiza_id(); // reseta o id da tabela 'cursos'
        UserEscolheCurso::atualiza_id();
        
        $dados = $req->all(); //Vai trazer todos os dados da requisição
        
        if(isset($dados['publicado'])) { //Se existir o dado "publicado"
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('imagem')) { //Se existe algum arquivo com nome "imagem"
            $imagem = $req->file('imagem'); //Traz o arquivo "imagem" e atribui p/ variável $imagem
            $num = rand(1111, 9999); //Gera numero randômico
            $dir = "img/cursos"; //Diretório que vou salvar a imagem
            $ex = $imagem->guessClientExtension(); //Função p/ pegar extensão do arquivo
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem); //Mover o arquivo para o diretório
            $dados['imagem'] = $dir."/".$nomeImagem;

        }
        
        if(Curso::create($dados)) { //Para fazer esse comando, tem que definir o 'fillable' no model 'Curso.php'
            Session::flash('message', 'Curso inserido com sucesso!');
            Session::flash('alert-class', 'alert-success');
        }

        $idcurso = Curso::pega_ultimo_id(); // pega último id da tabela de cursos

        $x = Auth::user()->id; // usuário logado
        $y = $idcurso['0']->id; // valor do maior id da tabela de cursos
        UserEscolheCurso::insert_join($x, $y); // insere na tabela de join o usuário logado com o curso que ele acabou de criar

        return redirect()->route('admin.cursos');

    }

    public function editar($id) {

        $registro = Curso::find($id);
        return view('admin.cursos.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id) {

        $dados = $req->all();
        
        if(isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        }else {
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/cursos";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        Curso::find($id)->update($dados);

        return redirect()->route('admin.cursos');

    }

    public function deletar($id) {
        Curso::find($id)->delete();
        Curso::atualiza_id(); // reseta o id da tabela 'cursos'
        UserEscolheCurso::deleta($id); // além de deletar o curso na tabela de cursos, eu preciso deletá-lo também na tabela que faz o join
        UserEscolheCurso::atualiza_id(); // reseta o id da tabela de join
        return redirect()->route('admin.cursos');
    }
}

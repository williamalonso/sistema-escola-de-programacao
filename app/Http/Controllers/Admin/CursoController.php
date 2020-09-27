<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{
    public function index() {

        $registros = Curso::all();
        return view('admin.cursos.index', compact('registros'));
    }

    public function adicionar() {
        return view('admin.cursos.adicionar');
    }

    public function salvar(Request $req) {

        $dados = $req->all(); //Vai trazer todos os dados da requisição
        
        if(isset($dados['publicado'])) { //Se existir o dado "publicado"
            $dados['publicado'] = 'sim';
        }else {
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

        Curso::create($dados); //Para fazer esse comando, tem que definir o 'fillable' no model 'Curso.php'

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
        return redirect()->route('admin.cursos');
    }
}

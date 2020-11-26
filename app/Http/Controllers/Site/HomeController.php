<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Curso;
use App\Assiste;
use Auth;


class HomeController extends Controller
{
    public function index() {
        
        if(Auth::check()){ //se o usuário estiver logado
            $cursos = Assiste::conecta(Auth::user()->id); // mostra os cursos desse usuário
            return view('home', compact('cursos'));
        }else {
            $cursos = Assiste::index(8); // mostra os cursos do usuário 8 como padrão
            return view('home', compact('cursos'));
        }
    }
}

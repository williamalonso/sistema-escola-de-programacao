<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Curso;
use App\Assiste;


class HomeController extends Controller
{
    public function index() {
        $cursos = Assiste::conecta();
        return view('home', compact('cursos'));
    }
}

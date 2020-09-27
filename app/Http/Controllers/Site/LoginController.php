<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function CadastrarNovoUsuario() {
        return view('usuario.cadastrarusuario');
    }

    public function SalvarNovoUsuario(Request $req) {

        $user = $req->except('_token', '_method');

        $user['name'] = $req->name;
        $user['email'] = $req->email;
        $user['password'] = bcrypt($req->password);
        
        if(User::where('email', '=', $user['email'])->count()) {
            User::where('email', '=', $user['email'])->update($user);
            Session::flash('message', 'Login alterado com sucesso!');
            Session::flash('alert-class', 'alert-success');
        } else {
            //$user->save();
            User::create($user);
            Session::flash('message', 'Conta criada com sucesso!');
            Session::flash('alert-class', 'alert-success');
        }

        return redirect()->route('site.home');
    }

    public function entrar(Request $req) {

        $dados = $req->all();
        if(Auth::attempt( ['email'=>$dados['email'], 'password'=>$dados['senha'] ] ) ) { //Se o usuário tem acesso
            return redirect()->route('admin.cursos');
        }else {
            return redirect()->route('site.home');
        }
    }

    public function sair() {
        Auth::logout();
        return redirect()->route('site.home');
    }
}


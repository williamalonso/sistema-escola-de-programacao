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

        User::atualiza_id(); //reseta o auto_increment do "id"

        $user = $req->except('_token', '_method');
        
        $user['name'] = $req->name;
        $user['email'] = $req->email;
        $user['password'] = bcrypt($req->password);
        
        if(User::where('email', '=', $user['email'])->count()) { // verifica se o email já está cadastrado
            User::where('email', '=', $user['email'])->update($user); // se estiver cadastrado, atualiza com a nova senha digitada
            Session::flash('message', 'Login alterado com sucesso!');
            Session::flash('alert-class', 'alert-success');
        } else {
            User::create($user);
            Session::flash('message', 'Conta criada com sucesso!');
            Session::flash('alert-class', 'alert-success');
        }

        return redirect()->route('site.home');
    }

    public function entrar(Request $req) {

        $dados = $req->all();
        if(Auth::attempt( ['email'=>$dados['email'], 'password'=>$dados['senha'] ] ) ) { //Se o usuário tem acesso
            Session::flash('message', 'Login realizado com sucesso!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('admin.cursos');
        }else {
            Session::flash('message', 'Senha ou email incorretos!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('site.home');
        }
    }

    public function sair() {
        Auth::logout();
        return redirect()->route('site.home');
    }
}


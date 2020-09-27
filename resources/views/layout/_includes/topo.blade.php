<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style type="text/css">
            .margin-left {
                margin-left: 10px;
            }
            .alerta {
                padding: 25px;
                border: 1px solid gray;
                border-radius: 3px;
                margin: 10px;
                font-size: 18px;
            }
            .sucesso {
                border-color: #87c940;
                color: #FFF;
                background-color: #a0d468;
            }
        </style>
    </head>
    <body>
    <header>
        <nav>
            <div class="nav-wrapper deep-orange">
                <a href="#" class="brand-logo margin-left">Escola de programação</a>
                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{route('site.home')}}">Home</a></li>
                    @if(Auth::guest()) <!-- retorna true quando o usuário não está logado no sistema -->
                        <li><a href="{{route('site.login')}}">Login</a></li>
                        <li><a href="{{route('site.cadastrar')}}">Cadastrar</a></li>
                    @else
                        <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                        <li><a href="#">{{auth::user()->name}}</a></li>
                        <li><a href="{{route('site.login.sair')}}">Sair</a></li>
                    @endif
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile">
            <li><a href="{{route('site.home')}}">Home</a></li>
            @if(Auth::guest()) <!-- retorna true quando o usuário não está logado -->
                <li><a href="{{route('site.login')}}">Login</a></li>
                <li><a href="{{route('site.cadastrar')}}">Cadastrar</a></li>
            @else
                <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                <li><a href="#">{{ Auth::user()->name }}</a></li>
                <li><a href="{{route('site.login.sair')}}">Sair</a></li>
            @endif
        </ul>
    </header>

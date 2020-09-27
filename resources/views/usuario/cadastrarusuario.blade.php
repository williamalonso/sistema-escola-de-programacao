@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')
<div class="container">
    <h3 class="center">Tela de cadastro</h3>
    <div class="row">
        <form class="col s12" class="" action="{{route('site.salvarusuario')}}" method="post">
        {{ csrf_field() }}
          <div class="row">
            <div class="input-field">
              <input id="first_name" type="text" class="validate" required="required" name="name">
              <label for="first_name">Digite seu nome</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <input id="disabled" type="email" class="validate" required="required" name="email">
              <label for="disabled">Digite seu e-mail</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <input id="password" type="password" class="validate" required="required" name="password">
              <label for="password">Digite sua senha</label>
            </div>
          </div>
          <button class="btn deep-orange">Enviar</button>
        </form>
    </div>
</div>
@endsection

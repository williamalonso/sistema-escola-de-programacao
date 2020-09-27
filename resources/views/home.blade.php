@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')
<div class="container" align="center">

    @if(Session::has('message'))
        <p class="alerta sucesso alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <h3 class="center">Lista de cursos</h3>
    <div class="row">
        @foreach($cursos as $curso)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{asset($curso->imagem)}}">
                    </div>
                    <div class="card-content">
                        <h4>{{$curso->titulo}}</h4>
                        <p>{{$curso->descricao}}</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Ver mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
<div class="row" align="center">
    {{$cursos->links()}}
</div>
@endsection
@extends('layout.site')

@section('titulo', 'Contatos')

@section('conteudo')

<h3>Essa é a nossa view Index</h3>
<br>


    @foreach($contatos as $contato)
        <p>{{ $contato->nome }}</p>
        <p>{{ $contato->tel }}</p>
    @endforeach

@endsection
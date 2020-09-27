<h1>For - if</h1>


@php
    $i = 0;
@endphp
@while($i<$value)
    - {{ $i }} <br/>
    @php
        $i++;
    @endphp
@endwhile


@forelse([] as $key => $value)
    <p>{{ $loop->index}} - {{$key}} => {{$value}}</p>
@empty
    <p>Nenhum registro encontrado</p>
@endforelse


@foreach($MyArray as $key => $value)
    <p>{{ $loop->index }} - {{ $key }} => {{ $value }}</p>
@endforeach





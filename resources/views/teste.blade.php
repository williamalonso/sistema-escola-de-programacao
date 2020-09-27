/*Template engine = serve para trocar os comandos back-end por comandos mais simples*/
<br/>
<br/>
/*inteprolação (no Blade) = pegar valores e mostrar na página */
<br/>
<br/>
{{ $nome }}
<br/>
<br/>
{{ $id }}
<br/>
<br/>
{{ $nome }} . ' ' . {{ $id }}
<br/>
<br/>
{{ 2+2 }}
<br/>
<br/>
{{ isset($x)?$x:"outro valor" }}
<br/>
<br/>
{!! "<h1>Texto</h1>" !!}
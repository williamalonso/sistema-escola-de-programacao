<div class="input-field">
    <input type="text" name="titulo" value="{{ isset($registro->titulo)? $registro->titulo : '' }}" required="required">
    <label>Título</label>
</div>

<div class="input-field">   
    <input type="text" name="descricao" value="{{ isset($registro->descricao)? $registro->descricao : '' }}" required="required">
    <label>Descrição</label>
</div>

<div class="input-field">
    <input type="text" name="valor" value="{{ isset($registro->valor)? $registro->valor : '' }}" required="required">
    <label>Valor</label>
</div>

<div class="file-field input-field">
    <div class="btn blue">
        <span>Imagem</span>
        <input type="file" name="imagem" required="required">
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
    </div>
</div>

@if(isset($registro->imagem))
<div class="input-field">
    <img width="150" src="{{asset($registro->imagem)}}" />
</div>
@endif

<div class="input-field">
    <p>
        <label for="test5">
            <input type="checkbox" value="true" name="publicado" id="test5" {{<?php  isset( $registro->publicado) && $registro->publicado == 'sim' ? 'checked' : '' ?>}} >
            <span>Publicar?</span>
        </label>
    </p>
    <br><br>
</div>
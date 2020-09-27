<!DOCTYPE html>
<html>
<head>
	<title>Formulário</title>
</head>
    <body>
        <h1>Criar novo cliente</h1>
        <form method="post" action="/iniciando-laravel/public/admin/client/cadastrar">
            {!! csrf_field() !!}
            <label for="name">Nome</label>
            <input type="text" name="name" id="name"/>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email"/>
            <button type="submit">Enviar</button>
        </form>
    </body>
</body>
</html>
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('home');
}); */

Route::get('/', ['as'=>'site.home', 'uses'=>'Site\HomeController@index']);

Route::get('/cadastrar', ['as'=>'site.cadastrar', 'uses'=>'Site\LoginController@CadastrarNovoUsuario']);
Route::post('/salvarusuario', ['as'=>'site.salvarusuario', 'uses'=>'Site\LoginController@SalvarNovoUsuario']);
Route::get('/login', ['as'=>'site.login', 'uses'=>'Site\LoginController@index']);
Route::post('/login/entrar', ['as'=>'site.login.entrar', 'uses'=>'Site\LoginController@entrar']);
Route::get('/login/sair', ['as'=>'site.login.sair', 'uses'=>'Site\LoginController@sair']);


Route::group([ 'middleware' => 'auth' ], function(){
    Route::get('/admin/cursos', ['as'=>'admin.cursos', 'uses'=>'Admin\CursoController@index']);
    Route::get('/admin/cursos/adicionar', ['as'=>'admin.cursos.adicionar', 'uses'=>'Admin\CursoController@adicionar']);
    Route::post('/admin/cursos/salvar', ['as'=>'admin.cursos.salvar', 'uses'=>'Admin\CursoController@salvar']);
    Route::get('/admin/cursos/editar/{id}', ['as'=>'admin.cursos.editar', 'uses'=>'Admin\CursoController@editar']);
    Route::put('/admin/cursos/atualizar/{id}', ['as'=>'admin.cursos.atualizar', 'uses'=>'Admin\CursoController@atualizar']);
    Route::get('/admin/cursos/deletar/{id}', ['as'=>'admin.cursos.deletar', 'uses'=>'Admin\CursoController@deletar']);
});



/* Route::get('/contato/{id?}', ['uses'=>'ContatoController@index']); */

/* Route::post('/contato', function(){
    dd($_POST);
    return "Contato POST";
});
Route::put('/contato', function(){
    return "Contato PUT";
}); */

/* Route::group(['prefix' => '/'], function() {
    Route::get('env', function() {
        var_dump(getenv('nome', 'xpto'));
    });
});
*/

/* Route::group(['prefix' => '/admin'], function() {
    Route::get('client', 'ClientsController@listar');
    Route::get('/client/form-cadastrar', 'ClientsController@formCadastrar');
    Route::post('client/cadastrar', 'ClientsController@cadastrar');
    Route::get('/client/{id}/form-editar', 'ClientsController@formEditar');
    Route::post('client/{id}/editar', 'ClientsController@editar');
    Route::get('client/{id}/excluir', 'ClientsController@excluir');
}); */

/*
Route::group(['prefix' => '/admin'], function() {
    Route::get('client', 'ClientsController@listar');
});

Route::get('controller/cliente/cadastrar', 'ClientsController@cadastrar');

Route::get('/blade', function() {
    $nome = 'william';
    $id = '10';
    return view('teste')
        ->with('nome', $nome)
        ->with('id', $id)
        ->with('x', 'Tenho valor');
});


Route::get('/cliente/cadastrar', function () {
    $nome = 'william';
    $id = '40';
    return view('cliente.cadastrar')
        ->with('nome', $nome)
        ->with('id', $id);
});

Route::get('/produto/{name}', function($name) {
    return "Produto $name";
});

Route::get('/produto/{name}/{id?}', function($name, $id = 1000) {
    return "Produto - $name - $id";
});


Route::get('/for-if/{value}', function($value) {
    return view('for-if')
        ->with('value', $value)
        ->with('MyArray', ['chave1' => 'valor1', 'chave2' => 'valor2', 'chave3' => 'valor3']);
});


use Illuminate\Http\Request;

 Route::get('/cliente', function(){ 
    $csrfToken = csrf_token();
    $html ?> =
    <html>
    <body>
        <h1>Cliente</h1>
        <form method="post" action="/cliente/cadastrar">
            <input type="hidden" name="_token" value="$csrfToken">
            <input type="text" name="name"/>
            <button type="submit">Enviar</button>
        </form>
    </body>
    </html>
<?php 
    return $html;
});

Route::post('/cliente/cadastrar', function(Request $request) {
    echo $request->get('name');
}); 


Route::post('/contato', function(){
    var_dump($_POST);           O var_dump vai mostrar todos os dados passados por post, em forma de arrays. (O token tbm entra).
    return "Olá";
});
No lugar de var_dump, podemos colocar "dd($_POST);", ele mostra a mesma coisa mas é visualmente melhor.


Route::get('/contato', function() {
    return "Contato PUT";
});
put serve para editar e para dar update em alguns registros
deu erro, não consegui implementar o put */

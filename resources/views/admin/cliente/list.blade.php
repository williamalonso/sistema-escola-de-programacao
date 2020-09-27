<!DOCTYPE html>
<html>
<head>
	<title></title>
	



</head>
<body style="background-color: rgba(0,0,0,.1);">
    <h1>Listar clientes</h1>
	<a href="/iniciando-laravel/public/admin/client/form-cadastrar">Novo cliente</a>
    <table id="example" class="dataTable">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Nome</th>
    			<th>Email</th>
				<th>Ações</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($clients as $key)
    			<tr>
    				<td>{{$key->id}}</td>
    				<td>{{$key->name}}</td>
    				<td>{{$key->email}}</td>
					<td>
						<a href= "/iniciando-laravel/public/admin/client/{{$key->id}}/form-editar">Editar</a>
						<a href= "/iniciando-laravel/public/admin/client/{{$key->id}}/excluir">Excluir</a>
					</td>
    			</tr>
    		@endforeach
    	</tbody>
    </table>

	{{ $clients->links() }}
	

</body>
	<!-- 
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			} );
	</script>
	-->
</html>
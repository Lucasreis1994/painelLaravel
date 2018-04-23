@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
			  <div class="panel-heading">Lista de clientes</div>
			  @if(Session::has('msg_sucesso'))
			  	<div class="alert alert-danger">
			  		{{ Session::get('msg_sucesso') }}
			  	</div>
			  	@endif
			  <div class="panel-body">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Nome</th>
				        <th>E-mail</th>
				        <th>Permissão</th>
				        <th></th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach ($usuarios as $usuario)
				      <tr>
				        <td>{{ $usuario->name }}</td>
				        <td>{{ $usuario->email }}</td>
				        <td>{{ $usuario->idPermissao }}</td>
				        <td>
				        	{{ Form::open(['url' => 'usuarios/'.$usuario->id, 'method' => 'delete']) }}
				        		<button type="submit" class="btn btn-danger">Excluir</button>
				        	{{ Form::close() }}
				        </td>
				        <td>
				        	<a href="cadastro/{{$usuario->id}}/editar" class="btn btn-warning">
				        		Editar
				        	</a>
				        </td>
				      </tr>				     
						@endforeach
				    </tbody>
				  </table>
			  </div>
			</div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
			  <div class="panel-heading">Cadastro de usuarios</div>
			  <div class="panel-body">
			  	@if(Session::has('msg_sucesso'))
			  	<div class="alert alert-success">
			  		{{ Session::get('msg_sucesso') }}
			  	</div>
			  	@endif
				
				@if(Request::is('*/editar'))
					{{ 'editando' }}
					{{ Form::model($usuarios, ['method' => 'PATCH', 'url' => 'usuarios/'.$usuarios->id]) }}
				@else
					{{ 'incluindo' }}
					{{ Form::open(['url' => 'usuarios/salvar', 'method' => 'post']) }}
				@endif
					{{ Form::label('name', 'Nome') }}
					{{ Form::input('text', 'name', null, ['class' => 'form-control'], ['required']) }}
					{{ Form::label('email', 'E-mail') }}
					{{ Form::input('email', 'email', null, ['class' => 'form-control'], ['required']) }}
					{{ Form::label('password', 'Senha') }}
					{{ Form::input('password', 'password', null, ['class' => 'form-control'], ['required']) }}
					{{ Form::label('idPermissao', 'Permissão') }}
					<select name="idPermissao" id="idPermissao" class="form-control">
					    @if(Request::is('*/editar'))
						    <option value="{{ $permissaoUsuario->id  }}">{{ $permissaoUsuario->nomePermissao  }}</option>
					    @else
					    	<option value=""> Selecione a permissão</option>
						    @foreach ($permissoes as $permissao)
						        <option value="{{ $permissao->id  }}">{{ $permissao->nomePermissao  }}</option>
						    @endforeach 
						@endif
					</select>
					{{ Form::submit('Salvar', ['class' => 'btn btn-primary pull-right']) }}
				{{ Form::close() }}
			  </div>
			</div>
        </div>
    </div>
</div>
@endsection

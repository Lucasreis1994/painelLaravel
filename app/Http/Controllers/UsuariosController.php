<?php

namespace App\Http\Controllers;

use App\User;
use App\Permissao;
use Illuminate\Http\Request;
use Redirect;

class UsuariosController extends Controller
{
	public function index(){
		$usuarios = User::get();
		$permissoes = Permissao::get();

		return view('usuarios.lista', ['usuarios' => $usuarios], ['permissoes' => $permissoes]);
	}

	public function novo(){
		$permissoes = Permissao::get();

		return view('usuarios.cadastro', ['permissoes' => $permissoes]);
	}

	protected function salvar(Request $request)
    {
    	\Session::flash('msg_sucesso','Cadastro realizado com sucesso!');

        $salvarUser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'idPermissao' => $request['idPermissao'],
            'password' => bcrypt($request['password']),
        ]);

        return Redirect::to('usuarios/cadastro');
    }

	public function deletar($id){
		$usuarios = User::find($id);
		// $usuarios = User::find($id);
		// $permissoes = Permissao::get();
		$usuarios->delete();
		\Session::flash('msg_sucesso','Usuario deletado com sucesso!');

		return Redirect::to('usuarios/lista');
	}

	public function editar($id){
		$usuarios = User::find($id);
		$permissoes = Permissao::get();
		$permissaoUsuario = Permissao::find($usuarios->idPermissao);

		return view('usuarios.cadastro', ['usuarios' => $usuarios], ['permissaoUsuario' => $permissaoUsuario]);
	}

	public function atualizando($id, Request $request){
		$usuarios = User::find($id);
		$usuarios->update($request->all());

		\Session::flash('msg_sucesso','Cadastro alterado com sucesso!');

	 	return Redirect::to('usuarios/cadastro/'.$usuarios->id.'/editar');
	}
}

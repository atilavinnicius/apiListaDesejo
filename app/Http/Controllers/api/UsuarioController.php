<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $novoUsuario = new Usuario();
        $novoUsuario->nome = $request->nome;
        $novoUsuario->email = $request->email;
        $novoUsuario->telefone = $request->telefone;
        if($novoUsuario->save()){
            $resposta = json_encode("Usuário salvo com sucesso");
        return $resposta;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Usuario::find($id)){
        $usuarioAtualizado = Usuario::find($id);
        if($request->nome != ""){
            $usuarioAtualizado->nome = $request->nome;
        }
        if( $request->email != ""){
            $usuarioAtualizado->email = $request->email;
        }
        if($request->telefone != ""){
            $usuarioAtualizado->telefone = $request->telefone;
        }
        if($usuarioAtualizado->update()){
            $resposta = json_encode("Usuário atualizado com sucesso");
        return $resposta;
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if($usuario != null){
        if( $usuario->delete()){
            $resposta = json_encode("Usuário: " . $usuario->nome . " deletado com sucesso");
        return $resposta;
        }
    }
        return $resposta = json_encode("Usuário: " . $usuario->nome . " não encontrado");
    }

}

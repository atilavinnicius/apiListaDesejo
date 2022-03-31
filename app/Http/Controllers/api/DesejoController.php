<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Desejo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DesejoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $desejos = Desejo::all();

            return $desejos;

    }

    public function filtrar(Request $request) {

        if( $request->filtro != "") {
                     $desejos = DB::table('desejos')
                     ->where('desejo', '=',  $request->filtro )
                     ->orWhere('dataPretendida', '=' , $request->filtro)
                     ->orWhere('usuario_id', '=', $request->filtro)
                     ->get();

                     return $desejos;
                }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novoDesejo = new Desejo();
        $novoDesejo->desejo = $request->nomeDesejo;
        $novoDesejo->descricao = $request->descricao;

        //Date

        //$dateUS = \DateTime::createFromFormat("d/m/Y", $request->dataPretendida)->format("m/d/Y");
        $novoDesejo->dataPretendida = $request->dataPretendida;
        if (Usuario::find($request->usuario_id)){

            $novoDesejo->usuario_id = $request->usuario_id;
            if($novoDesejo->save()){
                $resposta = json_encode("Desejo salvo com sucesso");
                return $resposta;
            }

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
        $desejo = Desejo::findOrFail($id);
        return $desejo;
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
        if (Desejo::find($id)){
        $desejoAtualizado = Desejo::find($id);
        if( $request->nomeDesejo != ""){
            $desejoAtualizado->desejo = $request->nomeDesejo;
        }
        if( $request->descricao != ""){
            $desejoAtualizado->descricao = $request->descricao;
        }
        if ( $request->dataPretendida != "" ){
            //$dateUS = \DateTime::createFromFormat("d/m/Y", $request->dataPretendida)->format("m/d/Y");
            $desejoAtualizado->dataPretendida =  $request->dataPretendida;
        }


        if($desejoAtualizado->update()){
            $resposta = json_encode("Desejo atualizado com sucesso");
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
        $desejo = Desejo::find($id);
        if($desejo != null){
            $resposta = json_encode("Usuário: " . $desejo->nome . " deletado com sucesso");
        return $resposta;
        }
    }
}

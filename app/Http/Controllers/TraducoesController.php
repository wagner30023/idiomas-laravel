<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traducoes;


class TraducoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Traducoes::all();
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
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
        try {
            $data = $request->all();

            if ($data) {
                return Traducoes::create($data);
            }

            return response()->json(['message' =>  'Erro ao tentar Registrar tradução'], 404);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($traducao)
    {
        try {
            $data = Traducoes::find($traducao);

            if($data){
                return response()->json(['message' => 'Resultado da busca', 'data' => $data]);
            }

            return response()->json(['message' => 'Não foram encontrados resultados para a busca']);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $traducao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $traducao)
    {
        try {
            $data = Traducoes::find($traducao);
            if($data){
                $data->update($request->all());
                return response()->json(['Tradução atualizada com sucesso', 'data' => $data], 201);
            }

            return response()->json([
                'message' => 'Erro ao tentar atualizar o registro'
            ],404);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $traducao
     * @return \Illuminate\Http\Response
     */
    public function destroy($traducao)
    {
        try {
            $data = Traducoes::destroy($traducao);
            if ($data) {
                return response()->json(['message' => 'Tradução excluída com sucesso.', 'data' => $data], 201);
            }

            return response()->json(['message' => 'Erro ao tentar deletar o registro.'], 404);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()]);
        }
    }
}

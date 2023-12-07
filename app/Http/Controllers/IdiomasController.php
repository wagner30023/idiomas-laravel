<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idiomas;
use Symfony\Polyfill\Intl\Idn\Idn;

class IdiomasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Idiomas::all();
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
            return Idiomas::create($data);
        } catch(\Exception $e) {
            return response()->json(['Error' => $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idiomas)
    {
        try {
            $idiomas = Idiomas::find($idiomas);
            // $idiomas = Idiomas::with('idiomas')->find($idiomas);

            if($idiomas){
                $response = [
                    'idiomas' => $idiomas
                ];
                return $response;
            }

            return response()->json([
                'message' => 'Erro ao pesquisar o idioma'
            ],404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idiomas)
    {
        try {
            $data = Idiomas::findOrFail($idiomas);
            $data->update($request->all());
            return response()->json(['Idioma atualizado com sucesso', 'data' => $data],201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idiomas)
    {
        try {
            $data = Idiomas::destroy($idiomas);

            if($data){
                return response()->json(['Idioma excluído com sucesso', 'data' => $data], 201);
            }

            return response()->json(['Error' => 'Não foi possível excluir o idioma'], 404);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

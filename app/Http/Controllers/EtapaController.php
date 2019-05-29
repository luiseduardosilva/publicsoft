<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etapa;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapa        = Etapa::all();
        return response()->json($etapa, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nome'      => 'required|string|min:4|max:30|unique:etapas',
        ]);

        $etapa        = New Etapa();
        $etapa->nome  = strtoupper($request->nome);

        if($etapa->save()){
            return response()->json([
                'mes'   => 'Etapa criada com sucesso',
                'dados' => $etapa,
            ],201);
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
        $etapa        = Etapa::find($id);
        if(isset($etapa) && !empty($etapa->id)){
            return response()->json($etapa, 200);
        }
        return response()->joson([
            'mes'       => 'ID não Econtrado!', 
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'nome'          => 'required|string|min:4|max:30|unique:etapas',
        ]);

        $etapa = Etapa::find($id);
        if(isset($etapa) && !empty($etapa->id)){
            $etapa->nome  = strtoupper($request->nome);
           
            if($etapa->save())
                return response()->json([
                    'mes'   => 'Etapa Atualizada!',
                    'dados' =>  $etapa
                ], 200);
        }   
        
        return response()->json([
            'mes'       => 'ID não Econtrado!', 
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etapa = Etapa::find($id);
        if(isset($etapa) && !empty($etapa->id)){
            if($etapa->delete())
            return response()->json([
                'mes'   => 'Etapa Deletada!',
                $etapa, 
            ], 200);
        }
        return response()->json([
            'mes'       => 'ID não Econtrado!', 
        ],200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campo;
class CampoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campo = Campo::all();
        return response()->json($campo, 200);
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
            'nome'      =>  'required|min:2|max:100|unique:campos',
            'tipo'      =>  'required|min:2|max:30',
            'etapa_id'  =>  'required',
        ]);

        $campo          = New Campo();
        $campo->nome    = strtoupper($request->nome);
        $campo->tipo    = $request->tipo;
        $campo->etapa_id= $request->etapa_id;
        
        if($campo->save()){
            return response()->json([
                'mes'   => 'Campo Criado com Sucesso',
                'dados' => $campo,
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
        $campo          = Campo::find($id);
        if(isset($campo->id) && !empty($campo->id)){
            return response()->json($campo, 200);
        }
        return response()->json([
            'mes'         => 'ID não Econtrado!',
        ], 200);
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
            'nome'      =>  'required|min:2|max:100|unique:campos',
            'tipo'      =>  'required|min:2|max:30',
            'etapa_id'  =>  'required',
        ]);

        $campo = Campo::find($id);
        if(isset($campo) && !empty($campo->id)){
            $campo->nome    = strtoupper($request->nome);
            $campo->tipo    = $request->tipo;
            $campo->etapa_id= $request->etapa_id;
           
            if($campo->save())
                return response()->json([
                    'mes'   => 'Campo Atualizado!',
                    'dados' =>  $campo
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
        $campo = Campo::find($id);
        if(isset($campo) && !empty($campo->id)){
            if($campo->delete())
            return response()->json([
                'mes'   => 'Campo Deletada!',
                $campo, 
            ], 200);
        }
        return response()->json([
            'mes'       => 'ID não Econtrado!', 
        ],200);
    }
}

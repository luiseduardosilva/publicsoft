<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ValorCampo;
class ValorCampoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vl_campo               = ValorCampo::with(['etapa', 'cliente', 'campo'])->get();
        return response()->json($vl_campo, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'cliente_id'        => 'required',
            'campo_id'          => 'required',
            'etapa_id'          => 'required',
            'valor'             => 'required',
        ]);

        $vl_campo               = New ValorCampo();
        $vl_campo->cliente_id   = $request->cliente_id;
        $vl_campo->campo_id     = $request->campo_id;
        $vl_campo->etapa_id     = $request->etapa_id;
        $vl_campo->valor        = $request->valor;

        if($vl_campo->save()){
            return response()->json([
                'mes'           => 'Criado com Sucesso',
                'dados'         => $vl_campo,
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
        $vl_campo               = ValorCampo::find($id);
        if(isset($vl_campo) && !empty($vl_campo->id)){
            return response()->json($vl_campo, 200);
        }
        return response()->joson([
            'mes'               => 'ID não Econtrado!', 
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
            'valor'             => 'required',
        ]);

        $vl_campo               = ValorCampo::find($id);
        if(isset($vl_campo) && !empty($vl_campo->id)){
            $vl_campo->valor  = $request->valor;
           
            if($vl_campo->update())
                return response()->json([
                    'mes'       => 'Atualizado!',
                    'dados'     =>  $vl_campo
                ], 200);
        }   
        
        return response()->json([
            'mes'               => 'ID não Econtrado!', 
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
        $vl_campo = ValorCampo::find($id);
        if(isset($vl_campo) && !empty($vl_campo->id)){
            if($vl_campo->delete())
            return response()->json([
                'mes'   => 'Campo Deletado!',
                $vl_campo, 
            ], 200);
        }
        return response()->json([
            'mes'       => 'ID não Econtrado!', 
        ],200);
    }
}
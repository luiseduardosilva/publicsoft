<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cliente        = Cliente::all();
        $cliente        = Cliente::with('valorcampos')->get();
        return response()->json($cliente, 200);

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
            'nome'      => 'required|string|min:4|max:100',
            'cnpj'      => 'required|unique:clientes|min:14|max:18',
        ]);

        $cliente        = New Cliente();
        $cliente->nome  = strtoupper($request->nome);
        $cliente->cnpj  = $request->cnpj;

        if($cliente->save()){
            return response()->json([
                'mes'   => 'Cliente Criado com Sucesso',
                'dados' => $cliente,
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
        $cliente        = Cliente::find($id);
        if(isset($cliente) && !empty($cliente->id)){
            return response()->json($cliente, 200);
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
            'nome'          => 'required|string|min:4|max:100',
            'cnpj'          => 'required|unique:clientes|min:14|max:18',
        ]);

        $cliente = Cliente::find($id);
        if(isset($cliente) && !empty($cliente->id)){
            $cliente->nome  = strtoupper($request->nome);
            $cliente->cnpj  = $request->cnpj;
           
            if($cliente->update())
                return response()->json([
                    'mes'   => 'Cliente Atualizado!',
                    'dados' =>  $cliente
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
        $cliente = Cliente::find($id);
        if(isset($cliente) && !empty($cliente->id)){
            if($cliente->delete())
            return response()->json([
                'mes'   => 'Cliente Deletado!',
                $cliente, 
            ], 200);
        }
        return response()->json([
            'mes'       => 'ID não Econtrado!', 
        ],200);
    }
}

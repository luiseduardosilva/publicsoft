<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        
        // Inputs formulario
        $tipos = [
            ['id' => 1, 'tipo' => 'Número'  , 'input' => 'number'  ],
            ['id' => 2, 'tipo' => 'Data'    , 'input' => 'date'    ],
            ['id' => 3, 'tipo' => 'Texto'   , 'input' => 'text'    ],
            ['id' => 4, 'tipo' => 'Telefone', 'input' => 'tel'     ],
            ['id' => 5, 'tipo' => 'Hora'    , 'input' => 'time'    ],
            ['id' => 6, 'tipo' => 'E-mail'  , 'input' => 'email'   ],

        ];
        return response()->json($tipos, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

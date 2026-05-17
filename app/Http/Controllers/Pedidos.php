<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class Pedidos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedido = Pedido::all();

        return response()->json($pedido,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'ean' => 'required|string|max:255|unique:produtos',
            'user_id' => 'required|string|max:255',
            'data_pedido' => 'required|string',
            'status' => 'required|string',
        ]);

        $pedido = Pedido::create($request->all());

        return response()->json($pedido, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido){
            return response()-> json(['message' => 'Produto not found'], 404);
        }

        return response() -> json($pedido,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido){
            return response()-> json(['message' =>'Produto not found'], 404);
        }
        $pedido->update($request->all());

        return response()->json($pedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Produto not found'], 404);
        }

        $pedido->delete();
        return response()->json(['message' => 'Produto deleted successfully'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ItensPedido;
use Illuminate\Http\Request;

class ItemPedido extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemPedido = ItensPedido::all();

        return response()->json($itemPedido,200);
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
        $request->validate([
            'ean' => 'required|string|max:255|unique:produtos',
            'pedido_id' => 'required|numeric',
            'produto_id' => 'required|numeric',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
        ]);

        $itemPedido = ItensPedido::create($request->all());

        return response()->json($itemPedido, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $itemPedido = ItensPedido::find($id);
        if (!$itemPedido) {
            return response()->json(['message' => 'Produto not found'], 404);
        } 

        return response()->json($itemPedido, 200);
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
        $itemPedido = ItensPedido::find($id);
        if (!$itemPedido) {
            return response()->json(['message' => 'Produto not found'], 404);
        }

        $itemPedido->update($request->all());

        return response()->json($itemPedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemPedido = ItensPedido::find($id);
        if (!$itemPedido) {
            return response()->json(['message' => 'Produto not found'], 404);
        }

        $itemPedido->delete();
        return response()->json(['message' => 'Produto deleted successfully'], 200);
    }
}

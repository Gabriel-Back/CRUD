<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        "nome" => "required|string|max:150",
        "data_nascimento" => "required|date",
        "cep" => "required|string|max:8",
        "endereco" => "required|string|max:150",
        "numero" => "required|string|max:10",
        "bairro" => "required|string|max:100",
        "cidade" => "required|string|max:100",
        "uf" => "required|string|max:2",
    ]);

    $cliente = Cliente::create($request->all());
    return redirect()->route("clientes.index")->with("success","Cliente criado com sucesso!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

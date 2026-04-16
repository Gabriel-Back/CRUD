<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index() {
        
    $clientes = Cliente::all();
    return view('clientes.index', compact('clientes'));
    
    }

    public function create()
    {
        return view('clientes.create');
    }

   
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

    public function show(string $id)
    {

    $cliente = Cliente::findOrFail($id);
    return view("clientes.show", compact("cliente")); 
    }

    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact("cliente"));
    }

    public function update(Request $request, string $id)
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

        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.edit', $cliente->id)->with("success",'Cliente atualizado!');
    }

    public function destroy(string $id)
    {

        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success','Cliente deletado com sucesso!');

    }
}

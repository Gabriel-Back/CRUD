<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CepController extends Controller
{
    
    public function buscarCep($cep)
    {

        $cep = str_replace('-', '', $cep);
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        
        $response = file_get_contents($url);

        if ($response === false) {
            return response()->json(['error' => 'Erro ao buscar o CEP.'], 500);
        } else {
            $data = json_decode($response, true);
            if (isset($data['erro']) && $data['erro'] === true) {
                return response()->json(['error' => 'CEP não encontrado.'], 404);
            }
        }

        return response()->json($data);

    }   

}

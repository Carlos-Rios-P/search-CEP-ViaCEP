<?php

namespace App\Http\Controllers;


class ViaCEPController extends Controller
{
    //
    public function consultarCEP($ceps = null)
    {
        if($ceps == null)
        {
            return response()->json(['erro' => 'Informe um CEP'], 500);
        }

        try {
            $ceps = explode(',', $ceps);

            foreach($ceps as $cep){

                $url = "https://viacep.com.br/ws/{$cep}/json/";

                $adress[] = json_decode(file_get_contents($url), true);
            }

            return response()->json(['sucess' => $adress], 200);

        } catch(\Throwable $th){
            return response()->json(['erro' => 'Informe um CEP válido'], 400);
        }
    }
}

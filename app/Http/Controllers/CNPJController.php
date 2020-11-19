<?php

namespace App\Http\Controllers;

use App\CNPJ;
use Illuminate\Http\Request;

class CNPJController extends Controller
{
    public function getCNPJ(Request $request)
    {
        //Vai no site da Receita para bater os dados
        $receita = CNPJ::getCNPJ($request->cnpj);
        return $receita;
    }
}
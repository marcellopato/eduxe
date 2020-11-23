<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CEPController extends Controller
{
    public function index(Request $request)
    {
        $c = str_replace('-', '', $request->c);
        $ch = curl_init();
        $cep = 'https://viacep.com.br/ws/' . $c . '/json';
        curl_setopt($ch, CURLOPT_URL, $cep);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        return $result;
    }
}

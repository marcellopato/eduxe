<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class CNPJ extends Model
{
    static function getCNPJ($cnpj)
    {
        $cnpj = str_replace('-', '', str_replace('/', '', (str_replace('.', '', $cnpj))));
        $client = new Client();
        $response = $client->request('GET', 'https://www.receitaws.com.br/v1/cnpj/' . $cnpj);
        $dadosReceita = $response->getBody()->getContents();
        $receita = json_decode($dadosReceita, true);
        return $receita;
    }
}

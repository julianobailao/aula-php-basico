<?php

namespace Bailao\BuscadorCep;

use GuzzleHttp\Client;
use Bailao\BuscadorCep\Exceptions\ErroAoContactarViaCepException;

class CepPeloEndereco
{
  protected $cep;

  public function __construct($cep)
  {
    $this->cep = $cep;
  }

  public function buscarEndereco()
  {
    $client = new Client();
    $url = sprintf('https://viacep.com.br/ws/%s/json/', $this->cep);
    $response = $client->request('GET', $url);

    if ($response->getStatusCode() != 200) {
      throw new ErroAoContactarViaCepException('Erro ao contactar serviço de busca de cep.');
    }

    return json_decode($response->getBody());
  }
}

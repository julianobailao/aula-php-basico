<?php

require 'vendor/autoload.php';

$buscador = new Bailao\BuscadorCep\CepPeloEndereco('87060140');
$endereco = $buscador->buscarEndereco();

print_r($endereco);

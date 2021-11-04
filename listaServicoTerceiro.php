<?php

require 'vendor/autoload.php';
include __DIR__.'./includes/sessionStart.php';
use Classes\Entity\ServicoTerceiro;
if (!isset($_GET['pagina'])){
    header('location:?pagina=1');
}
//busca
$busca = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_STRING);

//condições sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'. str_replace('', '%', $busca).'%"': null
    
];


$where = implode(' AND ', $condicoes);



$objServicoTerceiro= ServicoTerceiro::getServicoTerceiros();




include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioListaServicoTerceiro.php';
include __DIR__.'/includes/footer.php';
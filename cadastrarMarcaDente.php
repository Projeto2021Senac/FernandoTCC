<?php

include __DIR__ . './vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

define('TITLE', 'Cadastrar Marca de Dente');
define('BTN', 'cadastrarMarcaDente');

use Classes\Entity\MarcaDente;

$marca = new MarcaDente;

if (isset($_POST[BTN])) {

    $marca->nomeMarca = $_POST['nomeMarca'];
    $marca->descricao = $_POST['descricao'];

    $marca->cadastrarMarcaDente();

    if ($marca->idMarcaDente > 0) {
        header('location: listaMarcaDente.php?pagina=1&status=success1&id=' . $marca->idMarcaDente);
    } else {
        header('location: listaMarcaDente.php?pagina=1&status=error1');
    }
}

include __DIR__ . './includes/header.php';
include __DIR__ . './includes/formularioMarcaDente.php';
include __DIR__ . './includes/footer.php';

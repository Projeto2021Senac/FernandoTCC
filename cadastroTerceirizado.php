<?php

require __DIR__ . '/vendor/autoload.php';
include __DIR__ . './includes/sessionStart.php';

use \Classes\Entity\terceirizado;
use \Classes\Entity\terceiro;
use \Classes\Entity\ServicoTerceiro;


define('BTN', 'cadastrarTerceirizado');
define('TITLE', 'Cadastrar Terceirizado');
define('IDENTIFICACAO', '0');
$terceirizado = new terceirizado;

$objTerceiro = terceiro::getTerceiros();
$selectTerceiro = '';

foreach ($objTerceiro as $terceiro) {
    $selectTerceiro .= '<option  value ="' .  $terceiro->idTerceiro . '">' . $terceiro->nomeTerceiro . '</option>';
}

$selectServico = '';
$objServicoTerceiro = ServicoTerceiro::getServicoTerceiros();
foreach ($objServicoTerceiro as $servico) {
    $selectServico .= '<option  value ="' .  $servico->idServico . '">' . $servico->nomeServico . '</option>';
}

if (isset($_POST[BTN])) {
    /*echo '<pre>';print_r($_POST);echo'<pre>';exit; */
    $terceirizado->fkTerceiro = $_POST['Terceiro'];
    $terceirizado->fkServicoTerceiro = $_POST['ServicoTerceiro'];
    $terceirizado->statusTerceirizado = $_POST['status'];


    if (gettype($terceirizado->cadastroTerceirizado()[0]) == 'object') {
        header('Location: listaterceirizado.php?pagina=1&status=success1&id=' . $terceirizado->fkTerceiro);
    } else {
        header('Location: listaterceirizado.php?pagina=1&status=error1');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioterceirizado.php';
include __DIR__ . '/includes/footer.php';

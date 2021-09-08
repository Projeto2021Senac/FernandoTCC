<?php

require 'vendor/autoload.php';

define('TITLE', 'Cadastrar Clinica');
define('BTN', 'cadastrarClinica');

use Classes\Entity\clinica;

$clinica = new clinica();

if (isset($_POST['cadastrarClinica'])) {

    if (!empty($_POST['nomeClinica'])) {
        
        
        $clinica->nomeClinica = trim($_POST['nomeClinica']);
        $clinica->statusClinica = $_POST['status'];
        
        unset($_POST['cadastrarClinica']);
        
        $clinica->cadastrarClinica();
        
        header ('Location: listaClinica.php?status=success');

        //echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"3;
        //URL='cadastroClinica.php'\">";
    }
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formularioClinica.php';
include __DIR__.'/includes/footer.php';
 
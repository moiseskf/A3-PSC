<?php

switch($_REQUEST["op"])
{
    case "Incluir": incluir();
        break;
    case "Excluir": excluir();
        break;
    case "Listar": listar();
        break;
    case "Alterar": alterar();
        break;
}

function incluir()
{


    $nomeCredor = $_REQUEST["nomeCredor"];
    $idUsuario = $_REQUEST["idUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelCredor = $_REQUEST["responsavelCredor"];
    $telefoneCredor = $_REQUEST["telefoneCredor"];
    $celularCredor = $_REQUEST["celularCredor"];
    $ativo = $_REQUEST["ativo"];

    include_once 'CredorController.php';
    $credor = new CredorController();
    $credor->cadastraCredor($nomeCredor,$idUsuario,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);
}




function excluir()
{
    $id = $_REQUEST["idCredor"];
    include_once 'CredorController.php';
    $contr = new credorController();
    $contr->excluirCredor($id);
}

function listar()
{
include '../view/formListarBase.php';
}


function alterar()
{



    $idCredor = $_REQUEST["idCredor"];
    $nomeCredor = $_REQUEST["nomeCredor"];
    $idUsuario = $_REQUEST["idUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelCredor = $_REQUEST["responsavelCredor"];
    $telefoneCredor = $_REQUEST["telefoneCredor"];
    $celularCredor = $_REQUEST["celularCredor"];
    $ativo = $_REQUEST["ativo"];

    include_once 'CredorController.php';
    $credor = new CredorController();
    $credor->alterarCredor($idCredor,$nomeCredor,$idUsuario,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);
}

?>

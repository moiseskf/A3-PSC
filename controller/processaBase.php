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


    $nomeBase = $_REQUEST["nomeBase"];
    $idUsuario = $_REQUEST["idUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelBase = $_REQUEST["responsavelBase"];
    $telefoneBase = $_REQUEST["telefoneBase"];
    $celularBase = $_REQUEST["celularBase"];
    $emailBase = $_REQUEST["emailBase"];
    $ativo = $_REQUEST["ativo"];

    include_once 'BaseController.php';
    $base = new BaseController();
    $base->cadastraBase($nomeBase,$idUsuario,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);
}




function excluir()
{
    $id = $_REQUEST["idBase"];
    include_once 'BaseController.php';
    $contr = new BaseController();
    $contr->excluirBase($id);
}

function listar()
{
include '../view/formListarBase.php';
}


function alterar()
{
    $nomeBase = $_REQUEST["nomeBase"];
    $idUsuario = $_REQUEST["idUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $responsavelBase = $_REQUEST["responsavelBase"];
    $telefoneBase = $_REQUEST["telefoneBase"];
    $celularBase = $_REQUEST["celularBase"];
    $emailBase = $_REQUEST["emailBase"];
    $ativo = $_REQUEST["ativo"];
    $idBase = $_REQUEST["idBase"];

    include_once 'BaseController.php';
    $base = new BaseController();
    $base->alterarBase($idBase,$nomeBase,$idUsuario,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);
}

?>

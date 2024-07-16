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

    $idUsuario = $_REQUEST["idUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $nomeDaspesa = $_REQUEST["nomeDespesa"];
    $idCredor = $_REQUEST["idCredor"];
    $ativo = $_REQUEST["ativo"];

    include_once 'DespesaController.php';
    $despesa = new DespesaController();
    $despesa->cadastraDespesa($idUsuario,$dataCadastro,$nomeDaspesa,$idCredor,$ativo);
}




function excluir()
{
    $id = $_REQUEST["idDespesa"];
    include_once 'despesaController.php';
    $contr = new despesaController();
    $contr->excluirDespesa($id);
}

function listar()
{
include '../view/formListarBase.php';
}


function alterar()
{

    $idDespesa = $_REQUEST["idDespesa"];
    $idUsuario = $_REQUEST["idUsuario"];
    $dataCadastro = $_REQUEST["dataCadastro"];
    $nomeDaspesa = $_REQUEST["nomeDespesa"];
    $idCredor = $_REQUEST["idCredor"];
    $ativo = $_REQUEST["ativo"];




    include_once 'DespesaController.php';
    $credor = new DespesaController();
    $credor->alterarDespesa($idDespesa,$idUsuario,$dataCadastro,$nomeDaspesa,$idCredor,$ativo);
}

?>

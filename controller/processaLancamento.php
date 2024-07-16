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


   // $idLancamento = $_REQUEST["idLancamento"];
    $idBase =$_REQUEST["idBase"];
    $idUsuario = $_REQUEST["idUsuario"];
    $idDespesa= $_REQUEST["idDespesa"];
    $competenciaDespesa= $_REQUEST["competenciaDespesa"];
    $dataVencimento= $_REQUEST["dataVencimento"];
    $valorLiquido= $_REQUEST["valorLiquido"];
    $valorMulta= $_REQUEST["valorMulta"];
    $valorCorrecao= $_REQUEST["valorCorrecao"];
    $ativo = $_REQUEST["ativo"];
    $observacao = $_REQUEST["observacao"];
    $dataCadastro = $_REQUEST["dataCadastro"]; 

    include_once 'lancamentoController.php';
    $despesa = new LancamentoController();
    $despesa->cadastraLancamento($idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento
    ,$valorLiquido,$valorMulta,$valorCorrecao, $ativo, $observacao ,$dataCadastro );
}




function excluir()
{
    $id = $_REQUEST["idLancamento"];
    include_once 'lancamentoController.php';
    $contr = new lancamentoController();
    $contr->excluirLancamento($id);
}

function listar()
{
include '../view/formListarBase.php';
}


function alterar()
{

   $idLancamento = $_REQUEST["idLancamento"];
   $idBase =$_REQUEST["idBase"];
   $idUsuario = $_REQUEST["idUsuario"];
   $idDespesa= $_REQUEST["idDespesa"];
   $competenciaDespesa= $_REQUEST["competenciaDespesa"];
   $dataVencimento= $_REQUEST["dataVencimento"];
   $valorLiquido= $_REQUEST["valorLiquido"];
   $valorMulta= $_REQUEST["valorMulta"];
   $valorCorrecao= $_REQUEST["valorCorrecao"];
   $ativo = $_REQUEST["ativo"];
   $observacao = $_REQUEST["observacao"];
   $dataCadastro = $_REQUEST["dataCadastro"]; 




    include_once 'lancamentoController.php';
    $lancamento = new lancamentoController();
    $lancamento->alterarlancamento($idLancamento,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento
    ,$valorLiquido,$valorMulta,$valorCorrecao, $ativo, $observacao ,$dataCadastro );
}

?>

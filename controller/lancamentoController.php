<?php

class LancamentoController{
 

    public function cadastraLancamento($idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento
    ,$valorLiquido,$valorMulta,$valorCorrecao, $ativo, $observacao ,$dataCadastro )
    {
        include_once '../model/lancamentoModel.php';
        $lancamento = new lancamentoModel(null,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento
        ,$valorLiquido,$valorMulta,$valorCorrecao, $ativo, $observacao ,$dataCadastro );
        $lancamento->cadastraLancamento($lancamento);
    }


    //================================================================================================
    public static function listarLancamento()
    {
        include '../model/lancamentoModel.php';
        $model = new lancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null);
        return $model->listarLancamento();
    }
    public static function listarLancamentoPbase($nome,$despesa,$credor,$dataIni,$dataFin)
    {
        include '../model/lancamentoModel.php';
        $model = new lancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null);
        return $model->listarLancamentoPbase($nome,$despesa,$credor,$dataIni,$dataFin);
    }


    public static function excluirLancamento($id)
    {
        include '../model/lancamentoModel.php';
        $model = new lancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null);
        $model->excluirLancamento($id);
    }

    public static function resgataPorID($id)
    {
        include_once "../model/lancamentoModel.php";
        $model = new lancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null);
        return $model->resgataPorID($id);
    }
   
    public function alterarLancamento($idLancamento,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento
    ,$valorLiquido,$valorMulta,$valorCorrecao, $ativo, $observacao ,$dataCadastro )
    {
        include_once "../model/lancamentoModel.php";
        $model = new lancamentoModel($idLancamento,$idBase,$idUsuario,$idDespesa,$competenciaDespesa,$dataVencimento
        ,$valorLiquido,$valorMulta,$valorCorrecao, $ativo, $observacao ,$dataCadastro);
        return $model->alterarLancamento($model);
    }
}







?>
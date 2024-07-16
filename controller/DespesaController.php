<?php

class DespesaController{
 

    public function cadastraDespesa($idUsuario,$dataCadastro,$nomeDaspesa,$idCredor,$ativo)
    {
        include_once '../model/despesaModel.php';
        $despesa = new despesaModel(null,$idUsuario,$dataCadastro,$nomeDaspesa,$idCredor,$ativo);
        $despesa->cadastraDespesa($despesa);
    }


    //================================================================================================
    public static function listarDespesa()
    {
        include '../model/despesaModel.php';
        $model = new despesaModel(null,null,null,null,null,null);
        return $model->listarDespesa();
    }
    public static function listarDespesaAtivas()
    {
        include '../model/despesaModel.php';
        $model = new despesaModel(null,null,null,null,null,null);
        return $model->listarDespesaAtivas();
    }

    public static function excluirDespesa($id)
    {
        include '../model/despesaModel.php';
        $model = new despesaModel(null,null,null,null,null,null);
        $model->excluirDespesa($id);
    }

    public static function resgataPorID($id)
    {
        include_once "../model/despesaModel.php";
        $model = new despesaModel(null,null,null,null,null,null);
        return $model->resgataPorID($id);
    }
   
    public function alterarDespesa($idDespesa,$idUsuario,$dataCadastro,$nomeDaspesa,$idCredor,$ativo)

    {
        include_once "../model/despesaModel.php";
        $model = new despesaModel($idDespesa,$idUsuario,$dataCadastro,$nomeDaspesa,$idCredor,$ativo);
        return $model->alterarDespesa($model);
    }
}







?>
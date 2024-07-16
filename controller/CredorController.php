<?php

class CredorController{
 

    public function cadastraCredor($nomeCredor,$idUsuario,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo)
    {
        include_once '../model/credorModel.php';
        $credor = new credorModel(null,$nomeCredor,$idUsuario,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);
        $credor->cadastraCredor($credor);
    }


    //================================================================================================
    public static function listarCredor()
    {
        include '../model/credorModel.php';
        $model = new credorModel(null,null,null,null,null,null,null,null,null);
        return $model->listarCredor();
    }   
     public static function listarCredorAtivos()
    {
        include '../model/credorModel.php';
        $model = new credorModel(null,null,null,null,null,null,null,null,null);
        return $model->listarCredorAtivos();
    }


    public static function excluirCredor($id)
    {
        include '../model/CredorModel.php';
        $model = new credorModel(null,null,null,null,null,null,null,null,null);
        $model->excluirCredor($id);
    }

    public static function resgataPorID($id)
    {
        include_once "../model/credorModel.php";
        $model = new credorModel(null,null,null,null,null,null,null,null);
        return $model->resgataPorID($id);
    }
   
    public function alterarCredor($idCredor,$nomeCredor,$idUsuario,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo)

    {
        include_once "../model/credorModel.php";
        $model = new credorModel($idCredor,$nomeCredor,$idUsuario,$dataCadastro,$responsavelCredor,$telefoneCredor,$celularCredor,$ativo);
        return $model->alterarCredor($model);
    }
}







?>
<?php

class BaseController{
 

    public function cadastraBase($nomeBase,$idUsuario,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo)
    {
        include_once '../model/baseModel.php';
        $base = new baseModel(null,$nomeBase,$idUsuario,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);
        $base->cadastraBase($base);
    }


    //================================================================================================
    public static function listarBase()
    {
        include '../model/baseModel.php';
        $model = new baseModel(null,null,null,null,null,null,null,null,null);
        return $model->listarBase();
    }

    public static function listarBaseAtivas()
    {
        include '../model/baseModel.php';
        $model = new baseModel(null,null,null,null,null,null,null,null,null);
        return $model->listarBaseAtivas();
    }


    public static function excluirBase($id)
    {
        include '../model/baseModel.php';
        $model = new baseModel(null,null,null,null,null,null,null,null,null);
        $model->excluirBase($id);
    }

    public static function resgataPorID($id)
    {
        include_once "../model/baseModel.php";
        $model = new baseModel(null,null,null,null,null,null,null,null,null);
        return $model->resgataPorID($id);
    }
   
    public function alterarBase($idBase,$nomeBase,$idUsuario,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo)

    {
        include_once "../model/baseModel.php";
        $model = new baseModel($idBase,$nomeBase,$idUsuario,$dataCadastro,$responsavelBase,$telefoneBase,$celularBase,$emailBase,$ativo);
        return $model->alterarBase($model);
    }
}







?>
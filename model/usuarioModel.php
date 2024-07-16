<?php

class usuarioModel{
    protected $idUsuario;
    protected $idPerfil;
    protected $nomeUsuario;
    protected $emailUsuario;
    protected $loginUsuario;
    protected $senhaUsuario;
    protected $dataCadastro;
    protected $telefoneCelular;
    protected $ativo;
    public function __construct($idUsuario, $idPerfil, $nomeUsuario, $emailUsuario, $loginUsuario, $senhaUsuario, $dataCadastro, $telefoneCelular, $ativo) {
        $this->idUsuario = $idUsuario;
        $this->idPerfil = $idPerfil;
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->loginUsuario = $loginUsuario;
        $this->senhaUsuario = $senhaUsuario;
        $this->dataCadastro = $dataCadastro;
        $this->telefoneCelular = $telefoneCelular;
        $this->ativo = $ativo;
    }

   
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function getLoginUsuario() {
        return $this->loginUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getTelefoneCelular() {
        return $this->telefoneCelular;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    // Setters
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function setLoginUsuario($loginUsuario) {
        $this->loginUsuario = $loginUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setTelefoneCelular($telefoneCelular) {
        $this->telefoneCelular = $telefoneCelular;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function cadastraAuto(AutoModel $auto)
    {
        include_once '../dao/AutoDao.php';
        $auto= new AutoDao();
        $auto->cadastraAuto($this);
    }


    public function listarAuto()
    {
          include '../dao/AutoDAO.php';
          $dao = new AutoDao(null);
          return $dao->listarAuto();
    }
  

    public function excluirAuto($id)
    {
          include '../dao/AutoDAO.php';
          $dao = new AutoDao();
          $dao->excluirAuto($id);
    }


    public function resgataPorID($id)
    {
        include_once "../dao/usuarioDao.php";
        $dao = new usuarioDao(null);
        return $dao->resgataPorID($id);
    }
    
    public function alterarAuto($model)
    {
     include_once "../dao/AutoDao.php";
     $dao = new AutoDao();
     return $dao->alterarAuto($this);
    }
}

?>
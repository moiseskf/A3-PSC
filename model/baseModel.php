<?php 

class baseModel{
    protected $id;
    protected $nomeBase;
    protected $idUsuario;
    protected $dataCadastro;
    protected $responsavelBase;
    protected $telefoneBase;
    protected $celularBase;
    protected $emailBase;
    protected $ativo;



public function getId() {
    return $this->id;
}

public function getNomeBase() {
    return $this->nomeBase;
}

public function getIdUsuario() {
    return $this->idUsuario;
}

public function getDataCadastro() {
    return $this->dataCadastro;
}

public function getResponsavelBase() {
    return $this->responsavelBase;
}

public function getTelefoneBase() {
    return $this->telefoneBase;
}

public function getCelularBase() {
    return $this->celularBase;
}

public function getEmailBase() {
    return $this->emailBase;
}

public function getAtivo() {
    return $this->ativo;
}

// Setters
public function setId($id) {
    $this->id = $id;
}

public function setNomeBase($nomeBase) {
    $this->nomeBase = $nomeBase;
}

public function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
}

public function setDataCadastro($dataCadastro) {
    $this->dataCadastro = $dataCadastro;
}

public function setResponsavelBase($responsavelBase) {
    $this->responsavelBase = $responsavelBase;
}

public function setTelefoneBase($telefoneBase) {
    $this->telefoneBase = $telefoneBase;
}

public function setCelularBase($celularBase) {
    $this->celularBase = $celularBase;
}

public function setEmailBase($emailBase) {
    $this->emailBase = $emailBase;
}

public function setAtivo($ativo) {
    $this->ativo = $ativo;
}

public function __construct($id, $nomeBase, $idUsuario, $dataCadastro, $responsavelBase, $telefoneBase, $celularBase, $emailBase, $ativo)
{
    $this->id = $id;
    $this->nomeBase = $nomeBase;
    $this->idUsuario = $idUsuario;
    $this->dataCadastro = $dataCadastro;
    $this->responsavelBase = $responsavelBase;
    $this->telefoneBase = $telefoneBase;
    $this->celularBase = $celularBase;
    $this->emailBase = $emailBase;
    $this->ativo = $ativo;
}







    public function cadastraBase(baseModel $base)
    {
        include_once '../dao/baseDao.php';
        $base= new baseDao();
        $base->cadastraBase($this);
    }


    public function listarBase()
    {
          include '../dao/baseDAO.php';
          $dao = new baseDao(null);
          return $dao->listarBase();
    }
    public function listarBaseAtivas()
    {
          include '../dao/baseDAO.php';
          $dao = new baseDao(null);
          return $dao->listarBaseAtivas();
    }
  

    public function excluirBase($id)
    {
          include '../dao/baseDAO.php';
          $dao = new baseDao();
          $dao->excluirBase($id);
    }


    public function resgataPorID($idBase)
    {
        include_once "../dao/baseDao.php";
        $dao = new baseDao(null);
        return $dao->resgataPorID($idBase);
    }
    
    public function alterarBase($model)
    {
     include_once "../dao/baseDao.php";
     $dao = new baseDao();
     return $dao->alterarBase($this);
    }
}

?>



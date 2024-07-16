<?php 

class credorModel{
    protected $id;
    protected $nomeCredor;
    protected $idUsuario;
    protected $dataCadastro;
    protected $responsavelCredor;
    protected $telefoneCredor;
    protected $celularCredor;
    protected $ativo;



    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getNomeCredor() {
        return $this->nomeCredor;
    }
    
    public function setNomeCredor($nomeCredor) {
        $this->nomeCredor = $nomeCredor;
    }
     
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

 
    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

   
    public function getResponsavelCredor() {
        return $this->responsavelCredor;
    }
    
    public function setResponsavelCredor($responsavelCredor) {
        $this->responsavelCredor = $responsavelCredor;
    }

   
    public function getTelefoneCredor() {
        return $this->telefoneCredor;
    }
    
    public function setTelefoneCredor($telefoneCredor) {
        $this->telefoneCredor = $telefoneCredor;
    }

    public function getCelularCredor() {
        return $this->celularCredor;
    }
    
    public function setCelularCredor($celularCredor) {
        $this->celularCredor = $celularCredor;
    }

   
    public function getAtivo() {
        return $this->ativo;
    }
    
    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }


    public function __construct($id, $nomeCredor, $idUsuario, $dataCadastro, $responsavelCredor, $telefoneCredor, $celularCredor, $ativo) {
        $this->id = $id;
        $this->nomeCredor = $nomeCredor;
        $this->idUsuario = $idUsuario;
        $this->dataCadastro = $dataCadastro;
        $this->responsavelCredor = $responsavelCredor;
        $this->telefoneCredor = $telefoneCredor;
        $this->celularCredor = $celularCredor;
        $this->ativo = $ativo;
    }






    public function cadastraCredor(credorModel $credor)
    {
        include_once '../dao/credorDao.php';
        $credor= new credorDao();
        $credor->cadastraCredor($this);
    }


    public function listarCredor()
    {
          include '../dao/credorDAO.php';
          $dao = new credorDao(null);
          return $dao->listarCredor();
    }

    public function listarCredorAtivos()
    {
          include '../dao/credorDAO.php';
          $dao = new credorDao(null);
          return $dao->listarCredorAtivos();
    }
  

    public function excluirCredor($id)
    {
          include '../dao/CredorDAO.php';
          $dao = new credorDao();
          $dao->excluirCredor($id);
    }


    public function resgataPorID($idCredor)
    {
        include_once "../dao/credorDao.php";
        $dao = new credorDao(null);
        return $dao->resgataPorID($idCredor);
    }
    
    public function alterarCredor($model)
    {
     include_once "../dao/credorDao.php";
     $dao = new credorDao();
     return $dao->alterarCredor($this);
    }
}

?>



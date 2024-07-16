<?php 

class despesaModel{
    protected $id;
    protected $idCredor;
    protected $nomeDaspesa;
    protected $idUsuario;
    protected $dataCadastro;
    protected $ativo;



    public function __construct($id, $idUsuario , $dataCadastro,$nomeDespesa, $idCredor,  $ativo) {
        $this->id = $id;
        $this->idCredor = $idCredor;
        $this->nomeDespesa = $nomeDespesa;
        $this->idUsuario = $idUsuario;
        $this->dataCadastro = $dataCadastro;
        $this->ativo = $ativo;
    }


    public function getId() {
        return $this->id;
    }

    public function getIdCredor() {
        return $this->idCredor;
    }

    public function getNomeDespesa() {
        return $this->nomeDespesa;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function isAtivo() {
        return $this->ativo;
    }

    
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCredor($idCredor) {
        $this->idCredor = $idCredor;
    }

    public function setNomeDespesa($nomeDespesa) {
        $this->nomeDespesa = $nomeDespesa;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }




    public function cadastraDespesa(despesaModel $despesa)
    {
        include_once '../dao/despesaDao.php';
        $despesa= new despesaDao();
        $despesa->cadastraDespesa($this);
    }


    public function listarDespesa()
    {
          include '../dao/despesaDAO.php';
          $dao = new despesaDao(null);
          return $dao->listarDespesa();
    }
    public function listarDespesaAtivas()
    {
          include '../dao/despesaDAO.php';
          $dao = new despesaDao(null);
          return $dao->listarDespesaAtivas();
    }
  

    public function excluirDespesa($id)
    {
          include '../dao/despesaDAO.php';
          $dao = new despesaDao();
          $dao->excluirDespesa($id);
    }


    public function resgataPorID($idDespesa)
    {
        include_once "../dao/despesaDao.php";
        $dao = new despesaDao(null);
        return $dao->resgataPorID($idDespesa);
    }
    
    public function alterarDespesa($model)
    {
     include_once "../dao/despesaDao.php";
     $dao = new despesaDao();
     return $dao->alterarDespesa($this);
    }
}

?>



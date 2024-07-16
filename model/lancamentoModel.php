<?php 

class lancamentoModel{
    protected $id;
    protected $idLancamento;
    protected $idBase;
    protected $idUsuario ;
    protected $idDespesa;
    protected $competenciaDespesa;
    protected $dataVencimento;
    protected $valorLiquido;
    protected $valorMulta;
    protected $valorCorrecao;
    protected $ativo ;
    protected $observacao;
    protected $dataCadastro;




    public function __construct($id, $idBase, $idUsuario, $idDespesa, $competenciaDespesa, $dataVencimento, $valorLiquido, $valorMulta, $valorCorrecao, $ativo, $observacao, $dataCadastro) {
    $this->id = $id;
    $this->idBase = $idBase;
    $this->idUsuario = $idUsuario;
    $this->idDespesa = $idDespesa;
    $this->competenciaDespesa = $competenciaDespesa;
    $this->dataVencimento = $dataVencimento;
    $this->valorLiquido = $valorLiquido;
    $this->valorMulta = $valorMulta;
    $this->valorCorrecao = $valorCorrecao;
    $this->ativo = $ativo;
    $this->observacao = $observacao;
    $this->dataCadastro = $dataCadastro;
}

// Getters
public function getId() {
    return $this->id;
}

public function getIdLancamento() {
    return $this->idLancamento;
}

public function getIdBase() {
    return $this->idBase;
}

public function getIdUsuario() {
    return $this->idUsuario;
}

public function getIdDespesa() {
    return $this->idDespesa;
}

public function getCompetenciaDespesa() {
    return $this->competenciaDespesa;
}

public function getDataVencimento() {
    return $this->dataVencimento;
}

public function getValorLiquido() {
    return $this->valorLiquido;
}

public function getValorMulta() {
    return $this->valorMulta;
}

public function getValorCorrecao() {
    return $this->valorCorrecao;
}

public function getAtivo() {
    return $this->ativo;
}

public function getObservacao() {
    return $this->observacao;
}

public function getDataCadastro() {
    return $this->dataCadastro;
}

// Setters
public function setId($id) {
    $this->id = $id;
}

public function setIdLancamento($idLancamento) {
    $this->idLancamento = $idLancamento;
}

public function setIdBase($idBase) {
    $this->idBase = $idBase;
}

public function setIdUsuario($idUsuario) {
    $this->idUsuario = $idUsuario;
}

public function setIdDespesa($idDespesa) {
    $this->idDespesa = $idDespesa;
}

public function setCompetenciaDespesa($competenciaDespesa) {
    $this->competenciaDespesa = $competenciaDespesa;
}

public function setDataVencimento($dataVencimento) {
    $this->dataVencimento = $dataVencimento;
}

public function setValorLiquido($valorLiquido) {
    $this->valorLiquido = $valorLiquido;
}

public function setValorMulta($valorMulta) {
    $this->valorMulta = $valorMulta;
}

public function setValorCorrecao($valorCorrecao) {
    $this->valorCorrecao = $valorCorrecao;
}

public function setAtivo($ativo) {
    $this->ativo = $ativo;
}

public function setObservacao($observacao) {
    $this->observacao = $observacao;
}

public function setDataCadastro($dataCadastro) {
    $this->dataCadastro = $dataCadastro;
}





    public function cadastraLancamento(lancamentoModel $despesa)
    {
        include_once '../dao/lancamentoDao.php';
        $lancamento= new LancamentoDao();
        $lancamento->cadastraLancamento($this);
    }

   
    public function listarLancamento()
    {
          include '../dao/lancamentoDAO.php';
          $dao = new lancamentoDao(null);
          return $dao->listarLancamento();
    }
    public function  listarLancamentoPbase($nome,$despesa,$credor,$dataIni,$dataFin)
    {
          include '../dao/lancamentoDAO.php';
          $dao = new lancamentoDao(null);
          return $dao->listarLancamentoPbase($nome,$despesa,$credor,$dataIni,$dataFin);
    }
  

    public function excluirLancamento($id)
    {
          include '../dao/lancamentoDAO.php';
          $dao = new lancamentoDao();
          $dao->excluirlancamento($id);
    }


    public function resgataPorID($idLancamento)
    {
        include_once "../dao/lancamentoDao.php";
        $dao = new lancamentoDao(null);
        return $dao->resgataPorID($idLancamento);
    }
    
    public function alterarLancamento($model)
    {
     include_once "../dao/lancamentoDao.php";
     $dao = new lancamentoDao();
     return $dao->alterarLancamento($this);
    }
}

?>



<?php

class lancamentoDao{

    protected $conn;

    

    function cadastraLancamento(lancamentoModel $lancamento)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();

        $sql="INSERT INTO lancamento (idBase,idUsuario,idDespesa,competenciaDespesa,
        dataVencimento,valorLiquido,valorMulta,valorCorrecao,observacao,dataCadastro,ativo)




        VALUES(:idBase,:idUsuario,:idDespesa,:competenciaDespesa,
        :dataVencimento,:valorLiquido,:valorMulta,:valorCorrecao,:observacao,:dataCadastro,:ativo)";
        
        $stmt = $conex->conn->prepare($sql);

    


        //$stmt->bindValue(':idLancamento',$lancamento->getId());
        $stmt->bindValue(':idBase',$lancamento->getIdBase());
        $stmt->bindValue(':idUsuario',$lancamento->getIdUsuario());
        $stmt->bindValue(':idDespesa',$lancamento->getIdDespesa());
        $stmt->bindValue(':competenciaDespesa',$lancamento->getCompetenciaDespesa());
        $stmt->bindValue(':dataVencimento',$lancamento->getDataVencimento());
        $stmt->bindValue(':valorLiquido',$lancamento->getValorLiquido());
        $stmt->bindValue(':valorMulta',$lancamento->getValorMulta());
        $stmt->bindValue(':valorCorrecao',$lancamento->getValorCorrecao());
        $stmt->bindValue(':observacao',$lancamento->getObservacao());
        $stmt->bindValue(':dataCadastro',date('Y-m-d h:i:s'));
        $stmt->bindValue(':ativo',$lancamento->getAtivo());
        
        $resultado = $stmt->execute();

        if($resultado){
            echo "<script>alert('cadastro realizado com sucesso')</script>";
        }
        else{
            echo "<script>alert('Nao foi possível realizar o cadastro')</script>"; 
        }
        echo " <script>location.href='../controller/processaCredor.php?op=Listar';</script>";
    }



    function listarLancamento()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="
        SELECT l.*, c.nomeCredor
        FROM lancamento l
        LEFT JOIN despesa d ON l.idDespesa = d.idDespesa
        LEFT JOIN credor c ON d.idCredor = c.idCredor
        ";
        return $conex->conn->query($sql);
    }

    function listarLancamentoPbase($nome,$despesa,$credor,$dataIni,$dataFin)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();

       

            $sql = "SELECT l.*, c.nomeCredor FROM lancamento l LEFT JOIN despesa d ON l.idDespesa = d.idDespesa
            LEFT JOIN credor c ON d.idCredor = c.idCredor WHERE 1";  
    
            if (!empty($dataIni)) {
                $sql .= " AND  l.dataVencimento >= '$dataIni'"; 
            }
            if (!empty($dataFin)) {
                $sql .= " AND  l.dataVencimento <= '$dataFin'"; 
            }
           if (!empty($credor)) {
               $sql .= " AND c.idCredor LIKE '%$credor%'"; 
           }
           if (!empty($despesa)) {
               $sql .= " AND d.idDespesa LIKE '%$despesa%'"; 
           }
           if (!empty($nome)) {
               $sql .= " AND l.idBase LIKE '%$nome%'"; 
           }
           
           $sql .= " ORDER BY l.idLancamento DESC";
           return $conex->conn->query($sql);
         











    

    }



    function excluirLancamento($id)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        
        $ObejetoDao = new lancamentoDao(); 
        $resultadoP = $ObejetoDao->resgataPorID($id); 

        $row = $resultadoP->fetch(PDO::FETCH_ASSOC);
        $lancamentoo = new lancamentoModel(null,null,null,null,null,null,null,null,null,null,null,null);
        $lancamentoo->setAtivo($row['ativo']);


        if($lancamentoo->getAtivo() == 'S' ){
            $sql = "UPDATE lancamento set ativo = 'N' WHERE idLancamento =".$id; 
            $res = $conex->conn->query($sql);

            }
            else{
                $sql = "UPDATE lancamento set ativo = 'S' WHERE idLancemento =".$id; 
                $res = $conex->conn->query($sql);

                }
                if($res)
                {
                echo "<script>alert('Alteração realizada com sucesso!');</script>";
                }
                else
                {
                echo "<script>alert('Não foi possível excluir o automovel!');</script>";
                }
                echo " <script>location.href='../controller/processaBase.php?op=Listar';</script>";
            
    }







    function resgataPorID($idLancamento){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
  
        $sql ="SELECT * FROM lancamento WHERE idLancamento='$idLancamento' ";
       
        return $conex->conn->query($sql);  
    }


    function alterarLancamento(lancamentoModel $lancamento)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();


      
        $sql="UPDATE lancamento SET 
        idBase = :idBase, 
        idUsuario=:idUsuario, 
        idDespesa=:idDespesa,
        competenciaDespesa = :competenciaDespesa,
        dataVencimento=:dataVencimento,
        valorLiquido=:valorLiquido,
        valorMulta=:valorMulta,
        valorCorrecao=:valorCorrecao,
        observacao=:observacao,
        dataCadastro=:dataCadastro,
        ativo=:ativo WHERE idLancamento = :idLancamento";
        $stmt = $conex->conn->prepare($sql);



        $stmt->bindValue(':idLancamento',$lancamento->getId());
        $stmt->bindValue(':idBase',$lancamento->getIdBase());
        $stmt->bindValue(':idUsuario',$lancamento->getIdUsuario());
        $stmt->bindValue(':idDespesa',$lancamento->getIdDespesa());
        $stmt->bindValue(':competenciaDespesa',$lancamento->getCompetenciaDespesa());
        $stmt->bindValue(':dataVencimento',$lancamento->getDataVencimento());
        $stmt->bindValue(':valorLiquido',$lancamento->getValorLiquido());
        $stmt->bindValue(':valorMulta',$lancamento->getValorMulta());
        $stmt->bindValue(':valorCorrecao',$lancamento->getValorCorrecao());
        $stmt->bindValue(':observacao',$lancamento->getObservacao());
        $stmt->bindValue(':dataCadastro',$lancamento->getDataCadastro());
        $stmt->bindValue(':ativo',$lancamento->getAtivo());
        
        $resultado = $stmt->execute();
        if($resultado)
        {
        echo "<script>alert('Alteração realizada com sucesso!');</script>";
        }
        else
        {
        echo "<script>alert('Não foi possível realizara alteração!');</script>";
        }
        echo " <script>location.href='../controller/processaCredor.php?op=Listar';</script>";
    

    }

}

?>
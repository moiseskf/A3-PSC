<?php

class despesaDao{

    protected $conn;

    

    function cadastraDespesa(despesaModel $despesa)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();

        $idUsuario = $_REQUEST["idUsuario"];
        $dataCadastro = $_REQUEST["dataCadastro"];
        $nomeDaspesa = $_REQUEST["nomeDespesa"];
        $idCredor = $_REQUEST["idCredor"];
        $ativo = $_REQUEST["ativo"];

        $sql="INSERT INTO despesa (nomeDespesa,idCredor,IdUsuario,dataCadastro,ativo)
        VALUES(:nomeDespesa,:idCredor,:IdUsuario,:dataCadastro,:ativo)";
        $stmt = $conex->conn->prepare($sql);

        
        $stmt->bindValue(':nomeDespesa',$despesa->getNomeDespesa());
        $stmt->bindValue(':idCredor',$despesa->getIdCredor());
        $stmt->bindValue(':IdUsuario',$despesa->getIdUsuario());
        $stmt->bindValue(':dataCadastro',date('Y-m-d h:i:s'));
        $stmt->bindValue(':ativo',$despesa->isAtivo());
        $resultado = $stmt->execute();

        if($resultado){
            echo "<script>alert('cadastro realizado com sucesso')</script>";
        }
        else{
            echo "<script>alert('Nao foi possível realizar o cadastro')</script>"; 
        }
        echo " <script>location.href='../controller/processaCredor.php?op=Listar';</script>";
    }


    function listarDespesa()
    {
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    $sql = "SELECT * FROM despesa ORDER BY idDespesa"; 
    return $conex->conn->query($sql);
    }

    function listarDespesaAtivas()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM despesa WHERE ativo = 'S' ORDER BY idDespesa"; 
        return $conex->conn->query($sql);
    }

   
    
    function excluirDespesa($id)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        
        $ObejetoDao = new despesaDao(); 
        $resultadoP = $ObejetoDao->resgataPorID($id); 

        $row = $resultadoP->fetch(PDO::FETCH_ASSOC);
        $despesaa = new despesaModel(null,null,null,null,null,null,null,null,null); 
        $despesaa->setAtivo($row['ativo']);


        if($despesaa->isAtivo() == 'S' ){
            $sql = "UPDATE despesa set ativo = 'N' WHERE idDespesa =".$id; 
            $res = $conex->conn->query($sql);

            }
            else{
                $sql = "UPDATE despesa set ativo = 'S' WHERE idDespesa =".$id; 
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





    function resgataPorID($idDespesa){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM despesa WHERE idDespesa='$idDespesa' ";
       
        return $conex->conn->query($sql);  
    }


    function alterarDespesa(despesaModel $despesa)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();


      
        $sql="UPDATE despesa SET nomeDespesa = :nomeDespesa, IdUsuario=:IdUsuario , dataCadastro=:dataCadastro,
        idCredor=:idCredor,ativo=:ativo WHERE idDespesa = :idDespesa";
        $stmt = $conex->conn->prepare($sql);

        $stmt->bindValue(':idDespesa',$despesa->getId());
        $stmt->bindValue(':nomeDespesa',$despesa->getNomeDespesa());
        $stmt->bindValue(':idCredor',$despesa->getIdCredor());
        $stmt->bindValue(':IdUsuario',$despesa->getIdUsuario());
        $stmt->bindValue(':dataCadastro',$despesa->getDataCadastro());
        $stmt->bindValue(':ativo',$despesa->isAtivo());

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
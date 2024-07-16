<?php

class usuarioDao{

    protected $conn;

    

    function cadastraCredor(credorModel $credor)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();

        $sql="INSERT INTO credor (nomeCredor,IdUsuario,dataCadastro,responsavelCredor,telefoneCredor,celularCredor,ativo)
        VALUES(:nomeCredor,:IdUsuario,:dataCadastro,:responsavelCredor,:telefoneCredor,:celularCredor,:ativo)";
        $stmt = $conex->conn->prepare($sql);

        
        $stmt->bindValue(':nomeCredor',$credor->getNomeCredor());
        $stmt->bindValue(':IdUsuario',$credor->getIdUsuario());
        $stmt->bindValue(':dataCadastro',$credor->getDataCadastro());
        $stmt->bindValue(':responsavelCredor',$credor->getResponsavelCredor());
        $stmt->bindValue(':telefoneCredor',$credor->getTelefoneCredor());
        $stmt->bindValue(':celularCredor',$credor->getCelularCredor());
        $stmt->bindValue(':ativo',$credor->getAtivo());
        $resultado = $stmt->execute();

        if($resultado){
            echo "<script>alert('cadastro realizado com sucesso')</script>";
        }
        else{
            echo "<script>alert('Nao foi possível realizar o cadastro')</script>"; 
        }
        echo " <script>location.href='../controller/processaCredor.php?op=Listar';</script>";
    }


    function listarCredor()
    {
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    $sql = "SELECT * FROM credor ORDER BY idCredor"; 
    return $conex->conn->query($sql);
    }


    function excluirCredor($id)
    {
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    
    $ObejetoDao = new credorDao(); 
    $resultadoP = $ObejetoDao->resgataPorID($id); 

    $row = $resultadoP->fetch(PDO::FETCH_ASSOC);
    $credora = new credorModel(null,null,null,null,null,null,null,null,null); 
    $credora->setAtivo($row['ativo']);


    if($credora->getAtivo() == 'S' ){
        $sql = "UPDATE credor set ativo = 'N' WHERE idCredor =".$id; 
        $res = $conex->conn->query($sql);

        }
        else{
            $sql = "UPDATE credor set ativo = 'S' WHERE idCredor =".$id; 
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


    function resgataPorID($idUsuario){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql ="SELECT * FROM usuario WHERE idUsuario='$idUsuario' ";
       
        return $conex->conn->query($sql);  
    }


    function alterarCredor(credormodel $credor)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();


      
        $sql="UPDATE credor SET nomeCredor = :nomeCredor, IdUsuario=:IdUsuario , dataCadastro=:dataCadastro,
        responsavelCredor=:responsavelCredor,telefoneCredor=:telefoneCredor,celularCredor=:celularCredor,ativo=:ativo WHERE idCredor = :idCredor";
        $stmt = $conex->conn->prepare($sql);

        $stmt->bindValue(':idCredor',$credor->getId());
        $stmt->bindValue(':nomeCredor',$credor->getNomeCredor());
        $stmt->bindValue(':IdUsuario',$credor->getIdUsuario());
        $stmt->bindValue(':dataCadastro',$credor->getDataCadastro());
        $stmt->bindValue(':responsavelCredor',$credor->getResponsavelCredor());
        $stmt->bindValue(':telefoneCredor',$credor->getTelefoneCredor());
        $stmt->bindValue(':celularCredor',$credor->getCelularCredor());
        $stmt->bindValue(':ativo',$credor->getAtivo());


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
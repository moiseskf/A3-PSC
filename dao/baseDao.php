<?php

class baseDao{

    protected $conn;


 


    function cadastraBase(baseModel $base)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();

        $sql="INSERT INTO base (nomeBase,IdUsuario,dataCadastro,responsavelBase,telefoneBase,celularBase,emailBase,ativo)
        VALUES(:nomeBase,:IdUsuario,:dataCadastro,:responsavelBase,:telefoneBase,:celularBase,:emailBase,:ativo)";
        $stmt = $conex->conn->prepare($sql);

        
        $stmt->bindValue(':nomeBase',$base->getNomeBase());
        $stmt->bindValue(':IdUsuario',$base->getIdUsuario());
        $stmt->bindValue(':dataCadastro',date('Y-m-d h:i:s'));
        //$stmt->bindValue(':dataCadastro',$base->getDataCadastro());
        $stmt->bindValue(':responsavelBase',$base->getResponsavelBase());
        $stmt->bindValue(':telefoneBase',$base->getTelefoneBase());
        $stmt->bindValue(':celularBase',$base->getCelularBase());
        $stmt->bindValue(':emailBase',$base->getEmailBase());
        $stmt->bindValue(':ativo',$base->getAtivo());
        $resultado = $stmt->execute();

        if($resultado){
            echo "<script>alert('cadastro realizado com sucesso')</script>";
        }
        else{
            echo "<script>alert('Nao foi possível realizar o cadastro')</script>"; 
        }
        //echo " <script>location.href='../controller/processaAuto.php?op=Listar';</script>";
        echo " <script>location.href='../controller/processaBase.php?op=Listar';</script>";
    }

    function listarBase()
    {
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    $sql = "SELECT * FROM base ORDER BY idBase"; 
    return $conex->conn->query($sql);
    }

    function listarBaseAtivas()
    {
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    $sql = "SELECT * FROM base WHERE ativo = 'S' ORDER BY idBase"; 
    return $conex->conn->query($sql);
    }



    
    function excluirBase($id)
    {
    include_once 'Conexao.php';
    $conex = new Conexao();
    $conex->fazConexao();
    
    $baseDao = new baseDao(); 
    $base = $baseDao->resgataPorID($id); 

    $row = $base->fetch(PDO::FETCH_ASSOC);
    $basea = new baseModel(null,null,null,null,null,null,null,null,null); 
    $basea->setAtivo($row['ativo']);


    if($basea->getAtivo() == 'S' ){
        $sql = "UPDATE base set ativo = 'N' WHERE idBase =".$id; 
        $res = $conex->conn->query($sql);

        }
        else{
            $sql = "UPDATE base set ativo='S' WHERE idBase =".$id; 
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

    


    function resgataPorID($idBase){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        
        $sql ="SELECT * FROM base WHERE idBase='$idBase' ";
       
        return $conex->conn->query($sql);  
    }


    function alterarBase(Basemodel $base)
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();


      
        $sql="UPDATE base SET nomeBase = :nomeBase, IdUsuario=:IdUsuario , dataCadastro=:dataCadastro,
        responsavelBase=:responsavelBase,telefoneBase=:telefoneBase,celularBase=:celularBase,celularBase=:celularBase,emailBase=:emailBase,ativo=:ativo WHERE idBase = :idBase";
        $stmt = $conex->conn->prepare($sql);

        $stmt->bindValue(':idBase',$base->getId());
        $stmt->bindValue(':nomeBase',$base->getNomeBase());
        $stmt->bindValue(':IdUsuario',$base->getIdUsuario());
        $stmt->bindValue(':dataCadastro',$base->getDataCadastro());
        $stmt->bindValue(':responsavelBase',$base->getResponsavelBase());
        $stmt->bindValue(':telefoneBase',$base->getTelefoneBase());
        $stmt->bindValue(':celularBase',$base->getCelularBase());
        $stmt->bindValue(':emailBase',$base->getEmailBase());
        $stmt->bindValue(':ativo',$base->getAtivo());


        $resultado = $stmt->execute();
        if($resultado)
        {
        echo "<script>alert('Alteração realizada com sucesso!');</script>";
        }
        else
        {
        echo "<script>alert('Não foi possível realizara alteração!');</script>";
        }
        echo " <script>location.href='../controller/processaBase.php?op=Listar';</script>";
    

    }

}

?>
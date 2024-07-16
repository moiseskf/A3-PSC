<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php 

session_start();

include_once '../dao/Conexao.php';

$conex = new Conexao();

$conex->fazConexao();
if (!isset($_SESSION['user_id'])) {
   
    header('Location: ../view/login.php');
    // Encerra a execução do script para garantir que o redirecionamento ocorra imediatamente
    exit();
}
?>

    <style>
       
    
        body{
            background-color: gray;
        } 


        
        .card{
            max-width: 500px;
            
        }

        #logo{
    max-width:100px;
    background-color:white;
   }
   .dropdown-item,.btn:hover{
            color:black;
            background-color:lightblue;
        }
    </style> 
 
 <nav class="navbar bg-dark navbar-dark navbar-expand-sm py-3 sticky-top">

<div class="container">


<a class="navbar-brand " href="#">
       <img src="../imgs/logo.png" id="logo" alt="">
    </a>



    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav"
        style="cursor:pointer" aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="menuNav">


        <ul class="navbar-nav ms-auto text-center ">

        <li class="nav-item">
                <a href="../index.html" class=" nav-link btn btn-primary btn-sm mb-3"> Inicio</a>
                
        </li>



        <li class="nav-item">
                        <a onclick="location.href='pesquisaAnc.php?op=a'" style = "cursor: pointer" class="nav-link btn btn-primary btn-sm mb-3"> Pesquisa Avançada</a>
            </li>

            <li class="nav-item">
                <div class="dropdown  ">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Ações</a>
                    <ul class="dropdown-menu text-center dropdown-menu-end">
                
                        <li><a onclick="location.href='formBase.php?op=Incluir&idBase=1'"  style = "cursor: pointer" class="dropdown-item">Cadastrar </a></li>
                        <li><a onclick="location.href='formListarBase.php?op=Listar'" style = "cursor: pointer" class="dropdown-item">Listar</a></li>
                        
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                        <a onclick="location.href='../view/logout.php'" style = "cursor: pointer" class="nav-link btn btn-primary btn-sm mb-3"> Logout</a>
            </li>

        </ul>
    </div>

</div>
</nav>



<?php

$operacao = $_REQUEST["op"];
if ($operacao== "Alterar")
{
    
    //resgatar dados do banco e preencher controles
    include("../controller/BaseController.php");
    $res = BaseController::resgataPorID($_REQUEST["idBase"]);

    $operacao="Alterar";
    $row = $res->fetch (PDO:: FETCH_OBJ);
    
    $nomeBase = $row->nomeBase;
    $idUsuario = $row->idUsuario;
    $dataCadastro =$row->dataCadastro;
    $responsavelBase = $row->responsavelBase;
    $telefoneBase = $row->telefoneBase;
    $celularBase = $row->celularBase;
    $emailBase =$row->emailBase;
    $ativo = $row->ativo;
    $idBase = $row->idBase;





    print " <div id='cadBase' class='text-center   container'>";
    print "<h1 >Formulario de cadastro de Base</h1>";

    

    print "  <div class='d-flex align-items-center col-md-12'>";
    print "<form method='post'  action='../controller/processaBase.php'>";
        print " <div class=' d-flex align-items-center form-group row'>";
    
            print "<label for='nomeBase' class='col-sm-2 col-form-label'  >Nome Base: </label>";
            print " <div class= 'col-sm-2'> ";
                print " <input type='text' name='nomeBase'  class='form-control' value=".$nomeBase." >  ";
            print "</div>";  

            print "<label for='idUsuario' class='col-sm-2 col-form-label' >id usuario: </label>";   
            print " <div class= 'col-sm-2'> ";
                print " <input type='hidden' name='idUsuario' class='form-control'  value=".$idUsuario.">";
            print "</div>";  

            print " <label for='responsavelBase' class='col-sm-2 col-form-label '>Responsavel da Base: </label>"; 
            print " <div class= 'col-sm-2'> ";
                print"<input type='text' name='responsavelBase'  class='form-control' value=".$responsavelBase.">";
            print "</div>"; 
        
        print " </div class='form-group row'>";
        print " </div>";

    
        print " <div class= 'd-flex align-items-center  form-group row'>";

        print " <label for='telefoneBase' class='col-sm-1 col-form-label'>Telefone Base: </label>";
        print " <div class= 'col-sm-2'> ";
            print " <input type='text' name='telefoneBase'  class='form-control' value=".$telefoneBase."> ";
        print "</div>";  



        print " <label for='celularBase' class='col-sm-1 col-form-label'>Celular Base: </label>";
        print " <div class= 'col-sm-2'> ";
            print "<input type='text' name='celularBase'  class='form-control' value=".$celularBase.">";
        print "</div>";  


        print " <label for='emailBase' class='col-sm-1 col-form-label'>E-mail da Base: </label>";
        print " <div class= 'col-sm-2'> ";
            print"<input type='text' name='emailBase'  class='form-control' value=".$emailBase.">";
        print "</div>"; 

        print " <div class= 'col-sm-2'> ";
            print "<input type='text' name='dataCadastro'   class='form-control' value=".$dataCadastro.">";
        print "</div>"; 
        
        print " </div>";

        print " <div class= ' form-group row'>";

        

    
        print " </div>";
   
        //print "<label for='dataCadastro'>Data: </label>";
 

        print "<input type='hidden' name='idBase'  class='form-control' value='$idBase'><br>"; 
        print "<input type='hidden' name='op' value='$operacao'><br>";
        print "<input type='hidden' name='ativo' value='$ativo'><br>"; 
        print "    <button type='submit' class='btn btn-primary'>Submit</button>";
            
    print "</form>";

    print " </div>";












}
else if ($operacao== "AlterarCredor")
{
    
    //resgatar dados do banco e preencher controles
    include_once("../controller/CredorController.php");
    $res = CredorController::resgataPorID($_REQUEST["idCredor"]);
    $row = $res->fetch (PDO:: FETCH_OBJ);
    $operacao="Alterar";
    


    $nomeCredor = $row->nomeCredor;
    $idUsuario = $row->idUsuario;
    $dataCadastro =$row->dataCadastro;
    $responsavelCredor = $row->responsavelCredor;
    $telefoneCredor = $row->telefoneCredor;
    $celularCredor = $row->celularCredor;
    $ativo = $row->ativo;
    $idCredor = $row->idCredor;



    
    print " <div id='cadCredor' class='text-center   container'>";
    
    print "<h1 >Formulario de cadastro de Credor</h1>";

    print "  <div class='d-flex align-items-center col-md-12'>";

    print "<form method='post'  action='../controller/processaCredor.php'>";

        print " <div class=' d-flex align-items-center form-group row'>";
    
            print "<label for='nomeCredor' class='col-sm-2 col-form-label'  >Nome Credor: </label>";
            print " <div class= 'col-sm-2'> ";
                print " <input type='text' name='nomeCredor'  class='form-control' value=".$nomeCredor." >  ";
            print "</div>";  

            print "<label for='idUsuario' class='col-sm-2 col-form-label' >id usuario: </label>";   
            print " <div class= 'col-sm-2'> ";
                print " <input type='hidden' name='idUsuario' class='form-control'  value=".$idUsuario.">";
            print "</div>";  

            print " <label for='responsavelCredor' class='col-sm-2 col-form-label '>Responsavel credor: </label>"; 
            print " <div class= 'col-sm-2'> ";
                print"<input type='text' name='responsavelCredor'  class='form-control' value=".$responsavelCredor.">";
            print "</div>"; 
        
        print " </div class='form-group row'>";
        print " </div>";

    
        print " <div class= 'd-flex align-items-center  form-group row'>";

        print " <label for='telefoneCredor' class='col-sm-1 col-form-label'>Telefone do Credor: </label>";
        print " <div class= 'col-sm-2'> ";
            print " <input type='text' name='telefoneCredor'  class='form-control' value=".$telefoneCredor."> ";
        print "</div>";  



        print " <label for='celularCredor' class='col-sm-1 col-form-label'>Celular do Credor: </label>";
        print " <div class= 'col-sm-2'> ";
            print "<input type='text' name='celularCredor'  class='form-control' value=".$celularCredor.">";
        print "</div>";  
        
        print " <div class= 'col-sm-2'> ";
        print "<input type='date' name='dataCadastro'   class='form-control' value=".$dataCadastro.">";
    print "</div>"; 

        print " </div>";

        print " <div class= ' form-group row'>";

        

    
        print " </div>";
   
        //print "<label for='dataCadastro'>Data: </label>";
 

        print "<input type='hidden' name='idCredor'  class='form-control' value='$idCredor'><br>"; 
        print "<input type='hidden' name='op' value='$operacao'><br>";
        print "<input type='hidden' name='ativo' value='$ativo'><br>"; 
        print "    <button type='submit' class='btn btn-primary'>Submit</button>";
            
    print "</form>";

    print " </div>";


}
else if ($operacao == "AlterarDespesa")
{
    
    //resgatar dados do banco e preencher controles
    include("../controller/DespesaController.php");
    $res = DespesaController::resgataPorID($_REQUEST["idDespesa"]);

    $operacao="Alterar";
    $row = $res->fetch (PDO:: FETCH_OBJ);
   

    $idDespesa = $row->idDespesa;
    $nomeDespesa = $row->nomeDespesa;
    $idUsuario = $row->idUsuario;
    $dataCadastro =$row->dataCadastro;
    $ativo = $row->ativo;
    $idCredor = $row->idCredor;


    
    print " <div id='cadDespesa' class='text-center container'>";
    
    print "<h1 >Formulario Para ALterar Despesa</h1>";

    print "<form method='post'  action='../controller/processaDespesa.php'>";

    
    echo "<div class='card mx-auto' style='max-width: 400px;'>";
    echo '<div class="card-body ">';


    echo '<h5 class="card-title"><strong>Cadastrar despesa</strong></h5>';
    echo '<h6 class="card-subtitle"><strong>Id Base:</strong></h6>';
    echo '<hr>'; 
    
    echo '<p class="card-text"> <label for="nomeDespesa" class="col-form-label">Nome despesa</label></p>';
    echo '<input type="text" name="nomeDespesa" class="form-control" value="'.$nomeDespesa.'">';
    
    echo '<p class="card-text"> <label for="idUsuario" class="col-form-label">Id usuário</label></p>';
    echo '<input type="hidden" name="idUsuario" class="form-control" value="'.$idUsuario.'">';
    
    echo '<p class="card-text"> <label for="dataCadastro" class="col-form-label">Data Cadastro</label></p>';
    echo '<input type="text" name="dataCadastro" class="form-control" value="'.$dataCadastro.'">';
    



    include("../controller/CredorController.php");
    $resG = CredorController::listarCredor();
    $qtdG = $resG->rowCount();
    
    if ($qtdG > 0) {
        echo '<p class="card-text"> <label for="idCredor" class="col-form-label">Nome Credor</label></p>';
        echo '<select class="form-control" name="idCredor">';
            
        while ($row1 = $resG->fetch(PDO::FETCH_OBJ)) {                
            echo '<option value="'.$row1->idCredor.'">'.$row1->nomeCredor.'</option>';
        }
        echo '</select>';
    }
    print "<br>";
    print "    <button type='submit' class='btn btn-primary'>Enviar</button>";
    print "<input type='hidden' name='idDespesa'  class='form-control' value='$idDespesa'><br>"; 
    print "<input type='hidden' name='op' value='$operacao'><br>";
    print "<input type='hidden' name='ativo' value='$ativo'><br>"; 
   
    echo '</div>'; 
    echo '</div>'; 

            
    print "</form>";

    print " </div>";





}
else if ($operacao == "alterarLancamento")
{
    
    //resgatar dados do banco e preencher controles
    include("../controller/lancamentoController.php");
    $res = lancamentoController::resgataPorID($_REQUEST["idLancamento"]);

    $operacao="Alterar";
    $row = $res->fetch (PDO:: FETCH_OBJ);
   




    $idLancamento = $row->idLancamento;
    $idBase = $row->idBase; 
    $idUsuario = $row->idUsuario;
    $idDespesa= $row->idDespesa;
    $competenciaDespesa= $row->competenciaDespesa;
    $dataVencimento= $row->dataVencimento;
    $valorLiquido= $row->valorLiquido;
    $valorMulta= $row->valorMulta;
    $valorCorrecao= $row->valorCorrecao;
    $ativo = $row->ativo;
    $observacao = $row->observacao;
    $dataCadastro = $row->dataCadastro;




    print " <div id='cadLancamento' class='text-center container'>";
    
    print "<h1>Formulario para alterar lançamento</h1>";

    print "<form onsubmit='return validarFormulario()' method='post'  action='../controller/processaLancamento.php'>";

        
    print "<div class='card mx-auto' style='max-width: 400px;'>";
    print '<div class="card-body ">';
    
    print '<h5 class="card-title"><strong>alterar lançamento</strong></h5>';
    print '<h6 class="card-subtitle"><strong></strong></h6>';
    print '<hr>';

    print '<p class="card-text"> <label for="idUsuario" class= "col-form-label"  >Id usuario</p>';
    print "<input type='number' name='idUsuario' class='form-control'  value=".$idUsuario.">";

    print '<p class="card-text"> <label for="competenciaDespesa" class= "col-form-label"  >competencia Despesa</p>';
    print " <input type='number' name='competenciaDespesa' class='form-control'  value=".$competenciaDespesa.">";

    print '<p class="card-text"> <label for="dataVencimento" class= "col-form-label"  >data Vencimento</p>';
    print "<input type='date' name='dataVencimento'  class='form-control' value=".$dataVencimento.">";

    
    print '<p class="card-text"> <label for="valorLiquido" class= "col-form-label"  >Valor Liquido</p>';
    print " <input type='text' name='valorLiquido' id='valorLiquido' class='form-control'  value=".$valorLiquido.">";

    print '<p class="card-text"> <label for="valorMulta" class= "col-form-label"  >Valor Multa</p>';
    print " <input type='text' name='valorMulta' id='valorMulta' class='form-control'  value=".$valorMulta.">";

       
    print '<p class="card-text"> <label for="valorCorrecao" class= "col-form-label"  >valor Correcao </p>';
    print " <input type='number' name='valorCorrecao' id='valorCorrecao' class='form-control'  value=".$valorCorrecao.">";

    print '<p class="card-text"> <label for="dataCadastro" class= "col-form-label"  >data Cadastro</p>';
    print "<input type='date' name='dataCadastro'  class='form-control'  value=".$dataCadastro.">";
    

    print '<p class="card-text"> <label for="observacao" class= "col-form-label"  >Observacao</p>';
    print " <input type='text' name='observacao'  class='form-control' value=".$observacao." >  ";


    include_once("../controller/BaseController.php");
    include_once("../controller/DespesaController.php");

    $resB = BaseController::listarBase();
    $qtdB = $resB->rowCount();
    $resC = DespesaController::listarDespesa();
    $qtdC = $resC->rowCount();

    if ($qtdB > 0) {
      print '<p class="card-text"> <label for="idBase" class= "col-form-label"  >Base : </p>';
        print "<select  class='form-control' name='idBase'>";
            
        while ($row2 = $resB->fetch(PDO::FETCH_OBJ)) {
    
            print " <option value='$row2->idBase'>$row2->nomeBase</option>";
        }
        
        print " </select>";
    }

    if ($qtdC > 0) {
      
      print '<p class="card-text"> <label for="idDespesa" class= "col-form-label"  >Despesa : </p>';
        print "<select  class='form-control' name='idDespesa'>";
            
        while ($row3 = $resC->fetch(PDO::FETCH_OBJ)) {
            
            print " <option value='$row3->idDespesa'>$row3->nomeDespesa</option>";
        }
        print " </select>";
    }
 

    


    print "<br>";
    print " <button type='submit' class='btn btn-primary'>Enviar</button>";
    print "<input type='hidden' name='idLancamento'  class='form-control' value='$idLancamento'><br>"; 
    print "<input type='hidden' name='op' value='$operacao'><br>";
    print "<input type='hidden' name='ativo' value='$ativo'><br>"; 
   

    print '</div>'; 
    print '</div>'; 
            
    print "</form>";

    print " </div>";
    

}
else
{

    $idBase = "";
    $operacao="Incluir";
    $nomeBase = "";
    $idUsuario = "2";
    $dataCadastro =date('Y-m-d H:i:s');
    $responsavelBase = "";
    $telefoneBase = "";
    $celularBase = "";
    $emailBase = "";
    $ativo = "S";


    $idCredor = "";
    $operacao="Incluir";
    $nomeCredor = "";
    $idUsuario = "2";
    $dataCadastro =date('Y-m-d H:i:s');
    $responsavelCredor = "";
    $telefoneCredor = "";
    $celularCredor = "";
    $emailBase = "";
    $ativo = "S";


    $idDespesa = "";
    $idCredor = "";
    $nomeDespesa = "";
    $idUsuario = "2";
    $dataCadastro =date('Y-m-d H:i:s');
    $ativo = "S";
    $operacao="Incluir";

    $idLancamento = "";
    $idBase ="";
    $idUsuario = "2";
    $idDespesa= "";
    $competenciaDespesa= "";
    $dataVencimento= "";
    $valorLiquido= "";
    $valorMulta= "";
    $valorCorrecao= "";
    $ativo = "S";
    $observacao = "";
    $dataCadastro = date('Y-m-d H:i:s');

    

}



            
              

    ?>





        <script src="../jquery-3.7.1.js"></script>

       
        <script>
            $(document).ready(function () {
            $('#btnCadBase').click(function () {
                $("#cadCredor").hide();
                $('#cadDespesa').hide();
                $('#cadLancamento').hide();
                $('#cadBase').show();
            });

        })
        
        $(document).ready(function () {
            $('#btnCadCredor').click(function () {
                $("#cadBase").hide();
                $('#cadDespesa').hide();
                $('#cadLancamento').hide();
                $('#cadCredor').show();
               
            });

        })
        $(document).ready(function () {
            $('#btnCadDespesa').click(function () {
                $("#cadBase").hide();
                $('#cadCredor').hide();
                $('#cadLancamento').hide();
                $('#cadDespesa').show();
            });

        })
        $(document).ready(function () {
            $('#btnCadLancamento').click(function () {
                $("#cadCredor").hide();
                $('#cadBase').hide();
                $('#cadDespesa').hide();
                $('#cadLancamento').show();
            });

        })
        function validarFormulario() {

        var valorMulta = document.getElementById('valorMulta').value;
        var valorCorrecao = document.getElementById('valorCorrecao').value;
        var valorLiquido = document.getElementById('valorLiquido').value;


        if (isNaN(parseFloat(valorMulta)) || isNaN(parseFloat(valorCorrecao)) || isNaN(parseFloat(valorLiquido))) {
            alert('Por favor, insira um número decimal válido em todos os campos.');
            return false; 
        }


        var data = document.getElementById('datae').value;
        if (data === '') {
            alert('Por favor, preencha o campo de data.');
            return false; 
        }

        var dataObj = new Date(data);
        if (isNaN(dataObj.getTime())) {
            alert('Por favor, insira uma data válida.');
            return false; 
        }


        return true;



        }
        </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


</body>
</html>
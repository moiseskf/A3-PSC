<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa avançada</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
   
        th,td ,tr {
           
            border:  solid ;
        }
        .table-responsive{
          
            max-height:500px;
        }
            
       body{
        background-color:#F7F7F2;
       } 
       #PBASE{
        display:none;
       }
       #btnss{
        max-height:60px;
       }
       #logo{
    max-width:100px;
    background-color:white;
   }
   .btn:hover{
            color:black;
            background-color:lightblue;
    }
    #form1{
        border:2px solid black;
        justify-content: center;
        border-radius:23px;
    }
    #form11{
        align-items: center;
        padding:15px;
        
     
    }
    .form-control{
        border: 1px solid;
    }
    </style>
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
   
<nav class="navbar bg-dark navbar-dark navbar-expand-sm py-3 sticky-top">

<div class="container">


<a class="navbar-brand " href="#">
       <img src="../imgs/logo.png" id="logo" alt="">
    </a>



    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav" style="cursor:pointer" aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="menuNav">

        <ul class="navbar-nav ms-auto text-center ">

                <li class="nav-item">
                        <a href="../index.html" class=" nav-link btn btn-primary btn-sm mb-3"> Inicio</a>
                        
                </li>



                <li class="nav-item">
                    <a onclick="location.href='?op=a'" style = "cursor: pointer" class="nav-link btn btn-primary btn-sm mb-3"> Pesquisa Avançada</a>
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
            

include("../controller/usuarioController.php");



print ' <form method="post"  action="?op=PBASE">';
        print '<div class="container mt-4" id="form1">';
            print '<div class="row" id="form11">';

                                
                    print '  <div class="col-sm-2">';
                        print '<p class="card-text"> <label for="buscaPBase" class= "col-form-label"  >Busca por base : </p>';
                    print ' </div>';

                    print '  <div class="col-sm-2">';
                        include_once("../controller/BaseController.php");
                        $resB = BaseController::listarBase();
                        $qtdB = $resB->rowCount();

                        if ($qtdB > 0) {
                        
                            print "<select  class='form-control' name='buscaPBase'>";
                            print " <option value=''></option>";
                            while ($row2 = $resB->fetch(PDO::FETCH_OBJ)) {
                                
                                print " <option value='$row2->idBase'>$row2->nomeBase</option>";
                            }
                            print " </select>";
                        }
                    print ' </div class="col-sm-2">';


                    print '  <div class="col-sm-2">';
                        print '<p class="card-text"> <label for="buscaPDespesa" class= "col-form-label"  >Busca por Despesa: </p>';
                    print ' </div class="col-sm-2">';


                    print '  <div class="col-sm-2">';
                            include_once("../controller/DespesaController.php");
                            $resC = DespesaController::listarDespesa();
                            $qtdC = $resC->rowCount();
            

                            if ($qtdB > 0) {
                            
                                print "<select  class='form-control' name='buscaPDespesa'>";
                                print " <option value=''></option>";
                                while ($row2 = $resC->fetch(PDO::FETCH_OBJ)) {
                                
                                    print " <option value='$row2->idDespesa'>$row2->nomeDespesa</option>";
                                }
                                print " </select>";
                            }
                    print ' </div class="col-sm-2">';

                    print '<div class="col-sm-2">';
                    print '<p class="card-text"> <label for="dataIni" class= "col-form-label"  >Credor : </p>';
                    print '</div>';

                    print '<div class="col-sm-2">';
                        include_once("../controller/credorController.php");
                        $resJ = credorController::listarCredor();
                        $qtdJ = $resJ->rowCount();
        

                        if ($qtdJ > 0) {
                        
                            print "<select  class='form-control' name='buscaPCredor'>";
                            print " <option value=''></option>";
                            while ($rowJ = $resJ->fetch(PDO::FETCH_OBJ)) {
                            
                                print " <option value='$rowJ->idCredor'>$rowJ->nomeCredor</option>";
                            }
                            print " </select>";
                        }
                    print '</div>';

            print '</div class="row" id="form11">';

//-=--=--=-=-=-=-=-=-=-=-=-=-=-=-=--=-=--=--=-=-=-=-=-=-=-=-=-=-=-=-=--=-=--=--=-=-=-=-=-=-=-=-=-=-=-=-=--=-=--=--=-=-=-=-=-=-=-=-=-=-=-=-=--=-=--=--=-=-=-=-=-=-=-=-=-=-=-=-=--=

            print '<div class="row" id="form11">';

                        
                    print '  <div class="col-sm-2">';
                        print '<p class="card-text"> <label for="dataIni" class= "col-form-label"  >Data Inicial : </p>';
                    print ' </div>';

                    print '  <div class="col-sm-2">';
                        print "<input type='date' class='form-control' name='dataIni' >";
                    print ' </div class="col-sm-2">';


                    print '  <div class="col-sm-2">';
                    print '<p class="card-text"> <label for="dataFin" class= "col-form-label"  >Data Final : </p>';
                    print ' </div>';

                    print '  <div class="col-sm-2">';
                        print "<input type='date' class='form-control' name='dataFin'>";
                    print ' </div class="col-sm-2">';
                    
                    print '<div class="col-sm-2">';
                        print ' <button type=" submit"  class=" btn btn-primary" >Submit</button>';
                    print '</div>';

            print '</div class="row" id="form11">';
        print ' </div  class="container mt-4">';
print ' </form>';





$operacao = $_REQUEST["op"];
if ($operacao== "a")
{
    
    
        include("../controller/LancamentoController.php");
        $resw = LancamentoController::listarLancamento();
        
}
else if ($operacao== "PBASE")
{ 


        $nome =$_REQUEST["buscaPBase"];
        $despesa =$_REQUEST["buscaPDespesa"];
        $credor =$_REQUEST["buscaPCredor"];
        $dataIni= $_REQUEST['dataIni'];
        $dataFin = $_REQUEST['dataFin'];
        //print "$nome ";print "$despesa ";
        
    
        include("../controller/LancamentoController.php");
        $resw = LancamentoController::listarLancamentoPbase($nome,$despesa,$credor,$dataIni,$dataFin);


}

print "<div id='gen' class='container mt-4'> ";
print " <div class='row'> ";
print "<div class='col'> ";

$qtd = $resw->rowCount();
if ($qtd > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-striped">';
    echo '<thead class="thead-light">';
    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Usuário</th>';
    echo '<th scope="col">Base</th>';
    echo '<th scope="col">Despesa</th>';
    echo '<th scope="col">Credor</th>';
    echo '<th scope="col">Competência Despesa</th>';
    echo '<th scope="col">Data Vencimento</th>';
    echo '<th scope="col">Valor Líquido</th>';
    echo '<th scope="col">Valor Multa</th>';
    echo '<th scope="col">Valor Correção</th>';
    echo '<th scope="col">Data Cadastro</th>';
    echo '<th scope="col">Observação</th>';
    echo '<th scope="col">Ativa</th>';
    echo '<th scope="col">Ação</th>';
    
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';


    while ($row = $resw->fetch(PDO::FETCH_OBJ)) {
        include_once("../controller/BaseController.php");
        include_once("../controller/DespesaController.php");
        $resB = baseController::resgataPorID($row->idBase);
        $rowb = $resB->fetch(PDO::FETCH_OBJ);

        $resD = despesaController::resgataPorID($row->idDespesa);
        $rowD = $resD->fetch(PDO::FETCH_OBJ);

        $resT = usuarioController::resgataPorID($row->idUsuario);
        $rowt = $resT->fetch (PDO:: FETCH_OBJ);
        echo '<tr>';
        echo '<td>'.$row->idLancamento.'</td>';
        echo '<td>'.$rowt->nomeUsuario.'</td>';
        echo '<td>'.$rowb->nomeBase.'</td>';
        echo '<td>'.$rowD->nomeDespesa.'</td>';
        echo '<td>'.$row->nomeCredor.'</td>';
        echo '<td>'.$row->competenciaDespesa.'</td>';
        echo '<td>'.$row->dataVencimento.'</td>';
        echo '<td>'.$row->valorLiquido.'</td>';
        echo '<td>'.$row->valorMulta.'</td>';
        echo '<td>'.$row->valorCorrecao.'</td>';
        echo '<td>'.$row->dataCadastro.'</td>';
        echo '<td>'.$row->observacao.'</td>';
        echo '<td>'.$row->ativo.'</td>';
        echo '<td ><button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=alterarLancamento&idLancamento='. $row->idLancamento . '\'">Alterar</button>';
        
        echo "<button class='btn btn-danger' onclick=
        \"
        if(confirm('Tem certeza que deseja Alterar o Status?'))
        {
        location.href='../controller/processaLancamento.php?op=Excluir&idLancamento=".$row->idLancamento."';
        }
        else{
            false
        }
        \">Ativar/Desativar
        </button> </td>";
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<p>Nenhum registro encontrado</p>';
}
print '</div class="container mt-4">';
print '</div class="row">';
print '</div>';
print '';








?>


 <a onclick="location.href='?op=a'" style = "cursor: pointer" class="nav-link btn btn-primary btn-sm mb-3"> Limpar filtro</a>





<!-- ================================================================================= -->







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


<script src="../jquery-3.7.1.js"></script>


</body>
</html>

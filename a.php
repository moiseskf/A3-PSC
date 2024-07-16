<?php
session_start();// começar sessao

$_SESSION['key'] = 'value'; //armazenar os dados

$_value = $_SESSION['key']; ///Recuperar dados

unset($_SESSION['key']);

$_SESSION['user_id'] =42;

echo $_SESSION['user_id'];

unset($_SESSION['user_id']);


session_unset(); // fechar sessao
session_destroy(); // destruir sessao










if ($qtd > 0) {

    $count = 0;


    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
      
        if ($count % 4 == 0) {
            print '<div class="row mb-3">';
        }

      
        echo '<div class="col-sm-3">';
        echo '<div class="card">';
        echo '<div class="card-body">';

      
        echo '<h5 class="card-title"><strong>Nome Base: </strong> ' . $row->nomeBase . '</h5>';
        echo '<h6 class="card-subtitle"><strong>Id Base: </strong> ' . $row->idBase . '</h6>';
        print '<hr>';
        echo '<p class="card-text"><span class="contss">Ativa: </span> ' . . '</p>';
        echo '<p class="card-text"><span class="contss">Responsavel da Base: </span>' . $row->responsavelBase .'</p>';
        echo '<p class="card-text"><span class="contss">Telefone da Base: </span>' . $row->telefoneBase . '</p>';
        echo '<p class="card-text"><span class="contss">Celular: </span>' . $row->celularBase . '</p>';
        echo '<p class="card-text"><span class="contss">E-mail: </span>' . $row->emailBase . '</p>';
        echo '<p class="card-text"><span class="contss">Usuario: </span>' . $row->idUsuario . '</p>';
        echo '<p class="card-text"><span class="contss">Data Cadastro: </span>'. $row->dataCadastro . '</p>';

        echo '<button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=Alterar&idBase=' . $row->idBase . '\'">Alterar</button>';
           
        print "<td> <button class='btn btn-danger ml-2' onclick=\"if(confirm('Tem certeza que deseja Alterar?'))
        {
        location.href='../controller/processaBase.php?op=Excluir&idBase=". $row->idBase."';
        }
        else{
            false
        }
        \">Ativar/desativar</button> </td>";

      
        echo '</div>'; // Fim do corpo do card
        echo '</div>'; // Fim do card
        echo '</div>'; // Fim da coluna Bootstrap

        $count++;

      
        if ($count % 4 == 0) {
            echo '</div>'; 
        }
    }


    if ($count % 4 != 0) {
        echo '</div>'; 
    }
} else {
    print "<p class='text-center mt-4'>Nenhum registro encontrado</p>";
}

?>







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
          
            max-height:700px;
        }
            
       body{
           background-color: gray;
       } 
       #PBASE{
        display:none;
       }

    </style>
</head>
<body>

   
<nav class="navbar bg-dark navbar-dark navbar-expand-sm py-3 sticky-top">

<div class="container">


    <a class="navbar-brand " href="#">
        Logo
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



        </ul>
    </div>

</div>
</nav>





 
    
    
   




<?php
            



print '</div class="row">';
print ' <form method="post"  action="?op=PBASE">';
    print '<div class="container mt-4">';
            print '<div class="row">';

                print '  <div class="col-sm-2">';
                    print '<p class="card-text"> <label for="buscaPBase" class= "col-form-label"  >Busca por base : </p>';
                print ' </div>';

                print '  <div class="col-sm-3">';
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
                print ' </div>';


                print '  <div class="col-sm-2">';
                    print '<p class="card-text"> <label for="buscaPDespesa" class= "col-form-label"  >Busca por Despesa: </p>';
                print ' </div>';


                print '  <div class="col-sm-3">';
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
                print ' </div>';
                
            print '<div class="col-sm-2">';
                print ' <button type=" submit"  class=" btn btn-primary" >Submit</button>';
            print '</div>';

            print '</div class="row">';
        print '</div class="col">';
    print ' </div  class="container mt-4">';
print ' </form>';





$operacao = $_REQUEST["op"];
if ($operacao== "a")
{
    
    print "<div id='gen' class='container mt-4'> ";
    print " <div class='row'> ";
    print "<div class='col'> ";
   

    
        include("../controller/LancamentoController.php");
        $res = LancamentoController::listarLancamento();
        
        $qtd = $res->rowCount();
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
            echo '<th scope="col">Ação</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
    
            while ($row = $res->fetch(PDO::FETCH_OBJ)) {
                include_once("../controller/BaseController.php");
                include_once("../controller/DespesaController.php");
                $resB = baseController::resgataPorID($row->idBase);
                $rowb = $resB->fetch(PDO::FETCH_OBJ);
    
                $resD = despesaController::resgataPorID($row->idDespesa);
                $rowD = $resD->fetch(PDO::FETCH_OBJ);
    
                echo '<tr>';
                echo '<td>'.$row->idLancamento.'</td>';
                echo '<td>'.$row->idUsuario.'</td>';
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
                
                echo '<td ><button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=alterarLancamento&idLancamento='. $row->idLancamento . '\'">Alterar</button> ';
                echo "<button class='btn btn-danger' onclick=
                \"
                if(confirm('Tem certeza que deseja Alterar o Status?'))
                {
                location.href='../controller/processaDespesa.php?op=Excluir&idDespesa=".$row->idLancamento."';
                }
                else{
                    false
                }
                \">  Ativar / Desativar
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
        


}
else if ($operacao== "PBASE")
{ 


    $nome =$_REQUEST["buscaPBase"];
    $despesa =$_REQUEST["buscaPDespesa"];
    
    print "<div id='gen' class='container mt-4'> ";
    print " <div class='row'> ";
    print "<div class='col'> ";
    print "$nome ";print "$despesa ";
    
    
        include("../controller/LancamentoController.php");
        $resw = LancamentoController::listarLancamentoPbase($nome,$despesa);
        
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
            echo '<th scope="col">Data Cadastro</th>';
            echo '<th scope="col">Observação</th>';
            
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
    
                echo '<tr>';
                echo '<td>'.$row->idLancamento.'</td>';
                echo '<td>'.$row->idUsuario.'</td>';
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
                echo '<td ><button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=alterarLancamento&idLancamento='. $row->idLancamento . '\'">Alterar</button> ';
                echo "<button class='btn btn-danger' onclick=
                \"
                if(confirm('Tem certeza que deseja Alterar o Status?'))
                {
                location.href='../controller/processaDespesa.php?op=Excluir&idDespesa=".$row->idLancamento."';
                }
                else{
                    false
                }
                \">  Ativar / Desativar
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







}

?>


 <a onclick="location.href='?op=a'" style = "cursor: pointer" class="nav-link btn btn-primary btn-sm mb-3"> Limpar filtro</a>





<!-- ================================================================================= -->







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


<script src="../jquery-3.7.1.js"></script>


</body>
</html>

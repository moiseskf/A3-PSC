<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Listar Automóveis</title>
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
    background-color:#F7F7F2;
   } 
   #logo{
    max-width:100px;
    background-color:white;
   }
   .navbar{
        background-color: yellow; 
    }

    strong{
        color: black;
        font-size:1.2em
    }
    .card{
        background-color: #f0f2f1;
        color:black;
        border:2px solid black;
        border-radius:20px;
        min-height:500px;
    }
    #listarCredores ,#listarBases, #listarDespesas, #listarLancamentos{

        display: none;
    }
    span{
        text-decoration: underline;
    }
    #botoes{
        padding: 10px;
        display: flex;
        justify-content: space-between;
        
    }
    .botoes{
        border-radius:14px;
        background-color:#2F2F2F;
        color:white;
        border:0px;
        color:
    }
    .btn{
        padding: 10px;
    }
    .botoes:hover{
        color:black;
        background-color:#3F7CAC;
    }      
    .btn:hover{
            color:black;
            background-color:lightblue;
        }

</style>


<nav class="navbar bg-dark navbar-dark navbar-expand-sm py-3 sticky-top ">

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
                <a href="../index.html" class=" nav-link btn btn-primary btn-sm mb-3"> Inicio
                </a>
         
            </li>
            <li class="nav-item">
                        <a onclick="location.href='../view/pesquisaAnc.php?op=a'" style = "cursor: pointer" class="nav-link btn btn-primary btn-sm mb-3"> Pesquisa Avançada</a>
            </li>
            <li class="nav-item">
                <div class="dropdown  ">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Ações</a>
                    <ul class="dropdown-menu text-center dropdown-menu-end">
                
                        <li><a onclick="location.href='../view/formBase.php?op=Incluir&idBase=1'"  style = "cursor: pointer" class="dropdown-item">Cadastrar</a></li>
                        <li><a class="dropdown-item active">Listar </a></li>
                        
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




<div class="container" id="botoes">
    
    <button class="btn btn-primary btn-sm mb-3 botoes"  id="btnListBase"> Listar Base </button>

    <button class="btn btn-primary btn-sm mb-3 botoes"  id="btnListCredor"> Listar Credor </button>

    <button class="btn btn-primary btn-sm mb-3 botoes"  id="btnListDespesas"> Listar Despesas </button>

    <button class="btn btn-primary btn-sm mb-3 botoes"  id="btnListLancamentos"> Listar Lançamentos </button>
    
</div class="container" id="botoes">

<div id="listarBases" class="container">
    <?php


    include("../controller/baseController.php");
    include("../controller/usuarioController.php");
   

    $res = baseController::listarBase();
    $qtd = $res->rowCount();


    if ($qtd > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead class="thead-light">';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nome Base</th>';
        echo '<th scope="col">Ativo</th>';
        echo '<th scope="col">Responsavel base</th>';
        echo '<th scope="col">Telefone</th>';
        echo '<th scope="col">Celular</th>';
        echo '<th scope="col">Email base</th>';
        echo '<th scope="col">Cadastro</th>';
        echo '<th scope="col">Usuario </th>';
        echo '<th scope="col"> Ação</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            $resB = usuarioController::resgataPorID($row->idUsuario);
            $rowb = $resB->fetch (PDO:: FETCH_OBJ);
            echo '<tr>';
            echo '<td>'.$row->idBase.'</td>';
            echo '<td>'.$row->nomeBase.'</td>';
            echo '<td>'.$row->ativo .'</td>';
            echo '<td>'. $row->responsavelBase .'</td>';
            echo '<td>'. $row->telefoneBase .'</td>';
            echo '<td>'.$row->celularBase .'</td>';
            echo '<td>'.$row->emailBase.'</td>';
            echo '<td>'.$row->dataCadastro .'</td>';

            echo '<td>'.$rowb->nomeUsuario .'</td>';
            echo '<td ><button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=Alterar&idBase='. $row->idBase . '\'">Alterar</button> ';
            //echo '<button class="btn btn-danger ml-2" onclick="confirmDelete('. $row->idBase .')">Excluir</button></td>';
            echo "<button class='btn btn-danger' onclick=
            \"
            if(confirm('Tem certeza que deseja Alterar o Status?'))
            {
            location.href='../controller/processaBase.php?op=Excluir&idBase=".$row->idBase."';
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

    ?>
</div>






<div id="listarCredores" class="container">
    <?php



    include("../controller/CredorController.php");
  
    $res = CredorController::listarCredor();
    $qtd = $res->rowCount();
    //$qtd = $resw->rowCount();
    if ($qtd > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead class="thead-light">';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nome credor</th>';
        echo '<th scope="col">Ativo</th>';
        echo '<th scope="col">Responsavel</th>';
        echo '<th scope="col">Telefone</th>';
        echo '<th scope="col">Celular</th>';
        echo '<th scope="col">Cadastro</th>';
        echo '<th scope="col">Usuario</th>';
        echo '<th scope="col"> Ação</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {


            echo '<tr>';
            echo '<td>'.$row->idCredor.'</td>';
            echo '<td>'.$row->nomeCredor.'</td>';
            echo '<td>'.$row->ativo .'</td>';
            echo '<td>'.$row->responsavelCredor .'</td>';
            echo '<td>'.$row->telefoneCredor.'</td>';
            echo '<td>'.$row->celularCredor .'</td>';
            echo '<td>'.$row->dataCadastro.'</td>';
            $resB = usuarioController::resgataPorID($row->idUsuario);
            $rowb = $resB->fetch (PDO:: FETCH_OBJ);
            echo '<td>'.$rowb->nomeUsuario .'</td>';
            echo '<td ><button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=AlterarCredor&idCredor='. $row->idCredor . '\'">Alterar</button> ';
            echo "<button class='btn btn-danger' onclick=
            \"
            if(confirm('Tem certeza que deseja Alterar o Status?'))
            {
            location.href='../controller/processaCredor.php?op=Excluir&idCredor=".$row->idCredor."';
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


   
    ?>
</div>





<div id="listarDespesas" class="container">
    <?php
    include("../controller/DespesaController.php");

    $res = DespesaController::listarDespesa();
    $qtd = $res->rowCount();

    if ($qtd > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead class="thead-light">';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Nome Despesa</th>';
        echo '<th scope="col">Ativo</th>';
        echo '<th scope="col">Credor</th>';
        
        echo '<th scope="col">DataCadastro</th>';
        echo '<th scope="col">Usuario</th>';
        echo '<th scope="col"> Ação</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {

            $resB = credorController::resgataPorID($row->idCredor);
            $rowb = $resB->fetch (PDO:: FETCH_OBJ);



            echo '<tr>';
            echo '<td>'.$row->idDespesa.'</td>';
            echo '<td>'.$row->nomeDespesa.'</td>';
            echo '<td>'.$row->ativo .'</td>';
            echo '<td>'. $rowb->nomeCredor .'</td>';
            echo '<td>'.$row->dataCadastro .'</td>';
            $resB = usuarioController::resgataPorID($row->idUsuario);
            $rowb = $resB->fetch (PDO:: FETCH_OBJ);
            echo '<td>'.$rowb->nomeUsuario .'</td>';
            echo '<td ><button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=AlterarDespesa&idDespesa='. $row->idDespesa . '\'">Alterar</button> ';
            echo "<button class='btn btn-danger' onclick=
            \"
            if(confirm('Tem certeza que deseja Alterar o Status?'))
            {
            location.href='../controller/processaDespesa.php?op=Excluir&idDespesa=".$row->idDespesa."';
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


    ?>
</div>


<div id="listarLancamentos" class="container">
    <?php
    include("../controller/LancamentoController.php");

    $res = LancamentoController::listarLancamento();
    $qtd = $res->rowCount();

    if ($qtd > 0) {

        $count = 0;

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
          
            if ($count % 4 == 0) {
                print '<div class="row mb-3">';
            }

            
            echo '<div class="col-sm-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';

            $resB = baseController::resgataPorID($row->idBase);
            $rowb = $resB->fetch (PDO:: FETCH_OBJ);

            $resD = despesaController::resgataPorID($row->idDespesa);
            $rowD = $resD->fetch (PDO:: FETCH_OBJ);
            $resB = usuarioController::resgataPorID($row->idUsuario);
            $rowG = $resB->fetch (PDO:: FETCH_OBJ);
        
          
            echo '<h5 class="card-title"><strong>Id Lancamento:</strong>  ' . $row->idLancamento . '</h5>';
            echo '<h6 class="card-subtitle"><strong>Id Lancamento: </strong>  </h6>';
            print '<hr>';
            echo '<p class="card-text"><span class="contss">Usuario:</span> ' . $rowG->nomeUsuario  . '</p>';
            echo '<p class="card-text"><span class="contss"> Base:</span> ' . $rowb->nomeBase . '</p>';
            echo '<p class="card-text"><span class="contss">Despesa:</span>' . $rowD->nomeDespesa. '</p>';
            echo '<p class="card-text"><span class="contss">competencia Despesa:</span> ' . $row->competenciaDespesa . '</p>';
            echo '<p class="card-text"><span class="contss">Data Vencimento</span> '. $row->dataVencimento . '</p>';
            echo '<p class="card-text"><span class="contss">Valor liquido</span> '. $row->valorLiquido . '</p>';
            echo '<p class="card-text"><span class="contss">Valor Multa:</span> '. $row->valorMulta . '</p>';
            echo '<p class="card-text"><span class="contss">Valor Correcao:</span> '. $row->valorCorrecao . '</p>';
            echo '<p class="card-text"><span class="contss">Data Cadastro:</span> '. $row->dataCadastro . '</p>';
            echo '<p class="card-text"><span class="contss">Observacao:</span> '. $row->observacao . '</p>';
           
            echo '<button class="btn btn-primary" onclick="location.href=\'../view/formAlterar.php?op=alterarLancamento&idLancamento='. $row->idLancamento . '\'">Alterar</button>';
            echo '<button class="btn btn-danger ml-2" onclick="confirmDelete('. $row->idLancamento .')">Excluir</button>';

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
</div>







<script src="../jquery-3.7.1.js"></script>


<script>
    $(document).ready(function () {
    $('#btnListBase').click(function () {
        $("#listarCredores").hide();
        $('#listarDespesas').hide();
        $('#listarLancamentos').hide();
        $('#listarBases').show();

    });

})
$(document).ready(function () {
    $('#btnListDespesas').click(function () {
        $("#listarCredores").hide();
        $('#listarBases').hide();
        $('#listarLancamentos').hide();
        $('#listarDespesas').show();
        
    });

})

$(document).ready(function () {
    $('#btnListCredor').click(function () {
        $("#listarBases").hide();
        $('#listarDespesas').hide();
        $('#listarLancamentos').hide();
        $('#listarCredores').show();

    });

})
$(document).ready(function () {
    $('#btnListLancamentos').click(function () {
        $("#listarBases").hide();
        $('#listarDespesas').hide();
        $('#listarCredores').hide();
        $('#listarLancamentos').show();

    });

})



</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>




</body>
</html>
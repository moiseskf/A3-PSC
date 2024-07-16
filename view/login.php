<?php

session_start();

include_once '../dao/Conexao.php';
$conex = new Conexao();
$conex->fazConexao();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $username = $_POST['username'];
    $password = $_POST['senhaUsuario'];

    
    $stmt = $conex->conn->prepare("SELECT * FROM usuario WHERE loginUsuario = ? and ativo ='S'");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // if ($user && password_verify($password, $user['senhaUsuario']))
    if ($user && password_verify($password, $user['senhaUsuario'])) {
    
        $_SESSION['user_id'] = $user['idUsuario'];
        $_SESSION['username'] = $user['nomeUsuario'];
        header('Location: formListarBase.php');
        exit();
    } else {
        
        $error = 'Nome de usuário ou senha inválidos';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<style>
   body{
    font-size:1.5em;
    background-color: gray;
   } 
   .card{
    background-color:gray;

   }
   #regs{
    color:white;
    text-decoration:none;
   }
</style>


<div id='login' class='text-center container'>

   <br>

    <div class='card mx-auto' style='max-width: 300px;'>




        <div class="card-body ">
        <h5 class="card-title"><strong>Login</strong></h5>
        <h6 class="card-subtitle"><strong>Faça seu login</strong></h6>

        <form method="POST">

        <p class="card-text"> <label for="soginUsuario" class= "col-form-label"  >Login usuario
        <input type="text" name="username" required class='form-control'>

        <p class="card-text"> <label for="senhaUsuario" class= "col-form-label"  >Senha usuario
        <input type="password" name="senhaUsuario" required class='form-control'>
      
        <button class="btn button" type="submit">Entrar</button>
  

        </form>
        </div> 

        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <hr>
        <a  id="regs" href="registrarUsuario.php">Registrar</a>
    </div>

</div>
<div class="row">
            
    <div class="col-sm-2">
        <p class="card-text"> <label for="buscaPBase" class= "col-form-label"  ></p>
    </div>

</div class="row">



</body>
</html>

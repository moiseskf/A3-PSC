<?php

session_start();
include_once '../dao/Conexao.php';
$conex = new Conexao();
$conex->fazConexao();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['nomeUsuario'];
    $login = $_POST['loginUsuario'];
    $password = $_POST['senhaUsuario'];
    $password_confirm = $_POST['senhaUsuarioR'];
    $email = $_POST['emailUsuario'];
    $telefone = $_POST['telefoneCelular'];
    $perfil = 1;
    $ativo = $_POST['ativo'];
    $cad = date('Y-m-d h:i:s');

    if ($password !== $password_confirm) {
      
        $error = 'As senhas não coincidem.';
    } else {
       
        $stmt = $conex->conn->prepare("SELECT * FROM usuario WHERE loginUsuario = ?");
      
        $stmt->execute([$login]);
       
        if ($stmt->fetch()) {
            
            $error = 'Nome de usuário já existe.';
        } else {
           
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
         
            $stmt = $conex->conn->prepare("INSERT INTO usuario (idPerfil,nomeUsuario,emailUsuario, loginUsuario,senhaUsuario,dataCadastro,telefoneCelular,ativo)
             VALUES (?, ?,?, ?,?, ?,?, ?)");
            
            if ($stmt->execute([$perfil,$username,$email,$login, $hashed_password,$cad,$telefone,$ativo])) {
                
                $success = 'Usuário registrado com sucesso. Você pode fazer login agora.';
            } else {
                
                $error = 'Erro ao registrar o usuário. Tente novamente.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registro de Novo Usuário</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <body>
    <style>
   body{
    
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
    
     <h6 class="card-subtitle"><strong>Faça seu Cadastro</strong></h6>

     <form method="POST">

     <p class="card-text"> <label for="nomeUsuario" class= "col-form-label"  >Nome usuario
     <input type="text" name="nomeUsuario" required class='form-control'>

     
     <p class="card-text"> <label for="emailUsuario" class= "col-form-label"  >E-mail usuario
     <input type="text" name="emailUsuario" required class='form-control'>

     <p class="card-text"> <label for="telefoneCelular" class= "col-form-label"  >Telefone Celular
     <input type="text" name="telefoneCelular" required class='form-control'>

     <p class="card-text"> <label for="loginUsuario" class= "col-form-label"  >Login usuario
     <input type="text" name="loginUsuario" required class='form-control'>

     <p class="card-text"> <label for="senhaUsuario" class= "col-form-label"  >Senha usuario
     <input type="password" name="senhaUsuario" required class='form-control'>

     <p class="card-text"> <label for="senhaUsuarioR" class= "col-form-label"  >Repita a senha
     <input type="password" name="senhaUsuarioR" required class='form-control'>

    
     <input type="hidden" name="ativo"  value='S'>
     <button class="btn button" type="submit">Registrar</button>


     </form>
     </div> 

     <?php if (isset($error)): ?>
         <p style="color:red;"><?php echo $error; ?></p>
     <?php endif; ?>

     <hr>
     <a  id="regs" href="login.php">login</a>
 </div>

</div>





    </body>
</html>

<?php

include_once("conexao.php");

session_start(); 
$_SESSION['logado'] = $_SESSION['logado'] ?? false;



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="shortcut icon" href="img/computer.ico" type="image/x-icon">  
    <script src="login.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <h2>Login</h2>
 

<?php


$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";

$login = "SELECT nome, senha FROM user";
$conecta = mysqli_query($conexao, $login);

$exibirRegistros = mysqli_fetch_array($conecta);

$nome = $exibirRegistros[0];
$senha = $exibirRegistros[1]; 

if($username == $nome && $password == $senha ){

    $_SESSION['logado'] = true;   
    header('Location: ramal.php');

}else{
   
    header('Location: login_erro.html');
    
}      
    
?>

</main>
</body>
</html>


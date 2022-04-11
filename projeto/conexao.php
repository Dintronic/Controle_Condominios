<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "condominio";
$conexao = mysqli_connect ($hostname, $user, $password, $database);

if (!$conexao) {
    print "Falha na Conexão";
}

?>
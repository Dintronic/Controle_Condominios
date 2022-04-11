<?php

session_start();
if($_SESSION['logado'] == false) {
    header('Location: index.html');
}  

include_once("conexao.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="materialize\css\materialize.css">
    <link rel="stylesheet" href="style.css">
    <title>Ramais</title>
</head>
<body>

    <header>
        <div class="row">
            <div class="col s12"><h5>Condomínio Residencial</h5></div>  
        </div>              
    </header>

    <main>  
        <div class="container ">

            <div class="row">

                <div class="col s3">
                </div>

                <div class="col s5 l2">

                    <?php
                        $sql = "SELECT * FROM ramal WHERE situacao LIKE 'Teste'";
                        $consulta = mysqli_query($conexao, $sql);
                        $registros = mysqli_num_rows($consulta);

                        print "<div id='scale-demo' class='btn-floating btn-small scale-transition yellow preto'>
                        $registros</div> Em Teste";
                    ?>              
                </div> 

                <div class="col s5 l2">

                    <?php
                        $sql = "SELECT * FROM ramal WHERE situacao LIKE 'Defeito'";
                        $consulta = mysqli_query($conexao, $sql);
                        $registros = mysqli_num_rows($consulta);

                        print "<div id='scale-demo' class='btn-floating btn-small scale-transition red'>
                        $registros</div> Com Defeito";                 
                    ?> 
                </div> 

                <div class="col s5 l2">

                    <?php
                        $sql = "SELECT * FROM ramal WHERE situacao LIKE 'Sem Conserto'";
                        $consulta = mysqli_query($conexao, $sql);
                        $registros = mysqli_num_rows($consulta);

                        print "<div id='scale-demo' class='btn-floating btn-small scale-transition indigo accent-1 preto'>
                        $registros</div> Sem Conserto";                 
                    ?> 
                </div> 

            </div>  

            
            </div> 
    </main>

    <script src="materialize\js\materialize.js"></script>
    <script src="materialize\js\jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    
</body>
</html>
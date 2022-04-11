<?php

include_once("base.php");

$ramal = $_GET['ramal'];
$nome = $_GET['nome'];
$data_entrada= $_GET['data_entrada'];
$reclamacao = $_GET['reclamacao'];
$defeito = $_GET['defeito'];
$reparo = $_GET['reparo'];
$data_fechamento = $_GET['data_fechamento'];
$observacao = $_GET['observacao'];
$situacao = $_GET['situacao'];

$sql = "INSERT into ramal (ramal,nome,data_entrada,reclamacao,defeito,reparo,data_fechamento,observacao,situacao) values ('$ramal','$nome','$data_entrada','$reclamacao','$defeito','$reparo','$data_fechamento','$observacao','$situacao')";

$salvar = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

?>

<main>  
    <div class="container ">

        <div class="row">
        <div class="input-field col s12 l12"><h5>Salvar Chamado</h5></div>
        </div>       
        
        <div class="row">
        <div class="input-field col s12 l12">    
        <?php        

            if($linhas == 1){
                print "<p style='color:green; font-size: 18px;'>Cadastro efetuado com sucesso!</p><br><br>";
                
            }else{
                print "<p style='color:red; font-size: 18px'>Cadastro não efetuado. <br><br> Errp ao Conectar com o Banco!</p>";                
            }
        ?>

        <a href="ramal.php"><div class="btn blue">Voltar</div></a>
        </div>

        

    </div> 
</main>


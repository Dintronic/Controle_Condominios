<?php

include_once("base.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$excluir = "DELETE FROM ramal WHERE id = '$id'";
$resultado_usuario = mysqli_query($conexao, $excluir);

?>

<main>  
    <div class="container ">

        <div class="row">
        <div class="input-field col s12 l12"><h5>Deleta Chamado</h5></div>
        </div>       
        
        <div class="row">
        <div class="input-field col s12 l12"> 

        <?php
        
            if(mysqli_affected_rows($conexao)){
                echo "<p style='color:green; font-size: 18px'> Cadastro Deletado com Sucesso</p>";				
                
            }else{
                echo "<p style='color:red; font-size: 18px'>Erro ao Conectar com o Banco</p>";               
            }
        ?>

        <a href="ramal.php"><div class="btn blue">Voltar</div></a>
        </div>

        

    </div> 
</main>


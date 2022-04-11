<?php

include_once("base.php");

$id = $_GET['id'];
$ramal = $_GET['ramal'];
$nome = $_GET['nome'];
$data_entrada= $_GET['data_entrada'];
$reclamacao = $_GET['reclamacao'];
$defeito = $_GET['defeito'];
$reparo = $_GET['reparo'];
$data_fechamento = $_GET['data_fechamento'];
$observacao = $_GET['observacao'];
$situacao = $_GET['situacao'];

$sql = "UPDATE ramal SET ramal='$ramal', nome='$nome', data_entrada='$data_entrada', reclamacao='$reclamacao', defeito='$defeito', reparo ='$reparo', data_fechamento='$data_fechamento', observacao='$observacao', situacao='$situacao' WHERE id='$id'";

$salvar = mysqli_query($conexao, $sql);

?>

<main>  
    <div class="container ">

        <div class="row">
        <div class="input-field col s12 l12"><h5>Salva Chamado</h5></div>
        </div>       
        
        <div class="row">
        <div class="input-field col s12 l12">    
        <?php        

        if(mysqli_affected_rows($conexao)){
                print "<p style='color:green; font-size: 18px;'>Cadastro editado com sucesso!</p><br><br>";
                
            }else{
                print "<p style='color:red; font-size: 18px'>Cadastro não editado. <br><br> Erro ao Conectar com o Banco!</p>";                
            }
        ?>

        <a href="ramal.php"><div class="btn blue">Voltar</div></a>
        </div>

        

    </div> 
</main>


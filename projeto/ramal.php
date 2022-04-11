<?php

include_once("base.php");

$filtro_ramal = "ramal";
$palavra = "";

//Script para mander a seleção do select filtro_ramal
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['filtro_ramal'])) {
    $filtro_ramal = $_POST['filtro_ramal'];
    $_SESSION['filtro_ramal'] = $_POST['filtro_ramal'];
} elseif (isset($_SESSION['filtro_ramal'])) {
    $filtro_ramal = $_SESSION['filtro_ramal'];
}

//Script para mander a seleção do select palavra
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['palavra'])) {
    $palavra = $_POST['palavra'];
    $_SESSION['palavra'] = $_POST['palavra'];
} elseif (isset($_SESSION['palavra'])) {
    $palavra = $_SESSION['palavra'];
}

//Script para mostrar o filtro_ramal selecionado

if($filtro_ramal == "nome"){
    $filtro_ramal_select = "Nome";

}elseif($filtro_ramal == "reclamacao"){
    $filtro_ramal_select = "Reclamação";

}elseif($filtro_ramal == "defeito"){
    $filtro_ramal_select = "Defeito";

}elseif($filtro_ramal == "reparo"){
    $filtro_ramal_select = "Reparo";

}elseif($filtro_ramal == "situacao"){
    $filtro_ramal_select = "Situação";

}else{
    $filtro_ramal_select = "Ramal";
}

?>
    <main>  
        <div class="container ">          

            <div class="col s1 l4">
            </div>
                        
                <div class="row">

                    <div class="col s1 l1">
                    </div>

                    <div class="input-field col s3 l3">

                        <form method="POST">

                            <select class="form-select" name="filtro_ramal" required onchange="this.form.submit()">
                                <?php
                                    echo '<option value="' . $filtro_ramal . '" disabled selected>' . ((empty($filtro_ramal)) ?: $filtro_ramal_select) . '</option>';
                                ?>
                                <option value="ramal">Ramal</option>
                                <option value="nome">Nome</option>
                                <option value="reclamacao">Reclamação</option>
                                <option value="defeito">Defeito</option>
                                <option value="reparo">Reparo</option>
                                <option value="situacao">Status</option>
                            </select>
                            <label>Filtro:</label>

                        </form> 
                    </div> 

                    <form method="POST">

                        <div class="input-field col s3 l3">
                            <i class="material-icons prefix">search</i>
                            <input type="text" id="autocomplete-input" class="autocomplete" name="palavra" 
                            value="<?php  echo $palavra; ?>">
                            <label for="autocomplete-input">Pesquisa</label>
                        </div> 
                        
                                    
                        <div class="input-field col s2 l2">                    
                            <input type="submit" value="Pesquisar" class="btn blue">
                        </div> 
                                    
                        <div class="input-field col s2 l2" >                    
                            <a href="cadastra.php"><div class="btn">Cadastrar</div></a>
                        </div> 
                    </form>

                </div>
                                
                
                    <?php    

                        //Receber o número da página
                        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                        
                        //Setar a quantidade de itens por pagina
                        $qnt_result_pg = 10;
                        
                        //calcular o inicio visualização
                        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                
                        //Consulta Banco
                        $sql = "SELECT * FROM ramal WHERE $filtro_ramal LIKE '%$palavra%' ORDER BY situacao = 'OK' , data_entrada DESC LIMIT $inicio, $qnt_result_pg";
                        $consulta = mysqli_query($conexao, $sql);
                        $registros = mysqli_num_rows($consulta);
                        
                        echo "<table class='centered highlight responsive-table'>";

                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Ramal</th>";
                        echo "<th>Nome</th>";
                        echo "<th>Data</th>";
                        echo "<th>Reclamação</th>";
                        echo "<th>Defeito Encontado</th>";
                        echo "<th>Reparo Realizado</th>";
                        echo "<th>Concluído</th>";
                        echo "<th>Observação</th>";
                        echo "<th>Status</th>";
                        echo "<th>Editar</th>";
                        echo "</tr>";
                        echo "</thead>";

                        print "<tbody>";
                        
                
                        while($exibirRegistros = mysqli_fetch_array($consulta)){
                
                            $id = $exibirRegistros[0];
                            $ramal = $exibirRegistros[1];
                            $nome = $exibirRegistros[2];
                            $data_entrada = $exibirRegistros[3];
                            $data_entrada_br = date('d/m/Y', strtotime($data_entrada));
                            $reclamacao = $exibirRegistros[4];
                            $defeito = $exibirRegistros[5];     
                            $reparo = $exibirRegistros[6]; 
                            $data_fechamento = $exibirRegistros[7]; 
                            $data_fechamento_br = date('d/m/Y', strtotime($data_fechamento));
                            $observacao = $exibirRegistros[8]; 
                            $situacao = $exibirRegistros[9]; 
                                
                            if($situacao =='Teste'){

                                print "<tr>";                                 
                                print "<td class='teste'>$ramal</td>";

                                if($nome == ""){
                                    print "<td class='teste'>-</td>";
                                }else{
                                    print "<td class='teste'>$nome</td>";
                                } 

                                print "<td class='teste'>$data_entrada_br</td>";
                                print "<td class='teste'>$reclamacao</td>";
                                
                                if($defeito == ""){
                                    print "<td class='teste'>-</td>";
                                }else{
                                    print "<td class='teste'>$defeito</td>";
                                } 

                                if($reparo == ""){
                                    print "<td class='teste'>-</td>";
                                }else{
                                    print "<td class='teste'>$reparo</td>";
                                } 

                                print "<td class='teste'>$data_fechamento_br</td>";

                                if($observacao == ""){
                                    print "<td class='teste'>-</td>";
                                }else{
                                    print "<td class='teste'>$observacao</td>";
                                }                         

                                print "<td class='teste'>$situacao</td>";
                                print "<td class='teste'><a class='edita' href='edita.php?id=" . $id . "'> Editar </a></td>";
                                print "</tr>"; 

                            }elseif($situacao =='Defeito'){   

                                print "<tr>";                                 
                                print "<td class='defeito'>$ramal</td>";
                                
                                if($nome == ""){
                                    print "<td class='defeito'>-</td>";
                                }else{
                                    print "<td class='defeito'>$nome</td>";
                                } 

                                print "<td class='defeito'>$data_entrada_br</td>";
                                print "<td class='defeito'>$reclamacao</td>";
                                
                                if($defeito == ""){
                                    print "<td class='defeito'>-</td>";
                                }else{
                                    print "<td class='defeito'>$defeito</td>";
                                } 

                                if($reparo == ""){
                                    print "<td class='defeito'>-</td>";
                                }else{
                                    print "<td class='defeito'>$reparo</td>";
                                } 

                                print "<td class='defeito'>$data_fechamento_br</td>";
                                
                                if($observacao == ""){
                                    print "<td class='defeito'>-</td>";
                                }else{
                                    print "<td class='defeito'>$observacao</td>";
                                }

                                print "<td class='defeito'>$situacao</td>";
                                print "<td class='defeito'><a class='edita' href='edita.php?id=" . $id . "'> Editar </a></td>";
                                print "</tr>"; 

                            }elseif($situacao =='Sem Conserto'){   

                                print "<tr>";                                 
                                print "<td class='sem_concerto'>$ramal</td>";
                                
                                if($nome == ""){
                                    print "<td class='sem_concerto'>-</td>";
                                }else{
                                    print "<td class='sem_concerto'>$nome</td>";
                                } 

                                print "<td class='sem_concerto'>$data_entrada_br</td>";
                                print "<td class='sem_concerto'>$reclamacao</td>";
                                
                                if($defeito == ""){
                                    print "<td class='sem_concerto'>-</td>";
                                }else{
                                    print "<td class='sem_concerto'>$defeito</td>";
                                } 

                                if($reparo == ""){
                                    print "<td class='sem_concerto'>-</td>";
                                }else{
                                    print "<td class='sem_concerto'>$reparo</td>";
                                } 

                                print "<td class='sem_concerto'>$data_fechamento_br</td>";
                                
                                if($observacao == ""){
                                    print "<td class='sem_concerto'>-</td>";
                                }else{
                                    print "<td class='sem_concerto'>$observacao</td>";
                                }

                                print "<td class='sem_concerto'>$situacao</td>";
                                print "<td class='sem_concerto'><a class='edita' href='edita.php?id=" . $id . "'> Editar </a></td>";
                                print "</tr>"; 
                                
                            }else{

                                print "<tr>";     
                                print "<td> $ramal </td>";
                                
                                if($nome == ""){
                                    print "<td>-</td>";
                                }else{
                                    print "<td>$nome</td>";
                                } 

                                print "<td> $data_entrada_br </td>";
                                print "<td> $reclamacao </td>";
                                
                                if($defeito == ""){
                                    print "<td>-</td>";
                                }else{
                                    print "<td>$defeito</td>";
                                } 

                                if($reparo == ""){
                                    print "<td>-</td>";
                                }else{
                                    print "<td>$reparo</td>";
                                } 

                                print "<td> $data_fechamento_br </td>";
                                
                                if($observacao == ""){
                                    print "<td>-</td>";
                                }else{
                                    print "<td>$observacao</td>";
                                }

                                print "<td> $situacao </td>";
                                print "<td><a class='edita' href='edita.php?id=" . $id . "'> Editar </a></td>";
                                print "</tr>"; 

                            } 
                                            
                        }              
                            print "</tbody>";
                            print "</table>"; 
                            print "<br>"; 

                    ?>
            
                    <div class="row">

                        <div class="col s12">

                            <?php
                                //Consulta Banco
                                $sql = "SELECT * FROM ramal WHERE $filtro_ramal LIKE '%$palavra%' ORDER BY data_entrada DESC";
                                $consulta = mysqli_query($conexao, $sql);
                                $registros = mysqli_num_rows($consulta);
                            
                                print "<strong>$registros</strong> Registros Encontrados!";
                        
                            ?>
                        
                        </div>
                    </div>

                    <div class="row">

                        <div class="col s12">

                            <ul class="pagination">
                            
                                <?php
                                
                                    //Paginação - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id) AS num_result FROM ramal WHERE $filtro_ramal LIKE '%$palavra%' ";
                                    $resultado_pg = mysqli_query($conexao, $result_pg);
                                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                                    
                                    //Quantidade de pagina 
                                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                                
                                    //Limitar os link antes depois
                                    $max_links = 1;
                                    echo "<li class='waves-effect'><a href='ramal.php?pagina=1'>Primeira</a></li>";
                                    
                                    //Mostra paginas anteriores
                                    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                        if($pag_ant >= 1){
                                            echo "<li class='waves-effect'><a href='ramal.php?pagina=$pag_ant'><i class='material-icons'>chevron_left</i></a></li>";
                                        }    
                                    }     
                                    
                                    //Mostra pagina Atual
                                    echo "<li class='active'><a href='#'>$pagina</a></li>";         
                                    
                                
                                    //Mostra paginas depois
                                    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                        if($pag_dep <= $quantidade_pg){
                                            echo "<li class='waves-effect'><a href='ramal.php?pagina=$pag_dep'><i class='material-icons'>chevron_right</i></a></li>";
                                        }
                                    }
                                    
                                    //Mostra Ultima pagina
                                    echo "<li class='waves-effect'><a href='ramal.php?pagina=$quantidade_pg'>Última</a></li>";
                            
                                ?>
                        </ul>
                    </div>
                </div>        
            </div> 
    </main>

    <footer>
        <div class="row">
            <div class="col s12">WD-Soluções</div> 
        </div>
    </footer>


    
    <script src="materialize\js\materialize.js"></script>
    <script src="jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

    <script>
        $(document).ready(function(){
        $('select').formSelect();
        });       
    </script>  
    
</body>
</html>
<?php

include_once("base.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM ramal WHERE id = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>

<main>
    <div class="container ">

        <div class="row">
            <div class="input-field col s12 l12">
                <h5>Cadastrar Chamado</h5>
            </div>
        </div>

        <form method="get" action="salvar_edicao.php">

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

                <div class="input-field col s3 l2 ">
                    <input type="number" id="autocomplete-input" class="autocomplete" name="ramal" min="4001" max="4410" value="<?php echo $row_usuario['ramal']; ?>">
                    <label for="autocomplete-input">Ramal:</label>
                </div>

                <div class="input-field col s4 l3">
                    <input id="input_text" type="text" data-length="30" class="autocomplete" name="nome" maxlength="30" value="<?php echo $row_usuario['nome']; ?>">
                    <label for="autocomplete-input">Nome:</label>
                </div>

                <div class="input-field col s4 l3">
                    <input type="date" id="autocomplete-input" class="autocomplete" name="data_entrada" value="<?php echo $row_usuario['data_entrada']; ?>">
                    <label for="autocomplete-input">Data:</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s5 l4">
                    <select name="reclamacao">
                        <option value="<?php echo $row_usuario['reclamacao']; ?>" default> <?php echo $row_usuario['reclamacao']; ?></option>
                        <option value="Mudo">Mudo</option>
                        <option value="Chiando">Chiando</option>
                        <option value="Reforma">Reforma</option>
                        <option value="Só Recebe">Só Recebe</option>
                        <option value="Instalação">Instalação</option>
                        <option value="Fio Quebrado">Fio Quebrado</option>
                        <option value="Só faz Ligação">Só faz Ligação</option>
                        <option value="Portaria Reclamou">Portaria Reclamou</option>
                    </select>
                    <label>Reclamação:</label>
                </div>

                <div class="input-field col s6 l4">
                    <select name="defeito">
                        <option value="<?php echo $row_usuario['defeito']; ?>" default> <?php echo $row_usuario['defeito']; ?></option>
                        <option value="Par Ruim">Par Ruim</option>
                        <option value="Cabo Rompido">Cabo Rompido</option>
                        <option value="Ligação Errada">Ligação Errada</option>
                        <option value="Cabo Danificado">Cabo Danificado</option>
                        <option value="Placa Danificada">Placa Danificada</option>
                        <option value="Caixa Interna Quebrada">Caixa Interna Quebrada</option>
                        <option value="Caixa Externa Quebrada">Caixa Externa Quebrada</option>
                        <option value="Não Constatado Defeito">Não Constatado Defeito</option>
                        <option value="Aparelho Telefônico Quebrado">Aparelho Telefônico Quebrado</option>
                        <option value="Cabo Rompido Prestador de Serviço">Cabo Rompido Prestador de Serviço</option>
                    </select>
                    </select>
                    <label>Defeito Encontrado:</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s6 l4">
                    <select name="reparo">
                        <option value="<?php echo $row_usuario['reparo']; ?>" default> <?php echo $row_usuario['reparo']; ?></option>
                        <option value="Trocado XT2">Trocado XT2</option>
                        <option value="Trocado Cabo">Trocado Cabo</option>                        
                        <option value="Trocado Placa">Trocado Placa</option>
                        <option value="Não Constatado Defeito">Não Constatado Defeito</option>
                        <option value="Refeita Ligação Interna">Refeita Ligação Interna</option>
                        <option value="Refeita Ligação Externa">Refeita Ligação Externa</option>
                        <option value="Trocado Caixinha Interna">Trocado Caixinha Interna</option>
                        <option value="Orientado a Trocar Aparelho Telefônico">Orientado a Trocar Aparelho Telefônico</option>
                    </select>
                    <label>Reparo Realizado:</label>
                </div>

                <div class="input-field col s5 l4">
                    <input id="input_text" type="text" data-length="80" class="autocomplete" name="observacao" value="<?php echo $row_usuario['observacao']; ?>" maxlength="80">
                    <label for="autocomplete-input">Observação:</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s4 l3">
                    <input type="date" id="autocomplete-input" class="autocomplete" name="data_fechamento" value="<?php echo $row_usuario['data_fechamento']; ?>">
                    <label for="autocomplete-input">Concluido:</label>
                </div>

                <div class="input-field col s2 l2">
                    <select name="situacao">
                        <option value="<?php echo $row_usuario['situacao']; ?>" default> <?php echo $row_usuario['situacao']; ?></option>
                        <option value="OK">OK</option>                        
                        <option value="Teste">Teste</option>
                        <option value="Defeito">Defeito</option>
                        <option value="Sem Conserto">Sem Conserto</option>
                    </select>
                    <label>Status:</label>
                </div>


                <div class="input-field col s4 l3">
                    <input type="submit" id="autocomplete-input" class="btn" value="Salvar">
                    <?php
                    
                        print "<a href='excluir.php?id=" . $id . "'><div class='btn red'>Excluir</div></a>";

                    ?>
                    <a href="ramal.php"><div class="btn blue">Voltar</div></a>
        
                </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });

        $(document).ready(function () {
            $('input#input_text, textarea#textarea2').characterCounter();
        });
    </script>

    </div>
</main>
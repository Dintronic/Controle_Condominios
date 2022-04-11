<?php

include_once("base.php");

?>

<main>
    <div class="container ">

        <div class="row">
            <div class="input-field col s12 l12">
                <h5>Cadastrar Chamado</h5>
            </div>
        </div>

        <form method="get" action="salvar.php">

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s3 l2 ">
                    <input type="number" id="autocomplete-input" class="autocomplete" name="ramal" min="4001" max="4410"
                        required>
                    <label for="autocomplete-input">Ramal:</label>
                </div>

                <div class="input-field col s4 l3">
                    <input id="input_text" type="text" data-length="30" class="autocomplete" name="nome" maxlength="30"
                        required>

                    <label for="autocomplete-input">Nome:</label>
                </div>

                <div class="input-field col s4 l3">
                    <input type="date" id="autocomplete-input" class="autocomplete" name="data_entrada" required>
                    <label for="autocomplete-input">Data:</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s5 l4">
                    <select name="reclamacao">
                        <option value=""></option>
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
                        <option value=""></option>
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
                    <label>Defeito Encontrado:</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s6 l4">
                    <select name="reparo">
                        <option value=""></option>
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
                    <input id="input_text" type="text" data-length="80" class="autocomplete" name="observacao"
                        maxlength="80">
                    <label for="autocomplete-input">Observação:</label>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s1 l2">
                </div>

                <div class="input-field col s4 l3">
                    <input type="date" id="autocomplete-input" class="autocomplete" name="data_fechamento">
                    <label for="autocomplete-input">Concluido:</label>
                </div>

                <div class="input-field col s2 l2">
                    <select name="situacao">
                        <option value="OK">OK</option>                        
                        <option value="Teste">Teste</option>
                        <option value="Defeito">Defeito</option>
                        <option value="Sem Conserto">Sem Conserto</option>
                    </select>
                    <label>Status:</label>
                </div>


                <div class="input-field col s4 l3">
                    <input type="submit" id="autocomplete-input" class="btn" value="Salvar">
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
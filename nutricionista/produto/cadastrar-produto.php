<?php

    require_once '../../funcoes-de-cabecalho.php';
    require_once '../../conexao.php';
    
    cabecalhoNutricionista('../../estilo/styleNutricionista.css', 'Cadastrar Produto', '../escola/', '../relatorio/', 'index.php', '../refeicao/', '../cardapio/', '../../login/logOut.php');
    
    $select = "select * from TipoDePeso";
    $select1 = "select * from TipoDeProduto";

    $query = mysqli_query($conexao, $select);
    $query1 = mysqli_query($conexao, $select1);
    
    sectionTop();
    
    ?>

<form method="post" action="validar-produto.php?acao=cadastrar">
    Nome <input type="text" required maxlength="64" name="nome"><br>
    Marca <input type="text" required maxlength="64" name="marca"><br>
    Peso <input type="text" name="peso"><br>
    Tipo de Peso <?php
                                echo "<select name='tipoDePeso'>";
                                    while($table = mysqli_fetch_array($query)){
                                        $id = $table['id'];
                                        $nome = $table['nomeTipoPeso'];

                                        echo "<option value=$id>$nome</option>";
                                    }
                                        echo "</select>";
                             ?><br>
    Tipo de Produto  <?php
                                echo "<select name='tipoDeProduto'>";
                                    while($table = mysqli_fetch_array($query1)){
                                        $id = $table['id'];
                                        $nome = $table['nomeTipoProduto'];

                                        echo "<option value=$id>$nome</option>";
                                    }
                                        echo "</select>";
                             ?><br><br>
                             <input type="submit" class="btn btn-dark m-2" value="Cadastrar Produto">
</form>

<br>
<a href="index.php">Voltar</a>

<?php
sectionBaixo();

rodape();





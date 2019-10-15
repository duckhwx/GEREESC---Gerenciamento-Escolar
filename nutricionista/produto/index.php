<?php

    require_once '../../conexao.php';
    require_once '../../funcoes-de-cabecalho.php';
    
    cabecalhoNutricionista('../../estilo/style.css', 'Produtos', '../escola/', '../relatorio/', '.', '../refeicao/', '../cardapio/', '../../login/logOut.php');
    
    sectionTop();
    
    $select = "select * from Produto";
    
    $query = mysqli_query($conexao, $select);
    
    echo '<table>';
    
        while($table = mysqli_fetch_array($query)){
            $id = $table['id'];
            $nome = $table['nomeProduto'];

            echo"$nome  "
                . "<a href='visualizar-produto.php?id=$id'>Visualizar</a>  "
                . "<a href='atualizar-produto.php?id=$id'>Atualizar</a>  "
                . "<a href='validar-produto.php?id=$id&acao=excluir'>Excluir</a>"
                . "<br>";

        }
    echo "</table>";
    ?>
    
    

<a href="cadastrar-produto.php" class="btn btn-dark">Cadastrar Produto</a>  <a href="TipoDeProduto/index.php" class="btn btn-dark">Tipo de Produto</a>
    
    
    <?php
    sectionBaixo();
    rodape();
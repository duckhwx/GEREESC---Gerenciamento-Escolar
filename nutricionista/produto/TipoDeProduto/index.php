<?php 
    require_once '../../../funcoes-de-cabecalho.php';
    require_once '../../../conexao.php';
    
    cabecalhoNutricionista('../../../estilo/styleNutricionista.css', 'Tipo de Produto', '../../escola/', '../../relatorio/', '../', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
    sectionTop();
    
    $select = "select * from Produto";
    
    $query = mysqli_query($conexao, $select);
    
    echo '<table>';
    
        while($table = mysqli_fetch_array($query)){
            $id = $table['id'];
            $nome = $table['nomeProduto'];

            echo"$nome  "
                . "<a href='visualizar-tipoDeProduto.php?id=$id'>Visualizar</a>  "
                . "<a href='atualizar-tipoDeProduto.php?id=$id'>Atualizar</a>  "
                . "<a href='validar-tipoDeProduto.php?id=$id&acao=excluir'>Excluir</a>"
                . "<br>";

        }
    echo "</table>";
    ?>
    
    

<a href="cadastrar-tipoDeProduto.php" class="btn btn-dark m-2">Cadastrar Tipo de Produto</a>
    
    
    <?php
    
    
    
    
    sectionBaixo();
    rodape();

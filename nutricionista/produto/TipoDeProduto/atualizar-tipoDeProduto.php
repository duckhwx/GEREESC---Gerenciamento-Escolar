<?php

    require_once '../../../funcoes-de-cabecalho.php';
    require_once '../../../conexao.php';
    
    cabecalhoNutricionista('../../../estilo/style.css', 'Atualizar Tipo de Produto', '../../escola', '../../relatorio', '../../produto', '../../cardapio','../../../login/logOut.php');
    
    $select = "select * from TipoDeProduto";

    $query = mysqli_query($conexao, $select);

    
    sectionTop();
    
    ?>

<form method="post" action="validar-tipoDeProduto.php?acao=atualizar">
    Nome <input type="text" required maxlength="64" name="nome"><br>
    <br>
        <input type="submit" class="btn btn-dark" value="Atualizar tipo de Produto">
</form>

<br>
<a href="index.php">Voltar</a>

<?php
sectionBaixo();

rodape();


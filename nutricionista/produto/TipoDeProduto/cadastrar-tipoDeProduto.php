<?php

    require_once '../../../funcoes-de-cabecalho.php';
    require_once '../../../conexao.php';
    
    cabecalhoNutricionista('../../../estilo/style.css', 'Cadastrar Tipo de Produto', '../../escola', '../../relatorio', '../../produto', '../../cardapio','../../../login/logOut.php');
    
    sectionTop();
    
    ?>

<form method="post" action="validar-tipoDeProduto.php?acao=cadastrar">
    Nome <input type="text" required maxlength="64" name="nome"><br>
    <br>
    <input type="submit" class="btn btn-dark" value="Cadastrar Tipo de Produto">
</form>

<br>
<a href="index.php">Voltar</a>

<?php
sectionBaixo();

rodape();





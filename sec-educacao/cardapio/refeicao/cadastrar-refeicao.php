<?php
require_once '../../../conexao.php';
require_once '../../../funcoes-de-cabecalho.php';


cabecalhoNutricionista("Usuários", "../../escola", "../../relatorio", "../../produto", "../index.php", "../../../login/deslogar");
?>
<br>
  
<form method="post" action="validar-refeicao.php?acao=cadastrar">
    Nome <input type="text" required name="nome" maxlength="64">
    <input type="submit" value="Cadastrar">
</form>

<a href="index.php">Voltar</a>

 <?php
 
 rodape();
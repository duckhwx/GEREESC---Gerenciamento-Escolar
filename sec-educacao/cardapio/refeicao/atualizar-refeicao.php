<?php
require_once '../../../conexao.php';
require_once '../../../funcoes-de-cabecalho.php';

$id = $_GET['id'];
cabecalhoNutricionista("Usuários", "../../escola", "../../relatorio", "../../produto", "../index.php", "../../../login/deslogar");
?>
<br>
  
<form method="post" action="validar-refeicao.php?acao=atualizar$id=<?=$id?>">
    Nome <input type="text" required name="nome" maxlength="64">
    <input type="submit" value="Cadastrar">
</form>

<a href="index.php">Voltar</a>

 <?php
 
 rodape();
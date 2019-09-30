<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


cabecalhoSecEdu("Refeições", "../escola", "../usuarios/cadastrar-usuarios.php", "../produto", "#", "../cardapio");

$select = "select * from refeicao";
$query = mysqli_query($conexao, $select);

echo "<table>"
. "<tr>"
. "<th>Refeição</th>"
. "</tr>";
while($tbl = mysqli_fetch_array($query)){
    $id = $tbl['id'];
    $nome = $tbl['nome'];
    
    echo "<tr><td>$nome</td>";
}
echo "</table>";
?>
<br>
    
<a href="gerenciar-refeicao.php?acao=cadastrar">Cadastrar Refeição</a>

 <?php
 
 rodape();
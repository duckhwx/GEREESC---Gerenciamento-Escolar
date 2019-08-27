<?php
require_once "../../funcoes-de-cabecalho.php";
require_once "../../conexao.php";

cabecalhoSecEdu("Escolas", "#", "../usuarios", "../produto", "../cardapio");
?>
<br><br>
<?php 
$select = "select * from Escola";
$query = mysqli_query($conexao, $select);

    while($table = mysqli_fetch_array($query)){
        $id = $table['id'];
        $nome = $table['nome'];
        
        echo"$nome  "
            . "<a href='vizualizar-escola.php?id=$id'>Vizualizar</a>  "
            . "<a href='atualizar-escola.php?id=$id'>Atualizar</a>  "
            . "<a href='verificar-escola.php?id=$id&acao=excluir'>Excluir</a>"
            . "<br>";
            
    }
echo "</table>";
?>

<br>
<a href="cadastrar-escola.php?acao=cadastrar">Cadastrar Escola</a>
<br>

<?php 
rodape();

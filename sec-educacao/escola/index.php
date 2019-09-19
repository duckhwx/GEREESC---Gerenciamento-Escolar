<?php
require_once "../../funcoes-de-cabecalho.php";
require_once "../../conexao.php";

session_start();
$_SESSION["idEscola"] = NULL;


cabecalhoSecEdu("Escolas", "#", "../usuarios/cadastrar-usuarios.php", "../produto", "../cardapio");
?>
<br><br>
<?php

//Seleção de todas as escolas cadastradas
$select = "select * from Escola";
$query = mysqli_query($conexao, $select);

//Exibição dinamica de todas as escolas
    while($table = mysqli_fetch_array($query)){
        $id = $table['id'];
        $nome = $table['nome'];
        
        echo"$nome  "
            . "<a href='visualizar-escola.php?id=$id'>Visualizar</a>  "
            . "<a href='atualizar-escola.php?id=$id'>Atualizar</a>  "
            . "<a href='estoque/estoque.php?id=$id'>Estoque  </a>"
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
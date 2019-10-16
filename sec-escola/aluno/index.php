<?php 
require_once '../../funcoes-de-cabecalho.php';
require_once '../../conexao.php';

cabecalhoSecEsc('../../estilo/styleSecesc.css', 'Alunos', '.', '../escola/', '../estoque/', '../cardapio/', '../../login/logOut.php');

sectionTop();

//Seleção de todas os Alunos cadastradas
$select = "select * from Aluno";
$query = mysqli_query($conexao, $select);

//Exibição dinamica de todas os Alunos
    while($table = mysqli_fetch_array($query)){
        $id = $table['id'];
        $nome = $table['nome'];
        
        echo"$nome  "
            . "<a href='visualizar-aluno.php?id=$id'>Visualizar</a>  "
            . "<a href='atualizar-aluno.php?id=$id'>Atualizar</a>  "
            . "<a href='validar-aluno.php?id=$id&acao=excluir'>Excluir</a>"
            . "<br>";
            
    }
echo "</table>";
?>

<a href="cadastrar-aluno.php" class="btn btn-dark m-2">Cadastrar Aluno</a>

<?php
sectionBaixo();
rodape();

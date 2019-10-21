<?php
require_once "../../funcoes-de-cabecalho.php";
require_once "../../conexao.php";

session_start();
$_SESSION["idEscola"] = NULL;


cabecalhoSecEdu('../../estilo/style.css', 'Escolas', '.', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '../cardapio/', '../../login/logOut.php');
    
sectionTop();?>
<br><br>
<?php

//Seleção de todas as escolas cadastradas
$select = "select * from Escola";
$query = mysqli_query($conexao, $select);

//Exibição dinamica de todas as escolas
    while($table = mysqli_fetch_array($query)){
        $idEscola = $table['id'];
        $nome = $table['nome'];
        
        echo"<div class='m-2'><span class='m-2'>$nome</span>"
            . "<a class='btn btn-light m-2' href='visualizar-escola.php?id=$idEscola'><img src='../../estilo/icones/eye.png' width=26px/></a>"
            . "<a class='btn btn-light m-2'href='atualizar-escola.php?id=$idEscola'><img src='../../estilo/icones/edit.png' width=26px/></a>"
            . "<a class='btn btn-light m-2'href='estoque/estoque.php?id=$idEscola'><img src='../../estilo/icones/box.png' width=26px/></a>"
            . "<a class='btn btn-light m-2'href='verificar-escola.php?id=$idEscola&acao=excluir'><img src='../../estilo/icones/delete.png' width=26px/></a>"
            . "</div>";
            
    }
echo "</table>";
?>

<br>
<a href="cadastrar-escola.php?acao=cadastrar" class="btn btn-dark m-2">Cadastrar Escola</a>
<br>

<?php 
sectionBaixo();
rodape();

<?php
require_once '../../conexao.php';

if($_GET['acao'] == 'cadastrar'){
    $nome = $_POST['nome'];
    
    $insert = "insert into Refeicao values (default, '$nome')";
    $query = mysqli_query($conexao, $insert);
    
    if($query){
        header("Location: index.php");
    } else {
        header("Location: gerenciar-refeicao.php");
    }
} else if($_GET['acao'] == 'atualizar'){
    $nome = $_POST['nome'];
    $id = $_GET['id'];
    
    $update = "update Refeicao set nome='$nome' where id = ".$id;
    $query = mysqli_query($conexao, $update);
    
    if($query){
        header("Location: index.php");
    } else {
        header("Location: gerenciar-refeicao.php");
    }
} else if ($_GET['acao'] == 'deletar'){
    $id = $_GET['id'];
    
    $delete = 'delete from Refeicao where id = '.$id;
    $query = mysqli_query($conexao, $delete);
    
    if($query){
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
}

<?php
require_once '../../../conexao.php';

if($_GET['acao'] == 'cadastrar'){
    $nome = $_POST['nome'];
    
    $insert = "insert into refeicao values (default, $nome)";
    $query = mysqli_query($conexao, $insert);
    
    if($query){
        header("Location: index.php");
    } else {
        header("Location: cadastrar-refeicao.php");
    }
} else if($_GET['acao'] == 'atualizar'){
    $nome = $_POST['nome'];
    $id = $_GET['id'];
    
    $update = 'update nome from refeicao where id = '.$id;
    $query = mysqli_query($conexao, $update);
    
    if($query){
        header("Location: index.php");
    } else {
        header("Location: atualizar-refeicao.php");
    }
} else if ($_GET['acao'] == 'deletar'){
    $id = $_GET['id'];
    
    $delete = 'delete from refeicao where id = '.$id;
    $query = mysqli_query($conexao, $delete);
    
    if($query){
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
}

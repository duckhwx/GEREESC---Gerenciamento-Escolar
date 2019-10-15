<?php
require_once '../../conexao.php';

$acao = $_POST['acao'];

if($acao == 'cadastrar'){
    $nome = $_POST['nome'];
    $insert = 'insert into refeicao values(default, "'.$nome.'")';
    $query = mysqli_query($conexao, $insert);
} 
else if($acao == 'getById'){
    $id = $_POST['id'];

    $select = "select * from refeicao where id = $id";
    $query = mysqli_query($conexao, $select);
    $fetch = mysqli_fetch_array($query);
    
    echo json_encode($fetch);
}
else if($acao == 'atualizar'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    
    $insert = "update Refeicao set nome='$nome' where id= $id";
    $query = mysqli_query($conexao, $insert);  
} 
else if($acao == 'excluir'){
    $id = $_POST['id'];
    
    $delete = "delete from Refeicao where id=$id";
    $query = mysqli_query($conexao, $delete);
}


<?php
require_once '../../conexao.php';

$acao = $_POST['acao'];

if($acao == 'cadastrar'){
    $nome = $_POST['nome'];
    $insert = 'insert into Refeicao values(default, "'.$nome.'")';
    $query = mysqli_query($conexao, $insert);
} 
else if($acao == 'getById'){
    $idEscola = $_POST['id'];

    $select = "select * from Refeicao where id = $idEscola";
    $query = mysqli_query($conexao, $select);
    $fetch = mysqli_fetch_array($query);
    
    echo json_encode($fetch);
}
else if($acao == 'atualizar'){
    $idEscola = $_POST['id'];
    $nome = $_POST['nome'];
    
    $insert = "update Refeicao set nome='$nome' where id= $idEscola";
    $query = mysqli_query($conexao, $insert);  
} 
else if($acao == 'excluir'){
    $idEscola = $_POST['id'];
    
    $delete = "delete from Refeicao where id=$idEscola";
    $query = mysqli_query($conexao, $delete);
}


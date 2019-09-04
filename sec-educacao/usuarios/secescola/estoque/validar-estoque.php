<?php
        require_once "../../../conexao.php";




if($_GET['acao'] == 'alocar'){

    $id = $_GET['id'];
    
    $id_produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    
    $insert = "insert into Estoque values ($id, $id_produto, $quantidade, 'Adicionado')";
    
    $query = mysqli_query($conexao, $insert);
    
    if($query){
        header("Location: estoque.php");
    } else {
        header("Location: alocar-produto.php");
    }
    
} else if ($_GET['acao'] == 'alterar'){
    $idEstoque = $_GET['idEstoque'];
    $quantidade = $_POST['quantidade'];
    
    $update = "update Estoque set quantidade=$quantidade where id=$idEstoque";
    
    $query = mysqli_query($conexao, $update);
    
    if($query){
        header("Location: estoque.php");
    } else {
        header("Location: alterar-estoque.php");
    }
}
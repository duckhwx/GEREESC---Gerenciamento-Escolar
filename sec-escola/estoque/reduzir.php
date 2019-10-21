<?php
require_once '../../conexao.php';
session_start();

$acao = $_POST['acao'];

if($acao == 'reduzir'){
    $id = $_POST['id'];
    $quantidadeRed = $_POST['quantidade'];
    
    $select = "select quantidade, produto_id from Estoque where estoque_id = $id";
    $querySelect = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($querySelect);
    $idProduto = $table['produto_id'];
    $quantidade = $table['quantidade'];
    
    $quantidade -= $quantidadeRed;
    
    $update = "update Estoque set status = 0 where estoque_id = $id";
    $queryUpdate = mysqli_query($conexao, $update);
    
    
    $insert = "insert into Estoque values(default, ".$_SESSION['idEscola'].", $idProduto, $quantidade, $quantidadeRed, 'Retirado', true)";
    $queryInsert = mysqli_query($conexao, $insert);
    
} else if ($acao == 'getById'){
    $id = $_POST['id'];
    
    $select = "select Estoque.quantidade, Produto.nomeProduto from Estoque inner join Produto
on Estoque.produto_id = Produto.id where estoque_id = $id";
    $query = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($query);
    
    echo json_encode($table);
}
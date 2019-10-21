<?php
require_once "../../conexao.php";

$acao = $_POST['acao'];

if($acao == 'getValues'){
    
    $selectTipoPeso = "select * from TipoDePeso";
    $selectTipoProduto = "select * from TipoDeProduto";
    $queryTipoPeso = mysqli_query($conexao, $selectTipoPeso);
    $queryTipoProduto = mysqli_query($conexao, $selectTipoProduto);
    
    $tipoPeso = [];
    while($table = mysqli_fetch_array($queryTipoPeso)){
        $id = $table['id'];
        $peso = $table['nomeTipoPeso'];
        
        $tipoPeso[] = [
            "id" => $id,
            "nomeTipoPeso" => $peso
        ];
    }
    
    $tipoProduto = [];
    while($table = mysqli_fetch_array($queryTipoProduto)){
        $id = $table['id'];
        $nomeTipoProduto = $table['nomeTipoProduto'];
        
        $tipoProduto[] = [
            "id" => $id,
            "nomeTipoProduto" => $nomeTipoProduto
        ];
    }
    
    $valores = [];
    $valores[] = [
        "tipoPeso" => $tipoPeso,
        "tipoProduto" => $tipoProduto
    ];
    
    echo json_encode($valores);
}
else if($acao == 'cadastrar'){
    $nome = $_POST["nome"];
    $marca = $_POST["marca"];
    $peso = $_POST["peso"];
    $tipoDePeso = $_POST["tipoDePeso"];
    $tipoDeProduto = $_POST["tipoDeProduto"];

    $insert = "insert into Produto values(default, '$nome', '$marca', '$peso', '$tipoDePeso', '$tipoDeProduto')";
    mysqli_query($conexao, $insert);
    
}
else if($acao == 'getById'){
    $idProduto = $_POST['id'];

    $select = "select Produto.nomeProduto, Produto.marca, Produto.peso, TipoDePeso.nomeTipoPeso, TipoDeProduto.nomeTipoProduto from Produto "
            . "inner join TipoDePeso on Produto.tipoDePeso_id = TipoDePeso.id "
            . "inner join TipoDeProduto on Produto.tipoDeProduto_id = TipoDeProduto.id where Produto.id = $idProduto";
    $query = mysqli_query($conexao, $select);
    $fetch = mysqli_fetch_array($query);
    echo $select;
    //echo json_encode($fetch);
}
else if($acao == 'atualizar'){
    $idTipoProduto = $_POST['id'];
    $nome = $_POST['nome'];
    
    $insert = "update Produto set nomeProduto='$nome' where id= $idProduto";
    $query = mysqli_query($conexao, $insert);  
} 
else if($acao == 'excluir'){
    $idProduto = $_POST['id'];
    
    $delete = "delete from Produto where id=$idProduto";
    $query = mysqli_query($conexao, $delete);
}


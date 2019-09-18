<?php
        require_once "../../../conexao.php";

//Esta pagina tem o intuito de fazer as verificações dos formularios de adição, alteração ou trasnferencia de produtos a um estoque
//Cada ação é determinada pelo action de cada formulário, assim aqui é identificado qual ação deve ser executada.

if($_GET['acao'] == 'alocar'){

    $id = $_GET['id'];
    
    $id_produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    $insert = "insert into Estoque values (default, $id, $id_produto, $quantidade, 'Adicionado')";
    
    $query = mysqli_query($conexao, $insert);
    if($query){
        header("Location: estoque.php");
    } else {
        header("Location: alocar-produto.php");
    }

} else if ($_GET['acao'] == 'alterar'){
    $idEstoque = $_GET['idEstoque'];
    $quantidade = $_POST['quantidade'];
    
    $update = "update Estoque set quantidade=$quantidade where estoque.estoque_id=$idEstoque";
    
    $query = mysqli_query($conexao, $update);
    
    if($query){
        header("Location: estoque.php");
    } else {
        header("Location: alterar-estoque.php");
    }
    
} else if ($_GET['acao'] == 'transferir'){
    $idEstoque = $_GET['idEstoque'];
    $quantidade = $_GET['quantidade'];
    $idProduto = $_GET['idProduto'];
    $quantidadeTrasnferida = $_POST['quantidade'];
    $idEscAlvo = $_POST['escolaAlvo'];

    $quantidade -= $quantidadeTrasnferida;

    $updateEsc = "update Estoque set quantidade=$quantidade where estoque.estoque_id=$idEstoque";
    mysqli_query($conexao, $updateEsc);

        $selectEstoqueAlvo = "select estoque.estoque_id from estoque where estoque.escola_id = $idEscAlvo and estoque.produto_id = $idProduto";
        $queryEstoqueAlvo = mysqli_query($conexao, $selectEstoqueAlvo);
        
        if(mysqli_num_rows($queryEstoqueAlvo) != 0){
            $tableEstoqueAlvo = mysqli_fetch_array($queryEstoqueAlvo);
            $idEstoqueAlvo = $tableEstoqueAlvo['estoque_id'];
            
            $updateEscAlvo = "update Estoque set quantidade= quantidade + $quantidadeTrasnferida where estoque.estoque_id = ".$idEstoqueAlvo;
            $queryUpdate = mysqli_query($conexao, $updateEscAlvo);
            if($queryUpdate){
                header("Location: estoque.php");
            }
        } else {
            $insert = "insert into Estoque values (default, $idEscAlvo, $idProduto, $quantidadeTrasnferida, 'Transportado')";
            $queryInsert = mysqli_query($conexao, $insert);
            
            if($queryInsert){
                header("Location: estoque.php");
            }
        }
    
}
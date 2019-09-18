<?php
        require_once "../../../conexao.php";

//Condição que será executada caso for selecionado a opção de alocar produtos
if($_GET['acao'] == 'alocar'){

    $id = $_GET['id'];

    $id_produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

//Submissão dos dados ao Banco de Dados
    $insert = "insert into Estoque values (default, $id, $id_produto, $quantidade, 'Adicionado')";
    $query = mysqli_query($conexao, $insert);
    
    if($query){
        header("Location: estoque.php");
    } else {
        header("Location: alocar-produto.php");
    }

//Condição que será executada caso for selecionado a opção de Alterar Produtos
} else if ($_GET['acao'] == 'alterar'){
    
    $idEstoque = $_GET['idEstoque'];
    $quantidade = $_POST['quantidade'];

//Dados atualizados submetidos ao Banco da dados
    $update = "update Estoque set quantidade=$quantidade where estoque.estoque_id=$idEstoque";
    $query = mysqli_query($conexao, $update);
    
    if($query){
        header("Location: estoque.php");
    } else {
        header("Location: alterar-estoque.php");
    }
    
//Condição que será executada caso for selecionado a opção de Trasnferir Produtos
} else if ($_GET['acao'] == 'transferir'){
    
    $idEstoque = $_GET['idEstoque'];
    $quantidade = $_GET['quantidade'];
    $idProduto = $_GET['idProduto'];
    $quantidadeTrasnferida = $_POST['quantidade'];
    $idEscAlvo = $_POST['escolaAlvo'];

//Definição da quantidade subtraida que a escola que envia os produtos terá
    $quantidade -= $quantidadeTrasnferida;

//Dados atualizados da escola que envia os produtos submetidos ao Banco da dados
    $updateEsc = "update Estoque set quantidade=$quantidade where estoque.estoque_id=$idEstoque";
    mysqli_query($conexao, $updateEsc);

//Seleção do estoque da escola alvo, que trabalha com o tipo de produto selecionado
    $selectEstoqueAlvo = "select estoque.estoque_id from estoque where estoque.escola_id = $idEscAlvo and estoque.produto_id = $idProduto";
    $queryEstoqueAlvo = mysqli_query($conexao, $selectEstoqueAlvo);
       
//Identificação que verifica se esse estoque especifico do produto já existe na escola alvo
        if(mysqli_num_rows($queryEstoqueAlvo) != 0){
//Caso exista este tera a quantidade atualizada
            $tableEstoqueAlvo = mysqli_fetch_array($queryEstoqueAlvo);
            $idEstoqueAlvo = $tableEstoqueAlvo['estoque_id'];
            
            $updateEscAlvo = "update Estoque set quantidade= quantidade + $quantidadeTrasnferida where estoque.estoque_id = ".$idEstoqueAlvo;
            $queryUpdate = mysqli_query($conexao, $updateEscAlvo);
            if($queryUpdate){
                header("Location: estoque.php");
            }
        } else {
//Caso não exista este será criado
            $insert = "insert into Estoque values (default, $idEscAlvo, $idProduto, $quantidadeTrasnferida, 'Transportado')";
            $queryInsert = mysqli_query($conexao, $insert);
            
            if($queryInsert){
                header("Location: estoque.php");
            }
        }
    
}
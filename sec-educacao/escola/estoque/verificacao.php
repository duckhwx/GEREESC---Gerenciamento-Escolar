<?php

require_once '../../../conexao.php';
session_start();

$idEscola = $_SESSION['idEscola'];

if ($_POST['acao'] == 'exibirDados') {
//Requisição de todos os produtos cadastrados no estoque da escola selecionada
    $selectEstoque = "select produto_id from Estoque where Estoque.escola_id = " . $idEscola;
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    $produtosEstoque = [];

//Atribuição de tais produtos a um array
    while ($tableEstoque = mysqli_fetch_array($queryEstoque)) {
        $produtoEstoque_id = $tableEstoque['produto_id'];

        $produtosEstoque[] = $produtoEstoque_id;
    }

//Requisição de todos os produtos cadastrados
    $selectProduto = "select id, nomeProduto from Produto";
    $queryProduto = mysqli_query($conexao, $selectProduto);
    $produtos = [];

//Atribuição de tais produtos a um array
    while ($tableProduto = mysqli_fetch_array($queryProduto)) {
        $produto_id = $tableProduto['id'];
        $nomeProduto = $tableProduto['nomeProduto'];

        $produtos[] = [
            'id' => $produto_id,
            'nome' => $nomeProduto
        ];
    }


    $produtosVerificados = [];
//Estrutura que indentifica quais produtos já existe no estoque da escola, para que nao sejam exibidos
//novamente para serem cadastrados, para evitar repetição de produtos.
    if (empty($produtosEstoque)) {
        foreach ($produtos as $produto) {
            $produtosVerificados[] = $produto;
        }
    } else {
        foreach ($produtos as $produto) {
            for ($i = 0; $i < count($produtosEstoque); $i++) {
                if ($produtosEstoque[$i] == $produto['id']) {
                    break;
                } else if ($i == count($produtosEstoque) - 1) {
                    $produtosVerificados[] = $produto;
                }
            }
        }
    }

    echo json_encode($produtosVerificados);
} else if ($_POST['acao'] == 'cadastrar') {
    $idProduto = $_POST['id'];
    $quantidade = $_POST['quantidade'];

    $insert = "insert into Estoque values(default, $idEscola, $idProduto, $quantidade, $quantidade, 'Adicionado', 1)";
    $query = mysqli_query($conexao, $insert);
} else if ($_POST['acao'] == 'getById') {
    $idEstoque = $_POST['id'];

    $select = "select Produto.nomeProduto from Estoque inner join Produto on "
            . "Estoque.produto_id = Produto.id where Estoque.estoque_id = " . $idEstoque;
    $query = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($query);

    echo json_encode($table);
} else if ($_POST['acao'] == 'alocar') {
    $id = $_POST['id'];
    $quantidadeRed = $_POST['quantidade'];

    $select = "select quantidade, produto_id from Estoque where estoque_id = $id";
    $querySelect = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($querySelect);
    $idProduto = $table['produto_id'];
    $quantidade = $table['quantidade'];

    $quantidade += $quantidadeRed;

    $update = "update Estoque set status = 0 where estoque_id = $id";
    $queryUpdate = mysqli_query($conexao, $update);


    $insert = "insert into Estoque values(default, " . $_SESSION['idEscola'] . ", $idProduto, $quantidade, $quantidadeRed, 'Adicionado', true)";
    $queryInsert = mysqli_query($conexao, $insert);
} else if ($_POST['acao'] == 'getDataTransferir') {
    $id = $_POST['id'];

    $selectEstoque = "select Produto.nomeProduto, Estoque.quantidade, Escola.nome from Estoque inner join Produto "
            . "on Estoque.produto_id = Produto.id inner join Escola "
            . "on Estoque.escola_id = Escola.id where estoque_id = $id";
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    $tableEstoque = mysqli_fetch_array($queryEstoque);

    $selectEscolas = "select id, nome from Escola where id <> " . $_SESSION['idEscola'];
    $queryEscolas = mysqli_query($conexao, $selectEscolas);


    $dados = [];

    while ($tableEscolas = mysqli_fetch_array($queryEscolas)) {
        $idEscola = $tableEscolas['id'];
        $nomeEscola = $tableEscolas['nome'];

        $dados[] = [
            "idEscola" => $idEscola,
            "nomeEscola" => $nomeEscola
        ];
    }

    $dados[] = [
        "nomeProduto" => $tableEstoque['nomeProduto'],
        "quantidade" => $tableEstoque['quantidade'],
        "escola" => $tableEstoque['nome']
    ];

    echo json_encode($dados);
} 
//condição para caso a ação seja transferir.
else if ($_POST['acao'] == 'transferir') {
    $idEstoque = $_POST['id'];
    $quantidade = $_POST['quantidade'];
    $idEscolaAlvo = $_POST['escolaAlvo'];

//Requisição dos dados do estoque da escola base
    $selectEstoque = "select quantidade, produto_id from Estoque where estoque_id = $idEstoque";
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    $tableEstoque = mysqli_fetch_array($queryEstoque);
    $quantidadeEstoque = $tableEstoque['quantidade'];
    $idProduto = $tableEstoque['produto_id'];

//Subtração do valor do estoque para atualizar o valor retirado do estoque da escola base
    $quantidadeEstoque -= $quantidade;

//Atualização do status e do novo valor do estoque da escola base
    $updateEstoque = "update Estoque set status = 0 where Estoque.estoque_id=$idEstoque";
    mysqli_query($conexao, $updateEstoque);
    $insertEstoqueQuant = "insert into Estoque values(default, $idEscola, $idProduto, $quantidadeEstoque, $quantidade, 'Transferido', 1)";
    mysqli_query($conexao, $insertEstoqueQuant);

//Requisição dos dados do estoque da escola alvo.
    $selectEstoqueAlvo = "select Estoque.estoque_id, Estoque.quantidade from Estoque where Estoque.escola_id = $idEscolaAlvo and Estoque.produto_id = $idProduto and Estoque.status = 1";
    $queryEstoqueAlvo = mysqli_query($conexao, $selectEstoqueAlvo);

//Condição que identifica se o produto ja existe em um estoque.
    if (mysqli_num_rows($queryEstoqueAlvo) != 0) {
        $tableEstoqueAlvo = mysqli_fetch_array($queryEstoqueAlvo);
        $idEstoqueAlvo = $tableEstoqueAlvo['estoque_id'];
        $quantidadeEstoqueAlvo = $tableEstoqueAlvo['quantidade'];
 
//Incrementação da quantidade transferida para o estoque da escola alvo
        $quantidadeEstoqueAlvo += $quantidade;

//Atualização do status do estoque velho e criação do novo.
        $updateEscAlvo = "update Estoque set status = 0 where Estoque.estoque_id = " . $idEstoqueAlvo;
        mysqli_query($conexao, $updateEscAlvo);

        $insertNewEstoque = "insert into Estoque values(default, $idEscolaAlvo, $idProduto, $quantidadeEstoqueAlvo, $quantidade, 'Transferido', 1)";
        mysqli_query($conexao, $insertNewEstoque);
    } else {
        $insert = "insert into Estoque values (default, $idEscolaAlvo, $idProduto, $quantidade, $quantidade, 'Transferido', 1)";
        mysqli_query($conexao, $insert);
    }
}
<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    
    cabecalhoSecEdu("Estoque", "../", "../../usuarios/cadastrar-usuarios.php", "../../produto", "../../cardapio");
    
    $id = $_GET['id'];
    
    $selectEstoque = "select * from Estoque where escola_id=$id and status='Adicionado'";
    
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    
    echo "<table>"
    . "<tr>"
            . "<th>Nome</th>"
            . "<th>Tipo</th>"
            . "<th>Marca</th>"
            . "<th>Peso</th>"
            . "<th>Quantidade</th>"
    . "</tr>";
    
    while($tableEstoque = mysqli_fetch_array($queryEstoque)){
        $idEstoque = $tableEstoque['id'];
        $produtoId = $tableEstoque['produto_id'];
        $quantidade = $tableEstoque['quantidade'];
        
        $selectProduto = "select * from Produto where id=$produtoId";
        $queryProduto = mysqli_query($conexao, $selectProduto);
        if($tableProduto = mysqli_fetch_array($queryProduto)){
            $nomeProduto = $tableProduto['nome'];
            $marcaProduto = $tableProduto['marca'];
            $pesoProduto = $tableProduto['peso'];
            $idTipoProduto = $tableProduto['tipoDeProduto_id'];
            
            $selectTipoProduto = "select * from TipoDeProduto where id=$idTipoProduto";
            $queryTipoProduto = mysqli_query($conexao, $selectTipoProduto);
            if($tableTipoProduto = mysqli_fetch_array($queryTipoProduto)){
                $nomeTipoProduto = $tableTipoProduto['nome'];
            }
        }
        
        echo "<tr>"
           . "<td>$nomeProduto</td>"
           . "<td>$nomeTipoProduto</td>"
           . "<td>$marcaProduto</td>"
           . "<td>$pesoProduto</td>"
           . "<td>$quantidade</td>"
           . "<td><a href='alterar-estoque.php?idEstoque=$idEstoque'>Alterar</a></td>"
           . "</tr>";
                
    }
    
    echo "</table>";
    
?>

<a href="alocar-produto.php?id=<?=$id?>">Alocar Produto</a>

<?php
rodape();
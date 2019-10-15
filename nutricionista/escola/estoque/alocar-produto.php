<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";

    cabecalhoNutricionista('../../../estilo/styleNutricionista.css', 'Estoque', '../../escola', '../../relatorio', '../../produto', '../../cardapio','../../../login/logOut.php');
    
    sectionTop();
 
    $id = $_GET['id'];
    
//Requisição de todos os produtos cadastrados no estoque da escola selecionada
    $selectEstoque = "select produto_id from estoque where estoque.escola_id = ".$id;
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    $produtosEstoque = [];

//Atribuição de tais produtos a um array
    while($tableEstoque = mysqli_fetch_array($queryEstoque)){
        $produtoEstoque_id = $tableEstoque['produto_id'];
        
        $produtosEstoque[] = $produtoEstoque_id;
    }

//Requisição de todos os produtos cadastrados
    $selectProduto = "select id, nomeProduto from Produto";
    $queryProduto = mysqli_query($conexao, $selectProduto);
    $produtos = [];

//Atribuição de tais produtos a um array
    while($tableProduto = mysqli_fetch_array($queryProduto)){
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
    foreach($produtos as $produto){
        for ($i = 0; $i < count($produtosEstoque); $i++) {
            if($produtosEstoque[$i] == $produto['id']){
                break;
            } else if($i == count($produtosEstoque) - 1){
                $produtosVerificados[] = $produto;
            }
        }
    }
?>
<br><br>
<form method="post" action="validar-estoque.php?acao=alocar&id=<?=$id?>">
        Produto <?php
            echo "<select name='produto'>";
//Geração dinamica dos produtos que podem ser cadastrados a uma tag select
            foreach ($produtosVerificados as $produto) {
                $id = $produto['id'];
                $nome = $produto['nome'];
                
                echo "<option value='$id'>$nome</option>";
            }
            echo "</select>"
        ?><br>
    Quantidade <input type="number" name="quantidade" required><br>
    <input type="submit" class="btn btn-dark m-2" value="Alocar">
</form>



<?php
        sectionBaixo();
rodape();


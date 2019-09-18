<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";

    cabecalhoSecEdu("Estoque", "../", "../../usuarios/cadastrar-usuarios.php", "../../produto", "../../cardapio");
 
    $id = $_GET['id'];
    
    $selectEstoque = "select produto_id from estoque where estoque.escola_id = ".$id;
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    $produtosEstoque = [];
    
    while($tableEstoque = mysqli_fetch_array($queryEstoque)){
        $produto_id = $tableEstoque['produto_id'];
        
        $produtosEstoque[] = $produto_id;
    }
    
    $selectProduto = "select id, nomeProduto from Produto";
    $queryProduto = mysqli_query($conexao, $selectProduto);
    
?>
<br><br>
<form method="post" action="validar-estoque.php?acao=alocar&id=<?=$id?>">
        Produto <?php
            echo "<select name='produto'>";
        //Os produtos pegos no banco com o codigo acima são exibidos por essa estrutura While em forma de <select>
                while ($tableProduto = mysqli_fetch_array($queryProduto)) {
                    $id = $tableProduto['id'];
                    $nome = $tableProduto['nomeProduto'];

                        echo "<option value='$id'>$nome</option>";
                }
            echo "</select>"
        ?><br>
    Quantidade <input type="number" name="quantidade" required><br>
               <input type="submit" value="Alocar">
</form>



<?php
rodape();


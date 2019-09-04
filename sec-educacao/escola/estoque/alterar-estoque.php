<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    
    cabecalhoSecEdu("Estoque", "../", "../../usuarios/cadastrar-usuarios.php", "../../produto", "../../cardapio");
    
    $idEstoque = $_GET['idEstoque'];
    
    $selectEstoque = "select * from Estoque where id=$idEstoque";
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    $tableEstoque = mysqli_fetch_array($queryEstoque);
    
    $idProduto = $tableEstoque['produto_id'];
    
    $selectProduto = "select * from Produto where id=$idProduto";
    $queryProduto = mysqli_query($conexao, $selectProduto);
    $tableProduto = mysqli_fetch_array($queryProduto);
    
    $nomeProduto = $tableProduto['nome'];
    
       
?>
<br><br>
<form method="post" action="validar-estoque.php?acao=alterar&idEstoque=<?=$idEstoque?>">
    Produto <?php echo"$nomeProduto"; ?><br>
    Quantidade <input type="number" name="quantidade" required><br>
               <input type="submit" value="Alocar">
</form>


<?php
rodape();



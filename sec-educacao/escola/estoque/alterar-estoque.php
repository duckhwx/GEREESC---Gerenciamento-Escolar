<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    
    cabecalhoSecEdu("Estoque", "../", "../../usuarios/cadastrar-usuarios.php", "../../produto", "../../refeicao", "../../cardapio");
    
    $idEstoque = $_GET['idEstoque'];
    
//Requisição dos dados ao banco
    $select = "select Produto.nomeProduto from Estoque inner join Produto on "
            . "Estoque.produto_id = Produto.id where Estoque.estoque_id = ".$idEstoque;
    $query = mysqli_query($conexao, $select);
    $tbl = mysqli_fetch_array($query);
    
    $produto = $tbl['nomeProduto'];
    
       
?>
<br><br>
<form method="post" action="validar-estoque.php?acao=alterar&idEstoque=<?=$idEstoque?>">
    Produto <?php echo"$produto"; ?><br>
    Quantidade <input type="number" name="quantidade" required><br>
               <input type="submit" value="Alocar">
</form>


<?php
rodape();



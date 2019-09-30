<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    
    cabecalhoSecEdu('../../../estilo/style.css', 'Estoque', '../../escola', '../../usuarios/cadastrar-usuarios.php', '../../produto', '../../cardapio','../../../login/logOut.php');
    
    sectionTop();
    
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
    <input type="submit" class="btn btn-dark" value="Alocar">
</form>


<?php
sectionBaixo();
rodape();



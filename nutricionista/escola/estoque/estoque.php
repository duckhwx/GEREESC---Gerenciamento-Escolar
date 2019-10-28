<?php
require_once "../../../funcoes-de-cabecalho.php";
require_once "../../../conexao.php";
session_start();

cabecalhoNutricionista('../../../estilo/style.css', 'Estoque', '../../escola/', '../../relatorio', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');

sectionTop();

//Session que pega o id da escola selecionada na página anterior.
if ($_SESSION["idEscola"] == NULL) {
    $_SESSION["idEscola"] = $_GET['id'];
}

//Requisição dos dados do estoque ao Banco de Dados
$selectEstoque = "select Estoque.estoque_id, Produto.id, Produto.nomeProduto, TipoDeProduto.nomeTipoProduto, Produto.marca, Produto.peso, TipoDePeso.nomeTipoPeso, Estoque.quantidade from Estoque "
        . "inner join Produto on Estoque.produto_id = Produto.id "
        . "inner join TipoDePeso on Produto.tipoDePeso_id = TipoDePeso.id "
        . "inner join TipoDeProduto on Produto.tipoDeProduto_id = TipoDeProduto.id "
        . "where escola_id =" . $_SESSION["idEscola"] . " and status = 1";
$queryEstoque = mysqli_query($conexao, $selectEstoque);

echo "<table class='table'>"
 . "<thead class='thead-dark'>"
 . "<tr>"
 . "<th scope='col'>Nome</th>"
 . "<th scope='col'>Tipo</th>"
 . "<th scope='col'>Marca</th>"
 . "<th scope='col'>Peso</th>"
 . "<th scope='col'>Quantidade</th>"
 . "<th scope='col'></th>"
 . "<th scope='col'></th>"
 . "</tr>"
 . "</thead>"
 . "<tbody>";
//Imprimir os dados dinamicamente em tabelas do estoque 
while ($table = mysqli_fetch_array($queryEstoque)) {
    $idEstoque = $table['estoque_id'];
    $idProduto = $table['id'];
    $nomeProduto = $table['nomeProduto'];
    $nomeTipoProduto = $table['nomeTipoProduto'];
    $marca = $table['marca'];
    $peso = $table['peso'];
    $nomeTipoPeso = $table['nomeTipoPeso'];
    $quantidade = $table['quantidade'];

    echo "<tr>"
    . "<td>$nomeProduto</td>"
    . "<td>$nomeTipoProduto</td>"
    . "<td>$marca</td>"
    . "<td>$peso $nomeTipoPeso</td>"
    . "<td>$quantidade</td>"
    . "</tr>";
}

echo "</tbody>"
 . "</table>";
?>

<button class="btn btn-dark m-2" id="buttonAdicionar">Alocar Produto</button>
<a class="btn btn-dark m-2" href="movimentacoes.php" id="buttonHistorico">Historico de Movimentações</a>
<script src="requisicao-ajax.js"></script>
<?php
sectionBaixo();
rodape();


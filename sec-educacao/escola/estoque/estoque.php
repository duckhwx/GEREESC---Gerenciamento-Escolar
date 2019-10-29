<?php
require_once "../../../funcoes-de-cabecalho.php";
require_once "../../../conexao.php";
session_start();

cabecalhoSecEdu('../../../estilo/style.css', 'Estoque', '../../escola/', '../../usuarios/cadastrar-usuarios.php', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');

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
    . "<td><button class='btn btn-light alocar-produto' value='$idEstoque'><img src='../../../estilo/icones/add.png' width='25px'/></button></td>"
    . "<td><button class='btn btn-light transferir-produto' value='$idEstoque'><img src='../../../estilo/icones/transfer.png' width='25px'/></button|></td>"
    . "</tr>";
}

echo "</tbody>"
 . "</table>";
?>

<div id="linkButton">
<button class="btn btn-dark m-2" id="buttonAdicionar">Alocar Produto</button>
<a class="btn btn-dark m-2" href="movimentacoes.php" id="buttonHistorico">Historico de Movimentações</a>
</div>

<script src="requisicao-ajax.js"></script>
<?php
sectionBaixo();
?>

<!--Modal--> 
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="addProduto">
                    <div class="form-group">  
                        <label class='d-flex flex-row'>Produto</label>
                        <select name="produto" class="custom-select" id="selectProduto"></select>
                    </div>
                    <div class="form-group">  
                        <label class='d-flex flex-row'>Quantidade</label>
                        <input type="number" required name="quantidade" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark m-2">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAlocar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alocar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="alocarProduto">
                    <div class="form-group">  
                        <label class='form-label'>Produto</label>
                        <input type="text" name="produtoNome" class="form-control" readonly=“true”>
                    </div>
                    <div class="form-group">  
                        <label class='form-label'>Quantidade</label>
                        <input type="number" required name="quantidadeAlocada" min="0" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark m-2">Alocar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTransferir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transferir Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-2">Produto: <span id="produtoTransferir"></span></div>

                <div class="m-2">Escola: <span id="escola"></span></div>

                <form method="post" id="transferirProduto">
                    <div class="form-group"> 
                        <label class='d-flex flex-row'>Escola Alvo:</label>
                        <select name="escolaAlvo" class="custom-select" id="escolaAlvo"></select>
                    </div>

                    <div class="form-group">  
                        <label class='d-flex flex-row'>Quantidade</label>
                        <input type="number" required name="quantidadeTransferida" min="0" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark m-2">Transferir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
rodape();


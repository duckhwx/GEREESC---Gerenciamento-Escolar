<?php
require_once "../../../funcoes-de-cabecalho.php";
require_once "../../../conexao.php";
session_start();

cabecalhoSecEdu('../../../estilo/style.css', 'Movimentações', '../../escola/', '../../usuarios/cadastrar-usuarios.php', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
sectionTop();

$selectEstoque = "select Produto.nomeProduto, Estoque.quantidade, Estoque.quantAlterada, Estoque.acao, Estoque.status, Estoque.estoqueTransf_id from Estoque "
        . "inner join Escola on Estoque.escola_id = Escola.id "
        . "inner join Produto on Estoque.produto_id = Produto.id "
        . "where escola_id = ".$_SESSION["idEscola"]." "
        . "order by Estoque.data desc";
$queryEstoque = mysqli_query($conexao, $selectEstoque);

echo "<h3 class='m-3'>Historico de Movimentações</h3>"
    . "<hr>";
while($table = mysqli_fetch_array($queryEstoque)){
    $nomeProduto = $table['nomeProduto'];
    $quantidade = $table['quantidade'];
    $quantMov = $table['quantAlterada'];
    $acao = $table['acao'];
    $status = $table['status'];
    $estoqueTransf_id = $table['estoqueTransf_id'];

    echo "<div class='mx-5'>";

    if($acao == 'Adicionado'){
        echo "<div class='adicionado historico rounded border' role='alert'>
                 <span>$nomeProduto | $quantidade | +$quantMov | $acao</span>
             </div>";
    } 
    else if($acao == 'Retirado'){
        echo "<div class='retirado historico rounded border' role='alert'>
                 <span>$nomeProduto | $quantidade | -$quantMov | $acao</span>
             </div>";
    }
    else if($acao == 'Transferido'){
        echo "<div class='transferido historico rounded border' role='alert'>
                 <span>$nomeProduto | $quantidade | $quantMov | $acao</span>
             </div>";
    }
    
    echo "</div>";
}
?>
<script src="requisicao-ajax.js"></script>
<?php
sectionBaixo();
?>

<!--Modal Adicionar--> 
<div class="modal fade" id="modalHistorico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalInfo">
            </div>
        </div>
    </div>
</div>

<?php
rodape();
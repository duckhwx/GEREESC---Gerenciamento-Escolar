<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';
require_once '../../login/funcoesdelogin.php';

autenticar('../../index.php');

cabecalhoNutricionista('../../estilo/tableStyle.css', 'Produtos', '../escola/', '.', '../refeicao/', '../cardapio/', '../../login/logOut.php');

sectionTop();

$select = "select * from Produto";
$query = mysqli_query($conexao, $select);

if($query == true and mysqli_num_rows($query) > 0){

    echo "<table class='table'>"
            . "<thead class='thead-dark'>"
                . "<tr>"
                    . "<th>Nome</th>"
                    . "<th colspan='3'>"
                        . "<button class='btn btn-dark buttonTop m-1' id='button-cadastro'>Cadastrar Produto</button>"
                        . "<a href='TipoDeProduto/index.php' class='btn btn-dark buttonTop m-1'>Tipo de Produto</a>"
                    . "</th>"
                . "</tr>"
            . "</thead>"
            . "<tbody>";

        while ($table = mysqli_fetch_array($query)) {
            $idProduto = $table['id'];
            $nome = $table['nomeProduto'];
            ?>
            <tr>
                <td><?php echo $nome; ?></td>
                <td><button class="btn btn-light button-visualizar" value="<?php echo $idProduto; ?>" ><div class="eyeIcon icons"></div></button></td>
                <td><button class="btn btn-light button-alterar" value="<?php echo $idProduto; ?>" ><div class="editIcon icons"></div></button></td>
                <td><button class="btn btn-light button-deletar" value="<?php echo $idProduto; ?>" ><div class="deleteIcon icons"></div></button></td>
            </tr>
            
            <?php
        }

} else {

    echo "<h3>Produtos</h3>"
        . "<hr>"
        . "<button class='btn btn-dark buttonTop m-3' id='button-cadastro'>Cadastrar Produto</button>"
        . "<a href='TipoDeProduto/index.php' class='btn btn-dark buttonTop m-3'>Tipo de Produto</a>";
}

        ?>

    </tbody>
</table>

<script src="requisicao-ajax.js"></script>
<?php
sectionBaixo();
?>

<!-- Modal Cadastro de Produto-->
<div class="modal fade" id="modalProduto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalInfo">
                <form class="form-group my-0" id="formulario" method="post">
                    <input type="hidden" id="idProdutoUp">
                    <label class="pt-2">Nome</label>
                    <input type="text" id="nome" required class="form-control" name="nome">
                    <label class="pt-2">Marca</label>
                    <input type="text" id="marca" required class="form-control" name="marca">
                    <label class="pt-2">Peso</label>
                    <input type="number" id="peso" required class="form-control" name="peso">
                    <label class="d-block pt-2">Tipo de Peso</label>
                    <select name="tipoDePeso" class="custom-select px-2" id="tipoDePeso"></select>
                    <label class="d-block pt-2">Tipo de Produto</label>
                    <select name="tipoDeProduto" class="custom-select px-2" id="tipoDeProduto"></select>
                    <input type="submit" id="buttonSubmit" class="btn btn-dark mt-3">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Visualizar Produto -->
<div class="modal fade" id="modalVisualizar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visualizar Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalInfo">
                <div>Nome: <span id="nomeProduto"></span></div>
                <div>Tipo: <span id="tipoProduto"></span></div>
                <div>Marca: <span id="marcaProduto"></span></div>
                <div>Peso: <span id="pesoProduto"></span> <span id="tipoDePeso"></span></div>
            </div>
        </div>
    </div>
</div>

<!--Modal Excluir produto-->
<div class="modal fade" id="delProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Excluir Tipo de Produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalInfo">
                <div class="my-2">Excluir produto: <span id="nomeProdutoDel" class="border-bottom"></span></div>
                <input type="hidden" id="idProdutoDel">
                <button class="btn btn-danger mt-2" id="buttonConfirmar">Confirmar</button>
            </div>
        </div>
    </div>
</div>   
<?php
rodape();

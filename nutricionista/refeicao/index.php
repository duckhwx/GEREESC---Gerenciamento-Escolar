<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';

cabecalhoNutricionista("../../estilo/style.css", "Refeições", "../escola/", "../relatorio/", "../produto/", ".", "../cardapio/", "../../login/logOut.php");

$select = "select * from Refeicao";
$query = mysqli_query($conexao, $select);

sectionTop();
?>
<!--Table com exibição dinamica das Refeições cadastradas-->
<table class="table">
    <thead class="thead-dark">
        <th scope="col" colspan="3">Refeição</th>
    </thead>
<tbody>
    <?php
    while ($tbl = mysqli_fetch_array($query)) {

        echo "<tr><td class='py-4'>"
        . "" . $tbl['nome'] . ""
        . "</td>"
        . "<td>"
        . "<button class='btn btn-light button-atualizar' value='" . $tbl['id'] . "'>"
        . "<img src='https://image.flaticon.com/icons/svg/1001/1001371.svg' height='27px'>"
        . "</button>"
        . "</td>"
        . "<td>"
        . "<button class='btn btn-light button-excluir' value='" . $tbl['id'] . "'>"
        . "<img src='https://image.flaticon.com/icons/svg/32/32178.svg' height='27px'>"
        . "</button>"
        . "</td>"
        . "</tr>";
    }
    ?>
</tbody>
</table>

<script src="requisicao-ajax.js"></script>
<button class="btn btn-dark m-2" id="button-cadastro">Cadastrar Refeição</button>

<?php 
sectionBaixo();
?>

<!-- Modal de Cadastro-->
<div class="modal fade" id="divModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadUp"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group m-2" id="formulario" method="post">
                    <label>Nome</label>
                    <input type="text" id="nome" required class="form-control m-2" name="nome">
                    <input type="hidden" id="idRefeicaoUp">
                    <input type="submit" id="buttonSubmit" class="btn btn-dark m-2">
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal de Exclusão-->
<div class="modal fade" id="delRef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Excluir Refeição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-2">Tens certeza de que desejas deletar: <span id="nomeRefDel"></span></div>
                <input type="hidden" id="idExcluir">
                <button class="btn btn-dark" id="buttonConfirmar">Confirmar</button>
            </div>
        </div>
    </div>
</div>  

<?php
rodape();

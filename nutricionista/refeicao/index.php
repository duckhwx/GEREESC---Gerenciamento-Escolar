<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';
require_once '../../login/funcoesdelogin.php';

autenticar('../../index.php');

cabecalhoNutricionista("../../estilo/tableStyle.css", "Refeições", "../escola/", "../produto/", ".", "../cardapio/", "../../login/logOut.php");

$select = "select * from Refeicao";
$query = mysqli_query($conexao, $select);

sectionTop();

if($query == true and mysqli_num_rows($query) > 0){

    echo "<table class='table'>"
            . "<thead class='thead-dark'>"
                . "<th>Refeição</th>"
                . "<th colspan='2'>"
                    . "<button class='btn btn-dark m-2 buttonTop' id='button-cadastro'>Cadastrar Refeição</button>"
                . "</th>"
            . "</thead>"
            . "<tbody>";

    while ($tbl = mysqli_fetch_array($query)) {

        echo "<tr><td>"
        . "" . $tbl['nome'] . ""
        . "</td>"
        . "<td>"
        . "<button class='btn btn-light button-atualizar' value='" . $tbl['id'] . "'>"
        . "<div class='editIcon icons'></div>"
        . "</button>"
        . "</td>"
        . "<td>"
        . "<button class='btn btn-light button-excluir' value='" . $tbl['id'] . "'>"
        . "<div class='deleteIcon icons'></div>"
        . "</button>"
        . "</td>"
        . "</tr>";
    }

} else {

    echo "<h3>Refeições</h3>"
        ."<hr>"
        ."<button class='btn btn-dark m-3 buttonTop' id='button-cadastro'>Cadastrar Refeição</button>";
}
    ?>
</tbody>
</table>

<script src="requisicao-ajax.js"></script>

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
            <div class="modal-body modalInfo">
                <form class="form-group my-0" id="formulario" method="post">
                    <label>Nome</label>
                    <input type="text" id="nome" required class="form-control my-2" name="nome">
                    <input type="hidden" id="idRefeicaoUp">
                    <input type="submit" id="buttonSubmit" class="btn btn-dark mt-2">
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
            <div class="modal-body modalInfo">
                <div class="my-2">Excluir refeição: <span id="nomeRefDel" class="border-bottom"></span></div>
                <input type="hidden" id="idExcluir">
                <button class="btn btn-danger my-2" id="buttonConfirmar">Excluir</button>
            </div>
        </div>
    </div>
</div>  

<?php
rodape();

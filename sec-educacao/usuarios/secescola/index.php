<?php
require_once '../../../funcoes-de-cabecalho.php';
require_once '../../../conexao.php';

$select = 'select Escola.nomeEscola, SecEsc.nomeSecEsc, SecEsc.id from SecEsc '
        . 'inner join Escola on SecEsc.escola_id = Escola.id';
$query = mysqli_query($conexao, $select);

cabecalhoSecEdu('../../../estilo/style.css', 'Secretários das Escolas', '../../escola/', '../cadastrar-usuarios.php', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
sectionTop();
?>
<table class="table">
    <thead class="thead-dark">
    <th scope="col">Secretário</th>
    <th scope="col">Escola</th>
    <th scope="col" colspan="3"></th>
</thead>
<tbody>
    <?php
    while ($table = mysqli_fetch_array($query)) {
        $secEscId = $table['id'];
        $secEscNome = $table['nomeSecEsc'];
        $escolaNome = $table['nomeEscola'];

        echo "<tr>"
            . "<td>$secEscNome</td>"
            . "<td>$escolaNome</td>"
            . "<td><button class='btn btn-light visualizar-secEsc' value='$secEscId'><img src='../../../estilo/icones/eye.png' width='28px'></button></td>"
            . "<td><a href='validar-secesc?idSecEsc=$secEscId&acao=atualizar' class='btn btn-light atualizar-secEsc' value='$secEscId'><img src='../../../estilo/icones/edit.png' width='28px'></a></td>"
            . "<td><button class='btn btn-light excluir-secEsc' value='$secEscId'><img src='../../../estilo/icones/delete.png' width='28px'></button></td>"
        . "</tr>";
    }
    ?>
</tbody>
</table>

<div id="linkButton">
<a href="validar-secesc.php?acao=cadastrar" class="btn btn-dark m-2">Cadastrar</a>
</div>

<script src="requisicao-ajax.js"></script>
<?php
sectionBaixo();
?>

<!-- Modal Visualizar-->
<div class="modal fade" id="modalVisualizar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Visualizar Secretário da Escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Nome: <span id="nome"></span></div>
                <div>Escola: <span id="escola"></span></div>
                <div>Cargo: <span id="cargo"></span></div>
                <div>CPF: <span id="cpf"></span></div>
                <div>RG: <span id="rg"></span></div>
                <div>Endereço: <span id="endereco"></span></div>
                <div>Número: <span id="numero"></span></div>
                <div>E-Mail: <span id="email"></span></div>
                <div>Data de Nascimento: <span id="nascimento"></span></div>
                <div>Celular: <span id="celular"></span></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmação de Excluir usuário-->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Excluir SecEsc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Excluir o Secretário da Educação <span id="nomeExcluir" style="border-bottom: solid 1pt black"></span></div>
                <input type="hidden" id="idSecEsc">
                <button class="btn btn-danger" id="excluirSecEsc">Excluir</button>
            </div>
        </div>
    </div>
</div>
<?php
rodape();

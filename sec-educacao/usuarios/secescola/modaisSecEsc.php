<!-- Modal Visualizar-->
<div class="modal fade" id="modalVisualizarSecEsc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Visualizar Secretário da Escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Nome: <span id="nomeSecEsc"></span></div>
                <div>Escola: <span id="escolaSecEsc"></span></div>
                <div>Cargo: <span id="cargoSecEsc"></span></div>
                <div>CPF: <span id="cpfSecEsc"></span></div>
                <div>RG: <span id="rgSecEsc"></span></div>
                <div>Endereço: <span id="enderecoSecEsc"></span></div>
                <div>Número: <span id="numeroSecEsc"></span></div>
                <div>E-Mail: <span id="emailSecEsc"></span></div>
                <div>Data de Nascimento: <span id="nascimentoSecEsc"></span></div>
                <div>Celular: <span id="celularSecEsc"></span></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmação de Excluir usuário-->
<div class="modal fade" id="modalExcluirSecEsc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Excluir Secretário da Escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Excluir o Secretário da Educação <span id="nomeExcluirSecEsc" style="border-bottom: solid 1pt black"></span></div>
                <input type="hidden" id="idSecEsc">
                <button class="btn btn-danger" id="excluirSecEsc">Excluir</button>
            </div>
        </div>
    </div>
</div>
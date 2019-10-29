<?php
require_once "../../funcoes-de-cabecalho.php";
require_once "../../conexao.php";

session_start();
$_SESSION["idEscola"] = NULL;


cabecalhoSecEdu('../../estilo/style.css', 'Escolas', '.', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '../cardapio/', '../../login/logOut.php');
    
sectionTop();?>
<h3>Escolas</h3>
<?php

//Seleção de todas as escolas cadastradas
$select = "select * from Escola";
$query = mysqli_query($conexao, $select);

//Exibição dinamica de todas as escolas
?>
<table class="table">
<thead>
</thead>
    <tbody>
<?php
    while($table = mysqli_fetch_array($query)){
        $idEscola = $table['id'];
        $nome = $table['nomeEscola'];
        
        echo"<tr><td>$nome</td>"
            . "<td><button class='btn btn-light m-2 visualizar-escola' value='$idEscola'><img src='../../estilo/icones/eye.png' width=26px/></button></td>"
            . "<td><a class='btn btn-light m-2' href='verificar-escola.php?id=$idEscola&acao=atualizar'><img src='../../estilo/icones/edit.png' width=26px/></a></td>"
            . "<td><a class='btn btn-light m-2' href='estoque/estoque.php?id=$idEscola'><img src='../../estilo/icones/box.png' width=26px/></a></td>"
            . "<td><button class='btn btn-light m-2 excluir-escola' value='$idEscola'><img src='../../estilo/icones/delete.png' width=26px/></button></td>"
            . "</tr>";
            
    }
?>
</tbody>
</table>

<div id="linkButton">
<a href="verificar-escola.php?acao=cadastrar" class="btn btn-dark m-2 cadastrar-escola">Cadastrar Escola</a>
</div>

<script src="requisicao-ajax.js"></script>
<?php 
sectionBaixo();
?>
<!-- Modal Visualizar Escola-->
<div class="modal fade" id="modalVisualizar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Visualizar Escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Nome: <span id="nomeEscola"></span></div>
                <div>Endereço: <span id="endereco"></span></div>
                <div>Número: <span id="numero"></span></div>
                <div>CNPJ: <span id="cnpj"></span></div>
                <div>E-Mail: <span id="email"></span></div>
                <div>Telefone: <span id="telefone"></span></div>
                <div>Numero de Alunos</div>
                <div>Ensino Infantil: <span id="infantil"></span></div>
                <div>Ensino Fundamental: <span id="fundamental"></span></div>
                <div>Diretor: <span id="diretor"></span></div>
                <div>Secretários: <span id="secretarios"></span></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmação de Excluir usuário-->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Excluir Escola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Excluir a escola <span id="nomeExcluir" style="border-bottom: solid 1pt black"></span></div>
                <input type="hidden" id="idEscola">
                <button class="btn btn-danger my-2" id="excluirEscola">Excluir</button>
            </div>
        </div>
    </div>
</div>
<?php
rodape();

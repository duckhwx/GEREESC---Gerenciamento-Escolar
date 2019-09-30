<?php

//Página responsavel por trazer as funções que geram dinamicamente os cabeçalhos e rodapés das páginas em HMTL
//cada tipo de usuário terá sua propia função.

function cabecalhoSecEdu($estilo = null, $title = NULL, $linkEscola = NULL, $linkUsuarios = NULL, $linkProduto = NULL, $linkCardapio = NULL, $linkLogOut = null){
    echo "<!DOCTYPE html>"
        . "<head>"
        . "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>"
        . "<link rel='stylesheet' type='text/css' href='$estilo'/>"
        . "<meta charset='UTF-8'>"
        . "<title>$title</title>"
        . "</head>"
        . "<body>"

        . "<header>"
        .    "<div class='container'>"
        .        "<div class='row'>"
        .            "<div class='col'>"
        .               "<a href='$linkEscola'>Escola</a>"   
        .            "</div>"
        .            "<div class='col'>"
        .                "<a href='$linkUsuarios'>Usuários</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkProduto'>Produtos</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkCardapio'>Cardápio</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkLogOut'>Sair</a>"
        .            "</div>"
        .    "</div>"
        . "</div>"
        . "</header>";
}

function cabecalhoSecEsc($estilo = null, $title = NULL,  $linkAluno = NULL, $linkEscola = NULL, $linkEstoque = NULL, $linkCardapio = NULL, $linkLogOut = null) {
    echo "<!DOCTYPE html>"
        . "<head>"
        . "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>"
        . "<link rel='stylesheet' type='text/css' href='$estilo'/>"
        . "<meta charset='UTF-8'>"
        . "<title>$title</title>"
        . "</head>"
        . "<body>"
        . "<header>"
        .    "<div class='container'>"
        .        "<div class='row'>"
        .            "<div class='col'>"
        .               "<a href='$linkAluno'>Alunos</a>"   
        .            "</div>"
        .            "<div class='col'>"
        .                "<a href='$linkEscola'>Escola</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkEstoque'>Estoque</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkCardapio'>Cardápio</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkLogOut'>Sair</a>"
        .            "</div>"
        .    "</div>"
        . "</div>"
        . "</header>";
    
}

function cabecalhoNutricionista($estilo = null, $title = NULL, $linkEscola = NULL, $linkRelatorio = NULL, $linkProduto = NULL, $linkCardapio = NULL, $linkLogOut = null){
    echo "<!DOCTYPE html>"
        . "<head>"
        . "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>"
        . "<link rel='stylesheet' type='text/css' href='$estilo'/>"
        . "<meta charset='UTF-8'>"
        . "<title>$title</title>"
        . "</head>"
        . "<body>"

        . "<header>"
        .    "<div class='container'>"
        .        "<div class='row'>"
        .            "<div class='col'>"
        .               "<a href='$linkEscola'>Escolas</a>"   
        .            "</div>"
        .            "<div class='col'>"
        .                "<a href='$linkRelatorio'>Relatório</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkProduto'>Produtos</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkCardapio'>Cardápio</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkLogOut'>Sair</a>"
        .            "</div>"
        .    "</div>"
        . "</div>"
        . "</header>";
    
}

function cabecalhoAluno($estilo = null, $title = NULL, $linkEscola = NULL, $linkCardapio = NULL, $linkLogOut = null){
    echo "<!DOCTYPE html>"
        . "<head>"
        . "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>"
        . "<link rel='stylesheet' type='text/css' href='$estilo'/>"
        . "<meta charset='UTF-8'>"
        . "<title>$title</title>"
        . "</head>"
        . "<body>"

        . "<header>"
        .    "<div class='container'>"
        .        "<div class='row'>"
        .            "<div class='col'>"
        .               ""   
        .            "</div>"
        .            "<div class='col'>"
        .                "<a href='$linkEscola'>Escola</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               ""
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkCardapio'>Cardápio</a>"
        .            "</div>"
        .            "<div class='col'>"
        .               "<a href='$linkLogOut'>Sair</a>"
        .            "</div>"
        .    "</div>"
        . "</div>"
        . "</header>";

}
function sectionTop() {
    echo "<section>"
    .        "<div id='Cadastro'>";
}

function sectionBaixo() {
    echo "</div>"
    .    "</section>";
}

function rodape(){
    echo "</body>"
    . "</html>";
}

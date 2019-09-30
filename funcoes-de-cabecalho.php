<?php

//Página responsavel por trazer as funções que geram dinamicamente os cabeçalhos e rodapés das páginas em HMTL
//cada tipo de usuário terá sua propia função.

function cabecalhoSecEdu($title = NULL, $linkEscola = NULL, $linkUsuarios = NULL, $linkProduto = NULL, $refeicao = NULL, $linkCardapio = NULL){
    echo "<!DOCTYPE html>"
    . "<html>"
    . "<head>"
    . "<meta charset='UTF-8'>"
    . "<title>$title</title>"
    . "</head>"
    . "<body>"
    . "<a href='$linkEscola'>Escolas</a>"
    . "<a href='$linkUsuarios'>Usuários</a>"
    . "<a href='$linkProduto'>Produtos</a>"
    . "<a href='$refeicao'>Refeição</a>"
    . "<a href='$linkCardapio'>Cardápio</a>";
}

function cabecalhoNutricionista($title = NULL, $linkEscola = NULL, $linkRelatorio = NULL, $linkProduto = NULL, $refeicao = NULL, $linkCardapio = NULL){
    echo "<!DOCTYPE html>"
    . "<html>"
    . "<head>"
    . "<meta charset='UTF-8'>"
    . "<title>$title</title>"
    . "</head>"
    . "<body>"
    . "<a href='$linkEscola'>Escolas</a>"
    . "<a href='$linkRelatorio'>Relatório</a>"
    . "<a href='$linkProduto'>Produtos</a>"
    . "<a href='$refeicao'>Refeição</a>"
    . "<a href='$linkCardapio'>Cardápio</a>";
}


function rodape(){
    echo "</body>"
    . "</html>";
}



<?php

function cabecalhoSecEdu($title = NULL, $linkEscola = NULL, $linkUsuarios = NULL, $linkProduto = NULL, $linkCardapio = NULL){
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
    . "<a href='$linkCardapio'>Cardápio</a>"
    . "<br><br>";
}

function cabecalhoSecEsc($linkBootstrap = null, $title = null,$linkAluno = null,$linkEscola = null, $linkEstoque = null, $linkCardapio = null){
    echo "<!DOCTYPE html>"
    . "<html>"
    . "<head>"
    . "<meta charset='UTF-8'>"
    . "<link href='$linkBootstrap' rel='stylesheet'>"
    . "<title>$title</title>"
    . "</head>"
    . "<body>"
    . "<a href='$linkAluno'>Alunos</a>"
    . "<a href='$linkEscola'>Escolas</a>"
    . "<a href='$linkEstoque'>Estoque</a>"
    . "<a href='$linkCardapio'>Cardápio</a>"
    . "<br><br>";
}

function cabecalhoNutricionista($linkBootstrap = null, $title = null,$linkEscola = null, $linkRelatorio = null, $linkProduto = null, $linkCardapio = null){
    echo "<!DOCTYPE html>"
    . "<html>"
    . "<head>"
    . "<meta charset='UTF-8'>"
    . "<link href='$linkBootstrap' rel='stylesheet'>"
    . "<title>$title</title>"
    . "</head>"
    . "<body>"
    . "<a href='$linkEscola'>Escolas</a>"
    . "<a href='$linkRelatorio'>Relatório</a>"
    . "<a href='$linkProduto'>Produto</a>"
    . "<a href='$linkCardapio'>Cardápio</a>"
    . "<br><br>";
}

function rodape(){
    echo "</body>"
    . "</html>";
}



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
    . "<a href='$linkCardapio'>Cardápio</a>";
}

function rodape(){
    echo "</body>"
    . "</html>";
}



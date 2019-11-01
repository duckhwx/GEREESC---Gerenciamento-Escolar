<?php 
require_once '../funcoes-de-cabecalho.php';
require_once '../login/funcoesdelogin.php';
require_once '../conexao.php';

cabecalhoSecEsc('../estilo/styleSecesc.css', 'Inicio', 'aluno/index.php', 'escola/', 'estoque/', 'cardapio/', '../login/logOut.php');
rodape();

    $select = "select escola_id from SecEsc where id=".userid();
    $query = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($query);
    $_SESSION['idEscola'] = $table['escola_id'];
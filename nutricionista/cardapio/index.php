<?php 
require_once '../../funcoes-de-cabecalho.php';
session_start();

$_SESSION['id_anoEscolar'] = null;

cabecalhoNutricionista("Usuários", "../escola", "..relatorio", "../produto", "#");
?>
    <br>
        <a href="calendario.php?id=1">Ensino Infantil</a>
        <a href="calendario.php?id=2">Ensino Fundamental</a>
<?php

rodape();
<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


cabecalhoNutricionista("Usuários", "../escola", "..relatorio", "../produto", "#");
?>
<br>
    <a href="calendario.php?id=1">Ensino Infantil</a>
    <a href="calendario.php?id=2">Ensino Fundamental</a>

<?php

rodape();

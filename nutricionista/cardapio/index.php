<?php 
require_once '../../funcoes-de-cabecalho.php';
session_start();

$_SESSION['id_anoEscolar'] = null;

cabecalhoNutricionista('../../estilo/styleNutricionista.css', 'Cardápio', '../escola/', '../relatorio/', '../produto/', '../refeicao/', '.', '../../login/logOut.php');
sectionTop();
?>
    <br>
        <a href="calendario.php?id=1">Ensino Infantil</a>
        <a href="calendario.php?id=2">Ensino Fundamental</a>
<?php
sectionBaixo();
rodape();

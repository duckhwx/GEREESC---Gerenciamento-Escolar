<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


cabecalhoSecEsc('../../estilo/styleSecesc.css', 'Cardápio', '../aluno', '../escola', '../estoque', '../cardapio','../../login/logOut.php');
sectionTop();
?>
<br>
    <a href="calendario.php?id=1">Ensino Infantil</a>
    <a href="calendario.php?id=2">Ensino Fundamental</a>

<?php
sectionBaixo();
rodape();
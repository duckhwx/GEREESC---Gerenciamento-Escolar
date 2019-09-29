<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


cabecalhoSecEdu('../../estilo/style.css', 'Cardápio', '../escola', '../usuarios/cadastrar-usuarios.php', '../produto', '../cardapio','../../login/logOut.php');
sectionTop();
?>
<br>
    <a href="calendario.php?id=1">Ensino Infantil</a>
    <a href="calendario.php?id=2">Ensino Fundamental</a>

<?php
sectionBaixo();
rodape();

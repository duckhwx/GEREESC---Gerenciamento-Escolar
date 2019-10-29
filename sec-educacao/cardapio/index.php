<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


cabecalhoSecEdu('../../estilo/style.css', 'Cardápio', '../escola/', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '.', '../../login/logOut.php');
sectionTop();
?>
<div id="linkButton">
    <a class="btn btn-dark m-2" href="calendario.php?id=1">Ensino Infantil</a>
    <a class="btn btn-dark m-2" href="calendario.php?id=2">Ensino Fundamental</a>
</div>

<?php
sectionBaixo();
rodape();

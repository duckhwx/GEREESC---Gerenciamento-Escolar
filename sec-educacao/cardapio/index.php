<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


cabecalhoSecEdu("Usuários", "../escola", "../usuarios/cadastrar-usuarios.php", "../produto", "#", "../../login/deslogar");
?>
<br>
    <a href="calendario.php?id=1">Ensino Infantil</a>
    <a href="calendario.php?id=2">Ensino Fundamental</a>

<?php

rodape();	 
	
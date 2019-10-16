<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';

cabecalhoAluno('../../estilo/styleAluno.css', 'Cardápio', '../escola/', '../cardapio/calendario.php','../../login/logOut.php');

?>
<!--FullCalendar Links -->
<link href='../../FullCalendar/css/core/main.min.css' rel='stylesheet' />
<link href='../../FullCalendar/css/daygrid/main.min.css' rel='stylesheet' />
<script src='../../FullCalendar/js/core/main.min.js'></script>
<script src='../../FullCalendar/js/interaction/main.min.js'></script>
<script src='../../FullCalendar/js/daygrid/main.min.js'></script>
<script src='../../FullCalendar/js/core/locales/pt-br.js'></script>

<!--Página que possui os estilos do calendario-->
<link href="../../estilo/fullCalendarEstilo.css" rel="stylesheet" />

<!--Página que possui os codigos Js de criação do FullCalendar-->
<script src="calendario.js"></script>

        <div id='calendar'></div>
        
<?php

rodape();

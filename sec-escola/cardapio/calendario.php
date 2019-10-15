<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';

session_start();
    $_SESSION['id_anoEscolar'] = $_GET['id'];

    cabecalhoSecEsc('../../estilo/styleSecesc.css', 'Cardápio', '../aluno', '../escola', '../estoque', '../cardapio','../../login/logOut.php');

?>
<!--FullCalendar Links -->
<link href='../../FullCalendar/css/core/main.min.css' rel='stylesheet' />
<link href='../../FullCalendar/css/daygrid/main.min.css' rel='stylesheet' />
<script src='../../FullCalendar/js/core/main.min.js'></script>
<script src='../../FullCalendar/js/interaction/main.min.js'></script>
<script src='../../FullCalendar/js/daygrid/main.min.js'></script>
<script src='../../FullCalendar/js/core/locales/pt-br.js'></script>

<!--bootstrap links-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--Página que possui os estilos do calendario-->
<link href="../../estilo/fullCalendarEstilo.css" rel="stylesheet" />

<!--Página que possui os codigos Js de criação do FullCalendar-->
<script src="calendario.js"></script>

        <div id='calendar'></div>
        
<?php

rodape();
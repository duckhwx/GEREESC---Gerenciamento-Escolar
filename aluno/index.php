<?php
    require_once '../conexao.php';
    require_once '../funcoes-de-cabecalho.php';
    
    session_start();
    $idEscola = $_SESSION['id'];
    
    $query1 = mysqli_query($conexao, "select * from Aluno where id='$idEscola'");
    $table = mysqli_fetch_array($query1);
    
    $_SESSION['escola_id'] = $table['escola_id'];
    $_SESSION['anoEscolar_id'] = $table['anoEscolar_id'];

    cabecalhoAluno('../estilo/styleAluno.css', 'Inicio', 'escola/', 'cardapio/calendario.php','../login/logOut.php');
    rodape();
    
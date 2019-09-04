<?php

    require_once "../conexao.php";
    require_once "funcoesdelogin.php";

    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if(empty($login) or empty($senha)){
        header("Location: ../index.php");
    } else {
        if(strlen($login) <= 64 and strlen($senha) <= 64){

//Pagina do Secretário da Educação
    $login = tipoLogin($conexao, "select * from secedu where login='$login' and senha='$senha'");
    if($login != null){
        logar($login['login'], $login['nome'], $login['id']);
        header("Location: ../sec-educacao");
    } 
    
//Página do Nutricionista
    else if(tipoLogin($conexao, "select * from nutricionista where login='$login' and senha='$senha'") != null){
        
    } 
    
    else if(tipoLogin($conexao, "select * from secesc where login='$login' and senha='$senha'") != null){
//Página do Secretário da Escola
    } 
    
    else if(tipoLogin($conexao, "select * from aluno where login='$login' and senha='$senha'") != null){
//Página do Aluno
    } 
    
    else {
        header("Location: ../index.php");
    } 

    } else {
        header("Location: ../index.php");
        }
    }
        
<?php

    require_once "../../conexao.php";
    require_once '../../login/funcoesdelogin.php';

    $id = userid();

    if(isset($_POST) && $_POST['senha'] != false){
    
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $update = "update secEdu set nome = '$nome', email = '$email', login = '$login', senha = '$senha' where id = $id";
        $query = mysqli_query($conexao, $update);

        if($query){
            header("Location: index.php");
        } else {
            header("Location: alterarPerfil.php");
        }
    }
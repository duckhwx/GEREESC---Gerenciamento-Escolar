<?php 
    session_start();

    function logar($login, $nome, $id){
        $_SESSION["login"] = $login;
        $_SESSION["nome"] = $nome;
        $_SESSION["id"] = $id;
        iniciarSessao();
    }

    function iniciarSessao(){
        $_SESSION["time"] = time() + 3500;
    }

    function tempoExpirado(){
        if($_SESSION["time"] < time()){
            return true;
        } else {
            iniciarSessao();
            return false;
        }
    }

    function estaLogado(){
        return isset($_SESSION["login"]);
    }

    function username(){
        return $_SESSION["nome"];
    }
        
    function deslogar(){
        session_destroy();
    }

    function autenticar(){
        if(!estaLogado() or tempoExpirado()){
            deslogar();
            header("Location: Tela inicial/telaInicial.php");
        } else {
            return true;
        }
    }

    function tipoLogin ($conexao, $string){
        $query = mysqli_query($conexao, $string);
        $array = mysqli_fetch_array($query);
        return $array;
    }


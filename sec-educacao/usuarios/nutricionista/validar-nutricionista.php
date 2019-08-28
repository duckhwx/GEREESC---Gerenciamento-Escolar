<?php

require_once "../../../conexao.php";

if($_GET['acao'] == 'cadastrar' or $_GET['acao'] == 'atualizar'){
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $numero = $_POST['numero'];
    $celular = $_POST['celular'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    if($_GET['acao'] == 'cadastrar'){
        
        $insert = "insert into nutricionista values (default, "
                . "'$nome', "
                . "'$login', "
                . "'$senha', "
                . "'$cpf', "
                . "'$rg', "
                . "'$endereco', "
                . "'$email', "
                . "'$nascimento', "
                . "'$numero', "
                . "'$celular')";
        
        $query = mysqli_query($conexao, $insert);
        
        if($query){
            header("Location: index.php");
        } else{
            header("Location: cadastrar-nutricionista.php");
        }
    } else if($_GET['acao'] == 'atualizar'){
        $update = "update nutricionista set nome='$nome',"
                . " login='$login',"
                . " senha='$senha',"
                . " cpf='$cpf',"
                . " rg='$rg',"
                . " endereco='$endereco',"
                . " email='$email',"
                . " dataDeNascimento='$nascimento',"
                . " numero='$numero',"
                . " celular='$celular' where id=1";
        
        $query = mysqli_query($conexao, $update);
        
        if($query){
            header('Location: index.php');
        } else {
            header('Location: atualizar-nutricionista.php');
        }
    }
    
} else if($_GET['acao'] == 'excluir'){
    $delete = "delete from nutricionista where id =1";

    $query = mysqli_query($conexao, $delete);

    if($query){
        header("Location: index.php");
    } else {
        heade("Location: index.php");
    }
}
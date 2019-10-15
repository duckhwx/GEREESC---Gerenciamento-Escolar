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
    $escola = $_POST['escola'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    if($_GET['acao'] == 'cadastrar'){
        $insert = "insert into SecEsc values (default, "
                . "'$nome', "
                . "'$login', "
                . "'$senha', "
                . "'$cpf', "
                . "'$rg', "
                . "'$endereco', "
                . "'$email', "
                . "'$nascimento', "
                . "'$numero', "
                . "'$celular', "
                . "$escola)";
        
        $query = mysqli_query($conexao, $insert);
        
        if($query){
            header("Location: index.php");
        } else{
            header("Location: cadastrar-secesc.php");
        }
    } else if($_GET['acao'] == 'atualizar'){
        $id = $_GET['id'];
        $update = "update SecEsc set nome='$nome',"
                . " login='$login',"
                . " senha='$senha',"
                . " cpf='$cpf',"
                . " rg='$rg',"
                . " endereco='$endereco',"
                . " email='$email',"
                . " dataDeNascimento='$nascimento',"
                . " numero='$numero',"
                . " celular='$celular',"
                . " escola_id=$escola where id=$id";
        
        $query = mysqli_query($conexao, $update);
        
        if($query){
            header('Location: index.php');
        } else {
            header('Location: atualizar-secesc.php');
        }
    }
    
} else if($_GET['acao'] == 'excluir'){
    
        $id = $_GET['id'];
        $delete = "delete from SecEsc where id=$id";
        $query = mysqli_query($conexao, $delete);
        if($query){
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
}
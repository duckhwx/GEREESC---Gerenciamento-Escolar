<?php
require_once "../../conexao.php";

if($_GET['acao'] == 'cadastrar' or $_GET['acao'] == 'atualizar'){
    
    $nome = $_POST['nome']; 
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nascimento = $_POST['nascimento'];
    $anoEscolar = $_POST['anoEscolar']; 
    $escola = $_POST['escola'];
            
    if($_GET['acao'] == 'cadastrar'){
        $insert = "insert into aluno values (default, "
                . "'$nome', "
                . "'$login', "
                . "'$senha',"
                . "'$nascimento',"
                . "$anoEscolar, "
                . "$escola)";
        
        $query = mysqli_query($conexao, $insert);
        if($query){
            header("Location: index.php");
        } else{
            var_dump($insert);
            //header("Location: cadastrar-aluno.php");
        }
    } else if($_GET['acao'] == 'atualizar'){
        $id_anoEscolar = $_POST['anoEscolar'];
        $id_escola = $_POST['escola'];
        
        $update = "update aluno set nome='$nome',"
                . " login='$login',"
                . " senha='$senha',"
                . " dataDeNascimento='$nascimento',"
                . " anoEscolar_id='$anoEscolar where id=$id_anoEscolar',"
                . " escola_id=$escola where id=$id_escola";
        
        $query = mysqli_query($conexao, $update);
        
        if($query){
            header('Location: index.php');
        } else {
            header('Location: atualizar-aluno.php');
        }
    }
    
} else if($_GET['acao'] == 'excluir'){
    
        $idEscola = $_GET['id'];
        $delete = "delete from aluno where id=$idEscola";
        $query = mysqli_query($conexao, $delete);
        if($query){
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
}
<?php
require_once '../../conexao.php';

if(!empty($_GET['acao'])){
    $acao = $_GET['acao'];

//Condição que indica se o tipo de ação é cadastrar ou Atualizar, é nescessario pois apenas estas funções tem dados
//a serem pegos por POST
        if($acao == 'cadastrar' or $acao == 'atualizar'){

            $nome = $_POST['nome']; 
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nascimento = $_POST['nascimento'];
            $anoEscolar = $_POST['anoEscolar']; 
            $escola = $_POST['escola'];

            if($acao == 'cadastrar'){
                $insert = "insert into Aluno values (default, "
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
                    header("Location: validar-aluno.php?acao=cadastrar");
                }
            } else if($acao == 'atualizar'){
                $idAluno = $_GET['id'];

                $update = "update Aluno set nomeAluno='$nome',"
                        . " login='$login',"
                        . " senha='$senha',"
                        . " dataDeNascimento='$nascimento',"
                        . " anoEscolar_id=$anoEscolar,"
                        . " escola_id=$escola where id=$idAluno";
                $query = mysqli_query($conexao, $update);

                if($query){
                    header("Location: index.php");
                } else {
                    header("Location: validar-aluno.php?acao=atualizar&id=$idAluno");
                }
            }
    }
}
else if (!empty($_POST['acao'])){
    $acao = $_POST['acao'];
    
    if ($acao == 'getById') {
        $id = $_POST['idAluno'];

        $select = "select Aluno.id, Aluno.nomeAluno, Aluno.dataDeNascimento, AnoEscolar.nomeAnoEscolar, Escola.nomeEscola from Aluno "
                . "inner join AnoEscolar on Aluno.anoEscolar_id = AnoEscolar.id " 
                . "inner join Escola on Aluno.escola_id = Escola.id where Aluno.id = $id";
        $query = mysqli_query($conexao, $select);
        
        $numRows = mysqli_num_rows($query);
        
        if($numRows == 1){
            $table = mysqli_fetch_array($query);
        } else {
            $select = "select Aluno.id, Aluno.nomeAluno, Aluno.dataDeNascimento, AnoEscolar.nomeAnoEscolar from Aluno "
                    . "inner join AnoEscolar on Aluno.anoEscolar_id = AnoEscolar.id where Aluno.id = $id";
            $query = mysqli_query($conexao, $select);
            $table = mysqli_fetch_array($query);
        }

        echo json_encode($table);
        
    }
    else if ($acao == 'getDataAluno') {
        $id = $_POST['idAluno'];

        $select = "select Aluno.nomeAluno, Aluno.id from Aluno where id=$id";
        $query = mysqli_query($conexao, $select);
        $table = mysqli_fetch_array($query);

        echo json_encode($table);
    }
    else if ($acao == 'excluir') {
        $id = $_POST['idAluno'];

        $excluir = "delete from Aluno where id=$id";
        $query = mysqli_query($conexao, $excluir);
    }
}
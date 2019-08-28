<?php

require_once "../../conexao.php";

$id = $_GET['id'];

if($_GET['acao'] == 'cadastrar' or $_GET['acao'] == 'atualizar'){
    
$nome = $_POST["nomeEscola"];
$endereco = $_POST["enderecoEscola"];
$cnpj = $_POST["cnpjEscola"];
$email = $_POST["emailEscola"];
$numero = $_POST["numeroEscola"];
$telefone = $_POST["telefoneEscola"];
$alunosEnsInfantil = $_POST["alunosEnsInfantil"];
$alunosEnsFundamental = $_POST["alunosEnsFundamental"];

        if(empty($nome) or empty($endereco) or empty($numero) or empty($cnpj) or empty($email) or empty($telefone)){
            header("Location: cadastrar-escola");
        }
         else if($_GET['acao'] == 'cadastrar'){
                 $insert = "insert into Escola values(default, '$nome', '$endereco', '$cnpj', '$email', '$numero', '$telefone', $alunosEnsInfantil, $alunosEnsFundamental)";

                $query = mysqli_query($conexao, $insert);
                if($query){
                    header("Location: index.php");
                } else {
                    header("Location: cadastrar-escola.php");
                }
        }
        
    else if($_GET['acao'] == 'atualizar'){
        
       $update = "update escola set nome='$nome', "
               . "endereco='$endereco', "
               . "cnpj='$cnpj', "
               . "email='$email', "
               . "numero='$numero', "
               . "telefone='$telefone', "
               . "alunosEnsInfantil=$alunosEnsInfantil, "
               . "alunosEnsFundamental=$alunosEnsFundamental where id=$id";
       
       $query = mysqli_query($conexao, $update);
       
       if($query){
           header("Location: index.php");
       } else {
           header("Location: atualizar-escola.php");
           }
      }
    }

    else if($_GET['acao'] == 'excluir'){
        $delete = "delete from escola where id=$id";
        
        $query = mysqli_query($conexao, $delete);
        
        if($query){
            header("Location: index.php");
        } else {
            echo "Erro";
        }
        
    }
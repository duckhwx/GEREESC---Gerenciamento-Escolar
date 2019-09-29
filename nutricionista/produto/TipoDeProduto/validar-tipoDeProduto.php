<?php

require_once "../../../conexao.php";


if($_GET['acao'] == 'cadastrar' or $_GET['acao'] == 'atualizar'){
    
$nome = $_POST["nomeProduto"];
$marca = $_POST["marca"];
$peso = $_POST["peso"];
$tipoDePeso = $_POST["tipoDePeso"];
$tipoDeProduto = $_POST["tipoDeProduto"];


        if(empty($nome) or empty($marca) or empty($peso) or empty($tipoDePeso) or empty($tipoDeProduto)){
            header("Location: cadastrar-tipoDeProduto.php");
        }
         else if($_GET['acao'] == 'cadastrar'){
                 $insert = "insert into produto values(default, '$nome', '$marca', '$peso', '$tipoDePeso', '$tipoDeProduto')";

                $query = mysqli_query($conexao, $insert);
                if($query){
                    header("Location: index.php");
                } else {
                    header("Location: cadastrar-tipoDeProduto.php");
                }
        }
        
    else if($_GET['acao'] == 'atualizar'){

        $id_tipoDePeso = $_GET['id_tipoDePeso'];
        $id_tipoDeProduto = $_GET['id_tipoDeProduto'];
        
       $update = "update produto set nomeProduto='$nome', "
               . "marca='$marca', "
               . "peso='$peso', "
               . "email='$email', "
               . "tipoDePeso_id='$tipoDePeso where id=$id_tipoDePeso', "
               . "tipoDeProduto_id='$tipoDeProduto where id=$id_tipoDeProduto'";
       
       $query = mysqli_query($conexao, $update);
       
       if($query){
           header("Location: index.php");
       } else {
           header("Location: atualizar-tipoDeProduto.php");
           }
      }
    }

    else if($_GET['acao'] == 'excluir'){

        $id = $_GET['id'];

        $delete = "delete from produto where id=$id";
        
        $query = mysqli_query($conexao, $delete);
        
        if($query){
            header("Location: index.php");
        } else {
            echo "Erro";
        }
        
    }


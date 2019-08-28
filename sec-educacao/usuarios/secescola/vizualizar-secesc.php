<?php

require_once '../../../conexao.php';
require_once '../../../funcoes-de-cabecalho.php';

$id = $_GET['id'];

$query = mysqli_query($conexao, "select * from SecEsc where id='$id'");

$table = mysqli_fetch_array($query);

$nome = $table['nome'];
$Login = $table['login'];
$senha = $table['senha'];
$cpf = $table['cpf'];
$rg = $table['rg'];
$endereco = $table['endereco'];
$email = $table['email'];
$dataNascimento = $table['dataDeNascimento'];
$numero = $table['numero'];
$celular = $table['celular'];

?>

<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../estilo/styleCadastro.css"/>
    <meta charset='UTF-8'>
    <title>Vizualizar Secretario da Escola</title>
    </head>
    <body>
        <header>
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        <a href='../../../escola'>Escolas</a>
                    </div>
                    <div class='col'>
                        <a href='../index.php'>Usuários</a>
                    </div>
                    <div class='col'>
                        <a href='../../produto'>Produtos</a>
                    </div>
                    <div class='col'>
                        <a href='../../cardapio'>Cardápio</a>
                    </div>
                </div>
            </div>
        </header>   
        <section>
            <div id='Cadastro'>
                
                <p>Nome: <?=$nome?></p>
                <p>Login: <?=$Login?></p>
                <p>Senha: <?=$senha?></p>
                <p>CPF: <?=$cpf?></p>
                <p>RG: <?=$rg?></p>
                <p>Endereço: <?=$endereco?></p>
                <p>E-mail: <?=$email?></p>
                <p>Data de Nascimento: <?=$dataNascimento?></p>
                <p>Numero: <?=$numero?></p>
                <p>Celular: <?=$celular?></p>
                <br><br>
                <input type="submit" value="Atualizar Secretario da Escola">
            </div>
        </section>




<a href="index.php">Voltar</a>
<?php
rodape();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


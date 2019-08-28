<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';

$id = $_GET['id'];

$query = mysqli_query($conexao, "select * from Escola where id='$id'");

$table = mysqli_fetch_array($query);

$nome = $table['nome'];
$endereco = $table['endereco'];
$cnpj = $table['cnpj'];
$email = $table['email'];
$numero = $table['numero'];
$telefone = $table['telefone'];
$alunosEnsInfantil = $table['alunosEnsInfantil'];
$alunosEnsFundamental = $table['alunosEnsFundamental'];

//cabecalhoSecEdu($nome, "index.php", "../usuarios", "../produto", "../cardapio");
?>

<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../estilo/styleCadastro.css"/>
    <meta charset='UTF-8'>
    <title>Vizualizar Escola</title>
    </head>
    <body>
        <header>
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        <a href='../../escola'>Escolas</a>
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
                <p>Endereço: <?=$endereco?></p>
                <p>CNPJ: <?=$cnpj?></p>
                <p>E-mail: <?=$email?></p>
                <p>Numero: <?=$numero?></p>
                <p>Telefone: <?=$telefone?></p>
                <p>Numero de Alunos</p>
                <p>Ensino Infantil: <?=$alunosEnsInfantil?></p>
                <p>Ensino Fundamental: <?=$alunosEnsFundamental?></p>
                <br><br>
                <input type="submit" value="Atualizar Escola">
            </div>
        </section>




<a href="index.php">Voltar</a>
<?php 
rodape();
?>



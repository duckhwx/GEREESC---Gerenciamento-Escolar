<?php
require_once("../../funcoes-de-cabecalho.php");
//cabecalhoSecEdu("Atualizar Escola", "index.php", "../usuarios", "../produto", "../cardapio");

$id = $_GET['id'];
?>

<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../estilo/styleCadastro.css"/>
    <meta charset='UTF-8'>
    <title>Atualizar Escola</title>
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
                <form method="post" action="verificar-escola.php?acao=atualizar&id=<?=$id?>">
                    Nome <input type="text" required maxlength="100" name="nomeEscola">
                    Endereco <input type="text" required maxlength="255" name="enderecoEscola">
                    Numero <input type="text" required maxlength="8" name="numeroEscola">
                    CNPJ <input type="text" required maxlength="12" name="cnpjEscola">
                    E-mail <input type="email" required maxlength="255" name="emailEscola">
                    Telefone <input type="text" required maxlength="12" name="telefoneEscola">
                    Numero de Alunos: <br>
                    Ensino Infantil <input type="number" maxlength="4" name="alunosEnsInfantil">
                    Ensino Fundamental <input type="number" maxlength="4" name="alunosEnsFundamental">
                    <br><br>
                    <input type="submit" value="Atualizar Escola">
                </form>
            </div>
        </section>



<br>
<a href="index.php">Voltar</a>
<br>
<?php 
rodape();


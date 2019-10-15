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

cabecalhoSecEdu('../../../estilo/style.css', 'Secretario '.$nome, '../../escola/', '../cadastrar-usuarios.php', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
sectionTop();
?>

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
                <!--<a type="submit" href="atualizar-secesc.php">Atualizar Secretario da </a>-->
                <br>
                <a href="index.php" class="btn btn-dark">Voltar</a>





<?php
sectionBaixo();
rodape();


<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';

$id = $_GET['id'];

$query = mysqli_query($conexao, "select * from Aluno where id='$id'");

$table = mysqli_fetch_array($query);

$nome = $table['nome'];
$login = $table['login'];
$senha = $table['senha'];
$anoEscolar_id = $table['anoEscolar_id'];
$escola_id = $table['escola_id'];

$query1 = mysqli_query($conexao, "select * from AnoEscolar where id='$anoEscolar_id'");
   $table = mysqli_fetch_array($query1);   
   $nomeAnoEscolar = $table['nome']; 
   
$query2 = mysqli_query($conexao, "select * from Escola where id='$escola_id'");
   $table = mysqli_fetch_array($query2);   
   $nomeEscola = $table['nome'];

cabecalhoSecEsc('../../estilo/style.css','Secretário da Escola - Alunos', 'index.php', '../escola/', '../estoque/', '../cardapio/','../../login/logOut.php');
sectionTop();
?>

                <p>Nome: <?=$nome?></p>
                <p>Login: <?=$login?></p>
                <p>Senha: <?=$senha?></p>
                <p>Ano Escolar: <?=$nomeAnoEscolar?></p>
                <p>Escola: <?=$nomeEscola?></p>
                <br><br>
                <a href="atualizar-aluno.php"><input type="submit" class="btn btn-dark" value="Atualizar Escola"></a>
                <br>




<a href="index.php">Voltar</a>
<?php 
sectionBaixo();
rodape();
?>



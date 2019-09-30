<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';

$id = $_GET['id'];

//Seleção dos dados da escola selecionada no index
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

cabecalhoNutricionista('../../estilo/style.css', 'Cadastrar Produtos', '../escola', '../relatorio', '../produto', '../cardapio','../../login/logOut.php');
    
sectionTop();
?>
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

                <a href="index.php" class="btn btn-dark">Voltar</a>
<?php 
sectionBaixo();
rodape();
?>


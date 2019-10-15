<?php
require_once '../../../funcoes-de-cabecalho.php';
require_once '../../../conexao.php';

$select = 'select * from nutricionista';
$query = mysqli_query($conexao, $select);

$table = mysqli_fetch_array($query);

$id = $table['id'];
$nome = $table['nome'];
$cpf = $table['cpf'];
$rg = $table['rg'];
$endereco = $table['endereco'];
$email = $table['email'];
$nascimento = $table['dataDeNascimento'];
$numero = $table['numero'];
$celular = $table['celular'];

cabecalhoSecEdu('../../../estilo/style.css', 'Nutricionista', '../../escola', '../cadastrar-usuarios.php', '../../produto', '../../refeicao', '../../cardapio', '../../../login/logOut.php');
    
    sectionTop();
?>
<br>
<p>Nome: <?=$nome?></p>
<p>CPF: <?=$cpf?></p>
<p>RG: <?=$rg?></p>
<p>Endereco: <?=$endereco?></p>
<p>E-Mail: <?=$email?></p>
<p>Data de Nascimento: <?=$nascimento?></p>
<p>Numero: <?=$numero?></p>
<p>Celular: <?=$celular?></p>

<br>
<a href="cadastrar-nutricionista.php">Cadastrar</a>
<a href="atualizar-nutricionista.php?id=<?=$id?>">Atualizar</a>
<a href="validar-nutricionista.php?id=<?=$id?>&acao=excluir">Excluir</a>

<?php 
sectionBaixo();
rodape();
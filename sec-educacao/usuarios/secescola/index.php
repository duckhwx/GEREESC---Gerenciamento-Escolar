<?php
require_once '../../../funcoes-de-cabecalho.php';
require_once '../../../conexao.php';

$select = 'select * from secesc';
$query = mysqli_query($conexao, $select);

cabecalhoSecEdu('../../../estilo/style.css', 'Secretários das Escolas', '../../escola', '../cadastrar-usuarios.php', '../../produto', '../../cardapio','../../../login/logOut.php');
sectionTop();

echo "<table> 
      <tr>
      <th>Nome</th>
      <th>Escola</th>
      </tr>";
while($table = mysqli_fetch_array($query)){
    $id = $table['id'];
    $nome = $table['nome'];
    $cpf = $table['cpf'];
    $rg = $table['rg'];
    $endereco = $table['endereco'];
    $email = $table['email'];
    $nascimento = $table['dataDeNascimento'];
    $numero = $table['numero'];
    $celular = $table['celular'];
    $escolaId = $table['escola_id'];

    $selectEscola = "select nome from escola where id=$escolaId";
    $queryEscola = mysqli_query($conexao, $selectEscola);
    $tableEscola = mysqli_fetch_array($queryEscola);
    $nomeEscola = $tableEscola['nome'];
    


echo "<tr>
      <td>$nome<td>
      <td>$nomeEscola</td>
      <td><a href='visualizar-secesc.php?id=$id'>Visualizar</a></td>
      <td><a href='atualizar-secesc.php?acao=atualizar&id=$id'>Atualizar</a></td>
      <td><a href='validar-secesc.php?acao=excluir&id=$id'>Excluir</a></td>
      </tr>";
}

echo "</table>";
?>

<a href="cadastrar-secesc.php" class="btn btn-dark">Cadastrar</a>

<?php 
sectionBaixo();
rodape();
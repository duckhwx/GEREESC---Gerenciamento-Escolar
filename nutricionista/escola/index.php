<?php
require_once "../../funcoes-de-cabecalho.php";
require_once "../../conexao.php";

session_start();
$_SESSION["idEscola"] = NULL;


cabecalhoNutricionista('../../estilo/styleNutricionista.css', 'Escola', '.', '../relatorio/', '../produto/', '../refeicao/', '../cardapio/', '../../login/logOut.php');
    
sectionTop();

$row =1;

//Seleção de todas as escolas cadastradas
$select = "select * from Escola";
$query = mysqli_query($conexao, $select);
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col" width=60%>Nome</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php
//Exibição dinamica de todas as escolas
    while($table = mysqli_fetch_array($query)){
        $id = $table['id'];
        $nome = $table['nome'];
            ?>

    <tr>
      <th scope="row"><?php echo $row; ?></th>
      <td><?php echo $nome; ?></td>
      <td><button  class="btn btn-light m-2"><a href="visualizar-escola.php?id=<?php echo $id; ?>" ><img src='https://image.flaticon.com/icons/svg/65/65000.svg' width=26px/></button></td>
      <td><button  class="btn btn-light m-2"><a href="estoque/estoque.php?id=<?php echo $id; ?>" ><img src='../../estilo/icones/box.png' width=24px/></button></td>
      
    </tr>
  
    <?php
    $row += 1;
    }
    ?>
    
 </tbody>
</table>

<?php 
sectionBaixo();
rodape();

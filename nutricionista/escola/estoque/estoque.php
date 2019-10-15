<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    session_start();
    
    cabecalhoNutricionista('../../../estilo/style.css', 'Estoque', '../', '../../relatorio/', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
    
    sectionTop();
    
//Session que pega o id da escola selecionada na página anterior.
    if($_SESSION["idEscola"] == NULL){
        $_SESSION["idEscola"] = $_GET['id'];
    }
  
    $id = $_SESSION['idEscola'];
    
//Requisição dos dados do estoque ao Banco de Dados
    $selectEstoque = "select * from Estoque where escola_id ='$id'";
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    
    echo "<table>"
    . "<tr>"
            . "<th>Nome</th>"
            . "<th>Tipo</th>"
            . "<th>Marca</th>"
            . "<th>Peso</th>"
            . "<th>Quantidade</th>"
    . "</tr>";
//Imprimir os dados dinamicamente em tabelas do estoque 
    while($table = mysqli_fetch_array($queryEstoque)){
        $idEstoque = $table['estoque_id'];
        $idProduto = $table['id'];
        $nomeProduto = $table['nomeProduto'];
        $nomeTipoProduto = $table['nomeTipoProduto'];
        $marca = $table['marca'];
        $peso = $table['peso'];
        $nomeTipoPeso = $table['nomeTipoPeso'];
        $quantidade = $table['quantidade'];
            
        echo "<tr>"
           . "<td>$nomeProduto</td>"
           . "<td>$nomeTipoProduto</td>"
           . "<td>$marca</td>"
           . "<td>$peso $nomeTipoPeso</td>"
           . "<td>$quantidade</td>"
           . "<td><a href='alterar-estoque.php?idEstoque=$idEstoque'>Alterar</a></td>"
           . "<td><a href='transferir-produtos.php?idEstoque=$idEstoque&quantidade=$quantidade&idProduto=$idProduto'>Transferir</a></td>"
           . "</tr>";
    }
    
    echo "</table>";
?>

<a href="alocar-produto.php?id=<?=$_SESSION["idEscola"]?>" class="btn btn-dark">Alocar Produto</a>

<?php
sectionBaixo();
rodape();
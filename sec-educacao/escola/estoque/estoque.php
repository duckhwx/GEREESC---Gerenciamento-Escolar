<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    session_start();
    
    cabecalhoSecEdu("Estoque", "../", "../../usuarios/cadastrar-usuarios.php", "../../produto", "../../cardapio");
    
    //Esta session serve para se ter o id da escola e poder exibir o estoque dela.
    if($_SESSION["idEscola"] == NULL){
        $_SESSION["idEscola"] = $_GET['id'];
    }
  
    // as estruturas abaixo tratam-se de selecionar o estoque e o exibir dinamicamente em forma de tabela no HTML
    $selectEstoque = "select Estoque.estoque_id, Produto.id, Produto.nomeProduto, TipoDeProduto.nomeTipoProduto, Produto.marca, Produto.peso, TipoDePeso.nomeTipoPeso, Estoque.quantidade from Estoque " 
                    ."inner join Produto on Estoque.produto_id = Produto.id "
                    ."inner join TipoDePeso on Produto.tipoDePeso_id = TipoDePeso.id "
                    ."inner join TipoDeProduto on Produto.tipoDeProduto_id = TipoDeProduto.id "
                    ."where escola_id =".$_SESSION["idEscola"];
    
    $queryEstoque = mysqli_query($conexao, $selectEstoque);
    
    echo "<table>"
    . "<tr>"
            . "<th>Nome</th>"
            . "<th>Tipo</th>"
            . "<th>Marca</th>"
            . "<th>Peso</th>"
            . "<th>Quantidade</th>"
    . "</tr>";
    
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
       //Além da exibição dinamica é colocado os links de alterar ou trasnferir produtos         
    }
    
    echo "</table>";
?>

<a href="alocar-produto.php?id=<?=$_SESSION["idEscola"]?>">Alocar Produto</a>

<?php
rodape();
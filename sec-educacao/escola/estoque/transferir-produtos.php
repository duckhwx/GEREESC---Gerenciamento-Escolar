<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    session_start();
    
    cabecalhoSecEdu('../../../estilo/style.css', 'Estoque', '../../escola/', '../../usuarios/cadastrar-usuarios.php', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
    
    sectionTop();

    $idEstoque = $_GET['idEstoque'];
    $quantidade = $_GET['quantidade'];
    $idProduto = $_GET['idProduto'];
    
    if($_SESSION["idEscola"] == NULL){
        $_SESSION["idEscola"] = $_GET['id'];
    }
    
//Requisição dos dados da escola "A que envia-rá os produtos" ao Banco de dados
    $selectEscola = 'select Escola.nome from Escola where id = '.$_SESSION['idEscola'];
    $queryEscola = mysqli_query($conexao, $selectEscola);
    $tableEscola = mysqli_fetch_array($queryEscola);
    $nomeEscola = $tableEscola['nome'];

//Requisição dos dados da escola alvo "a que receberá os produtos" ao Banco de dados
    $selectEscAlvo = 'select Escola.id, Escola.nome from Escola where Escola.id <> '.$_SESSION['idEscola'];
    $queryEscAlvo = mysqli_query($conexao, $selectEscAlvo);
    
?>

<form method="post" action="validar-estoque.php?acao=transferir&idEstoque=<?=$idEstoque?>&quantidade=<?=$quantidade?>&idProduto=<?=$idProduto?>">
    Escola <?php echo $nomeEscola ?><br>
    Trasnferir para <?php
    echo "<select name='escolaAlvo'>";
//Exibição dinamica das escolas alvos a serem selecionadas.
    while ($tableEscAlvo = mysqli_fetch_array($queryEscAlvo)) {
        $idEscola = $tableEscAlvo['id'];
        $nome = $tableEscAlvo['nome'];

        echo "<option value=$idEscola>$nome</option>";
    }
    echo "</select>";
    ?><br>
    Quantidade <input type="number" name="quantidade" max="<?=$quantidade?>"><br>
    <input type="submit" class="btn btn-dark m-2" value="Transferir">
</form>

<?php
    sectionBaixo();
rodape();

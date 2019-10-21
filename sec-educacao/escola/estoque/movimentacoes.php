<?php
require_once "../../../funcoes-de-cabecalho.php";
require_once "../../../conexao.php";
session_start();

cabecalhoSecEdu('../../../estilo/style.css', 'Movimentações', '../../escola/', '../../usuarios/cadastrar-usuarios.php', '../../produto/', '../../refeicao/', '../../cardapio/', '../../../login/logOut.php');
sectionTop();

$selectEstoque = "select Escola.nome, Produto.nomeProduto, Estoque.quantidade, Estoque.quantMal, Estoque.acao, Estoque.status from Estoque "
        . "inner join Escola on Estoque.escola_id = Escola.id "
        . "inner join Produto on Estoque.produto_id = Produto.id "
        . "where escola_id = ".$_SESSION["idEscola"]." "
        . "order by Estoque.status desc";
$queryEstoque = mysqli_query($conexao, $selectEstoque);

echo "<h3 class='m-3'>Historico de Movimentações</h3>";
echo "<div class='alert alert-light ' role='alert'>"
    . "Nome da Escola | Produto | Quantidade Atual | Quantidade Movimentada | Ação | Status Atual"
    . "</div>";
while($table = mysqli_fetch_array($queryEstoque)){
    $escNome = $table['nome'];
    $nomeProduto = $table['nomeProduto'];
    $quantidade = $table['quantidade'];
    $quantMov = $table['quantMal'];
    $acao = $table['acao'];
    $status = $table['status'];

    if($status == 0){
        $status = 'Desativo';
    } else if($status == 1){
        $status = 'Ativo';
    }
    if($acao == 'Adicionado'){
        echo "<div class='alert alert-info ' role='alert'>
                $escNome | $nomeProduto | $quantidade | +$quantMov | $acao | $status
             </div>";
    } 
    else if($acao == 'Retirado'){
        echo "<div class='alert alert-danger' role='alert'>
                $escNome | $nomeProduto | $quantidade | -$quantMov | $acao | $status
             </div>";
    }
    else if($acao == 'Transferido'){
        echo "<div class='alert alert-dark' role='alert'>
                $escNome | $nomeProduto | $quantidade | $quantMov | $acao | $status
             </div>";
    }
}
?>

<?php
sectionBaixo();
rodape();
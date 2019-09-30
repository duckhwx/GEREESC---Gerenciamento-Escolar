<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';


if($_GET['acao'] == "cadastrar"){
$acao = "Cadastrar";
} else if($_GET['acao'] == "atualizar"){
$acao = "Atualizar";
$id = $_GET['id'];

$select = "select * from Refeicao where id = $id";
$query = mysqli_query($conexao, $select);
$tbl = mysqli_fetch_array($query);
}

cabecalhoNutricionista("$acao Refeição", "../../escola", "../../relatorio", "../../produto", "../index.php", "../../../login/deslogar");
?>
<br>
  
<form method="post" action="validar-refeicao.php?acao=<?php echo $_GET['acao']; 
            if($acao == "Atualizar"){
                echo "&id=$id";
            }
        ?>">
    Nome <input type="text" required name="nome" maxlength="64" value='<?php
        if(isset($acao) and $acao == "Atualizar"){
            echo $tbl['nome'];
        }
    ?>'>
    <input type="submit" value="<?=$acao?>">
</form>

<a href="index.php">Voltar</a>

 <?php
 
 rodape();
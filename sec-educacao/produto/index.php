<?php
require_once '../../funcoes-de-cabecalho.php';
require_once '../../conexao.php';
require_once '../../login/funcoesdelogin.php';

autenticar('../../index.php');

cabecalhoSecEdu('../../estilo/tableStyle.css', 'Usuarios', '../escola/', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '../cardapio/', '../perfil/', '../../login/logOut.php');

$select = "select Produto.nomeProduto, Produto.marca, Produto.peso, TipoDeProduto.nomeTipoProduto, TipoDePeso.nomeTipoPeso from Produto "
        . "inner join TipoDeProduto on Produto.tipoDeProduto_id = TipoDeProduto.id "
        . "inner join TipoDePeso on Produto.tipoDePeso_id = TipoDePeso.id";
$query = mysqli_query($conexao, $select);
sectionTop();

if($query == true and mysqli_num_rows($query) > 0)
{

    echo "<table class='table'>"
        . "<thead class='thead-dark'>"
            . "<th>Nome</th>"
            . "<th>Tipo</th>"
            . "<th>Marca</th>"
            . "<th>Peso</th>"
            . "</thead>"
        . "<tbody>";

    
    while($table = mysqli_fetch_array($query)){
        $nomeProduto = $table['nomeProduto'];
        $marcaProduto = $table['marca'];
        $pesoProduto = $table['peso'];
        $tipoPeso = $table['nomeTipoPeso'];
        $tipoProduto = $table['nomeTipoProduto'];
        
        echo "<tr>"
            . "<td>$nomeProduto</td>"
            . "<td>$tipoProduto</td>"
            . "<td>$marcaProduto</td>"
            . "<td>$pesoProduto $tipoPeso</td>"
            . "</tr>";
    }
} 

else 
{
 echo "<div class='font-weight-normal my-3'>Nenhum produto cadastrado</div>";
}
?>
</tbody>
</table>
<?php 
sectionBaixo();
rodape();

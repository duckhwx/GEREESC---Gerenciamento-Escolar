<?php
require_once '../../conexao.php';
require_once '../../funcoes-de-cabecalho.php';
require_once '../../login/funcoesdelogin.php';

autenticar('../../index.php');

cabecalhoSecEdu('../../estilo/tableStyle.css', 'Refeições', '../escola/', '../usuarios/cadastrar-usuarios.php', '../produto/', '.', '../cardapio/', '../perfil/', '../../login/logOut.php');

$select = "select * from Refeicao";
$query = mysqli_query($conexao, $select);

sectionTop();

if(mysqli_num_rows($query) > 0)
{
    ?>
    <table class="table">
        <thead class="thead-dark">
        <th scope="col" colspan="3">Refeição</th>
    </thead>
    <tbody>
        <?php
        while ($tbl = mysqli_fetch_array($query)) {

            echo "<tr><td>"
            . "".$tbl['nome'].""
            . "</td></tr>";
        }
        ?>
    </tbody>
    </table>
<?php
}
else 
{
    echo "<div class='font-weight-normal my-3'>Nenhuma refeição cadastrada</div>";
}

?>

<?php
sectionBaixo();
rodape();
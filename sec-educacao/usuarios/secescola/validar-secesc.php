<?php
require_once '../../../funcoes-de-cabecalho.php';
require_once '../../../conexao.php';

$acao = $_GET['acao'];

if ($acao == 'cadastrar') {
    $acaoHTML = "Cadastrar";
} else if ($acao == 'atualizar') {
    $acaoHTML = "Atualizar";
    $id = $_GET['idSecEsc'];

    $select = "select * from SecEsc where id=$id";
    $query = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($query);

    $nomeSecEsc = $table['nomeSecEsc'];
    $cpf = $table['cpf'];
    $rg = $table['rg'];
    $endereco = $table['endereco'];
    $email = $table['email'];
    $dataNascimento = $table['dataDeNascimento'];
    $numero = $table['numero'];
    $celular = $table['celular'];
    $escola_id = $table['escola_id'];
}

cabecalhoSecEdu("../../../estilo/style.css", "$acaoHTML Secretário da Escola", "../../escola/", "../cadastrar-usuarios.php", "../../produto/", "../../refeicao/", "../../cardapio/", "../../../login/logOut.php");
sectionTop();
?>
<h3><?php echo $acaoHTML ?> Secretário da Escola</h3>
<form method="post" action="verificacao.php?acao=<?php
if (!empty($id)) {
    echo $acao . "&id=$id";
} else {
    echo $acao;
}
?>">
    <label>Nome</label>
    <input type="text" class="form-control" required maxlength="64" name="nome"<?php
        if (!empty($nomeSecEsc)) {
            echo " value='" . $nomeSecEsc . "'";
    }
    ?>>
    <label>CPF</label>
    <input type="text" class="form-control" required maxlength="11" name="cpf"<?php
        if (!empty($cpf)) {
            echo " value='" . $cpf . "'";
    }
    ?>>
    <label>RG</label>
    <input type="text" class="form-control" required maxlength="11" name="rg"<?php
        if (!empty($rg)) {
            echo " value='" . $rg . "'";
    }
    ?>>
    <label>Endereco</label>
    <input type="text" class="form-control" required maxlength="255" name="endereco"<?php
        if (!empty($endereco)) {
            echo " value='" . $endereco . "'";
    }
    ?>>
    <label>E-Mail</label>
    <input type="email" class="form-control" required maxlength="255" name="email"<?php
        if (!empty($email)) {
            echo " value='" . $email . "'";
    }
    ?>>
    <label>Data de Nascimento</label>
    <input type="date" class="form-control" required  name="nascimento"<?php
        if (!empty($dataNascimento)) {
            echo " value='" . $dataNascimento . "'";
    }
    ?>>
    <label>Número</label>
    <input type="text" class="form-control" required maxlength="8" name="numero"<?php
        if (!empty($numero)) {
            echo " value='" . $numero . "'";
    }
    ?>>
    <label>Celular</label>
    <input type="text" class="form-control" required maxlength="15" name="celular"<?php
        if (!empty($celular)) {
            echo " value='" . $celular . "'";
    }
    ?>>
    <label class="d-flex justify-content-center">Escola</label>
    <?php
        $selectEscolas = "select * from Escola";
        $queryEscolas = mysqli_query($conexao, $selectEscolas);
        echo "<select name='escola' class='custom-select'>";
        while ($table = mysqli_fetch_array($queryEscolas)) {
            $idEscola = $table['id'];
            $nome = $table['nomeEscola'];

            if($escola_id == $idEscola){
                echo "<option value=$idEscola selected>$nome</option>";
            }
            else {
                echo "<option value=$idEscola>$nome</option>";
            }
    }
    echo "</select>";
    ?>
    <input type="submit" class="btn btn-dark mt-4" value="<?php
        if (!empty($id)) {
            echo $acaoHTML;
        } else {
            echo $acaoHTML;
        }
    ?>">
</form>
<?php
sectionBaixo();
rodape();

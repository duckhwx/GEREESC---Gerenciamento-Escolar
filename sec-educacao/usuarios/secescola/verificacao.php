<?php

require_once '../../../conexao.php';

if(!empty($_GET['acao'])){
    if($_GET['acao'] == 'cadastrar' or $_GET['acao'] == 'atualizar') {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $numero = $_POST['numero'];
    $celular = $_POST['celular'];
    $escola = $_POST['escola'];

        if($_GET['acao'] == 'cadastrar') {
        $insert = "insert into SecEsc values (default, "
            . "'$nome', "
            . "'$login', "
            . "'$senha', "
            . "'$cpf', "
            . "'$rg', "
            . "'$endereco', "
            . "'$email', "
            . "'$nascimento', "
            . "'$numero', "
            . "'$celular', "
            . "$escola)";

        $query = mysqli_query($conexao, $insert);

            if ($query) {
                header("Location: index.php");
            } else {
                header("Location: validar-secesc.php");
            }
        } 
        else if ($_GET['acao'] == 'atualizar') {
            $idEscola = $_GET['id'];
            $update = "update SecEsc set nomeSecEsc='$nome',"
            . " cpf='$cpf',"
            . " rg='$rg',"
            . " endereco='$endereco',"
            . " email='$email',"
            . " dataDeNascimento='$nascimento',"
            . " numero='$numero',"
            . " celular='$celular',"
            . " escola_id=$escola where id=$idEscola";

            $query = mysqli_query($conexao, $update);

            if ($query) {
                header('Location: index.php');
            } else {
                header('Location: validar-secesc.php');
            }
        }
    }
}

else if (!empty($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == 'getById') {
        $id = $_POST['idSecEsc'];

        $select = "select Escola.nomeEscola, SecEsc.nomeSecEsc, SecEsc.cpf, SecEsc.rg, SecEsc.endereco, SecEsc.email, SecEsc.dataDeNascimento, SecEsc.numero, SecESc.celular from SecEsc "
                . "inner join Escola on SecEsc.escola_id = Escola.id where SecEsc.id = $id";
        $query = mysqli_query($conexao, $select);
        $table = mysqli_fetch_array($query);

        echo json_encode($table);
    }
    else if ($acao == 'getDataSecEsc') {
        $id = $_POST['idSecEsc'];

        $select = "select SecEsc.nomeSecEsc, SecEsc.id from SecEsc where id=$id";
        $query = mysqli_query($conexao, $select);
        $table = mysqli_fetch_array($query);

        echo json_encode($table);
    }
    else if ($acao == 'excluir') {
        $id = $_POST['idSecEsc'];

        $excluir = "delete from SecEsc where id=$id";
        $query = mysqli_query($conexao, $excluir);
    }
}
<?php
require_once '../../conexao.php';

$id = $_POST['id'];

$delete = "delete from Cardapio_Refeicao where id=$id";
$query = mysqli_query($conexao, $delete);


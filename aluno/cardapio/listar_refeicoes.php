<?php
require_once '../../conexao.php';
session_start();

//string e função seleciona as refeições de um ano escolar no banco de dados
$select = 'select Refeicao.nome, Cardapio_refeicao.data from Cardapio_Refeicao inner join Refeicao
on Rardapio_Refeicao.refeicao_id = Refeicao.id where Cardapio_Refeicao.anoEscolar_id = '.$_SESSION['anoEscolar_id'];
$query = mysqli_query($conexao, $select);

$refeicoes = [];

while($tbl = mysqli_fetch_array($query)){
    $refeicao = $tbl['nome'];
    $data = $tbl['data'];
    
    $refeicoes[] = [
        'title' => $refeicao,
        'start' => $data,
    ];
}

//função que transforma o array $refeições em um dado JSON para poder ser trabalhado no calendario.js
echo json_encode($refeicoes);

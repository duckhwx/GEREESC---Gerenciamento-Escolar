<?php
require_once '../../conexao.php';
require_once '../../login/funcoesdelogin.php';
require_once '../../funcoes-de-cabecalho.php';


    cabecalhoSecEsc('../../estilo/style.css', 'Escola', '../aluno', '../escola', '../estoque', '../cardapio','../../login/logOut.php');
    sectionTop();
    
    //PEGANDO O ID DO USUARIO LOGADO
    $id = userid();
    
    $select = "select * from secesc where id='$id'";
    
    $query = mysqli_query($conexao, $select);
    $table1 = mysqli_fetch_array($query);
    $escola_id = $table1['escola_id'];
    
    //Seleção dos dados da escola selecionada no index
    $query1 = mysqli_query($conexao, "select * from escola where id='$escola_id'");
    $table = mysqli_fetch_array($query1);

    $nome = $table['nome'];
    $endereco = $table['endereco'];
    $cnpj = $table['cnpj'];
    $email = $table['email'];
    $numero = $table['numero'];
    $telefone = $table['telefone'];
    $alunosEnsInfantil = $table['alunosEnsInfantil'];
    $alunosEnsFundamental = $table['alunosEnsFundamental'];
    
    ?>
    
                <p>Nome: <?=$nome?></p>
                <p>Endereço: <?=$endereco?></p>
                <p>CNPJ: <?=$cnpj?></p>
                <p>E-mail: <?=$email?></p>
                <p>Numero: <?=$numero?></p>
                <p>Telefone: <?=$telefone?></p>
                <p>Numero de Alunos</p>
                <p>Ensino Infantil: <?=$alunosEnsInfantil?></p>
                <p>Ensino Fundamental: <?=$alunosEnsFundamental?></p>
                <br><br>

                <a href="../index.php" class="btn btn-dark">Voltar</a>
    
    
    
<?php    
    sectionBaixo();
    rodape();
?>
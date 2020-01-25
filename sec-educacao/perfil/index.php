<?php
    require_once "../../funcoes-de-cabecalho.php";
    require_once "../../conexao.php";
    require_once '../../login/funcoesdelogin.php';

    autenticar('../index.php');

    cabecalhoSecEdu('../../estilo/style.css', 'Usuarios', '../escola/', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '../cardapio/', '.', '../../login/logOut.php');

    sectionTop();

    $select = "select nome, email, login from SecEdu where id = ".userid()."";
    $query = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($query);

    $nome = $table['nome'];
    $email = $table['email'];
    $login = $table['login'];
?>
    <h3>Usuário</h3>
    <hr>
    <div class="my-2">Nome <span><?php echo $nome ?></span></div>
    <div class="my-2">E-Mail <span><?php echo $email ?></span></div>
    <div class="my-2">Login <span><?php echo $login ?></span></div>
    
    <a class="btn btn-dark buttonLink mt-4 mb-3" href="alterarPerfil.php">Alterar Dados</a>

<?php 
    sectionBaixo();
?>
<?php
    require_once "../../funcoes-de-cabecalho.php";
    require_once "../../conexao.php";
    require_once '../../login/funcoesdelogin.php';

    autenticar('../index.php');

    cabecalhoSecEdu('../../estilo/style.css', 'Usuarios', '../escola/', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '../cardapio/', 'index.php', '../../login/logOut.php');

    sectionTop();

    $select = "select nome, email, login from SecEdu where id = ".userid()."";
    $query = mysqli_query($conexao, $select);
    $table = mysqli_fetch_array($query);

    $nome = $table['nome'];
    $email = $table['email'];
    $login = $table['login'];

    $id = userid();
?>
    <h3>Alterar Dados</h3>
    <hr>
    <form method="post" action="verificarAlteracao.php?id=<?php echo $id ?>">

    <label>Nome</label>
        <input type="text" class="form-control" name="nome" maxlength="64" value="<?php echo $nome ?>" required>

    <label>E-mail</label>
        <input type="text" class="form-control" name="email" maxlength="255" value="<?php echo $email?>" required>

    <label>Login</label>
        <input type="text" class="form-control" name="login" maxlength="64" value="<?php echo $login ?>" required>

    <label>Senha</label>
        <input type="password" class="form-control" name="senha" maxlength="64" required>

    <input type="submit" class="btn btn-dark buttonLink mt-4" href="alterarPerfil.php" value="Alterar">

    </form>
<?php 
    sectionBaixo();
?>
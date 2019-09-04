<?php
require_once '../../../funcoes-de-cabecalho.php';

cabecalhoSecEdu("Cadastrar Nutricionista", "../../escola", "../index.php", "../../produto", "../../cardapio");
?>

<form method="post" action="validar-nutricionista.php?acao=cadastrar">
    Nome <input type="text" required maxlength="64" name="nome"><br>
    CPF <input type="text" required maxlength="11" name="cpf"><br>
    RG <input type="text" required maxlength="11" name="rg"><br>
    Endereco <input type="text" required maxlength="255" name="endereco"><br>
    E-Mail <input type="email" required maxlength="255" name="email"><br>
    Data de Nascimento <input type="date" required  name="nascimento"><br>
    Número <input type="text" required maxlength="8" name="numero"><br>
    Celular <input type="text" required maxlength="15" name="celular"><br>
    Login <input type="text" required maxlength="64" name="login"><br>
    Senha <input type="text" required maxlength="64" name="senha"><br>
    <input type="submit" value="Cadastrar Nutricionista">
</form>

<br>
<a href="index.php">Voltar</a>

<?php 

rodape();
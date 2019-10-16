<?php
require_once("../../funcoes-de-cabecalho.php");
cabecalhoSecEdu('../../estilo/style.css', 'Cadastrar Escola', '../escola/', '../usuarios/cadastrar-usuarios.php', '../produto/', '../refeicao/', '../cardapio/', '../../login/logOut.php');
    
sectionTop();
?>
<br>
<form method="post" action="verificar-escola.php?acao=cadastrar"><br>
    Nome <input type="text" required maxlength="100" name="nomeEscola"><br>
    Endereco <input type="text" required maxlength="255" name="enderecoEscola"><br>
    Numero <input type="text" required maxlength="8" name="numeroEscola"><br>
    CNPJ <input type="text" required maxlength="12" name="cnpjEscola"><br>
    E-mail <input type="email" required maxlength="255" name="emailEscola"><br>
    Telefone <input type="text" required maxlength="12" name="telefoneEscola"><br>
    Numero de Alunos: <br>
    Ensino Infantil <input type="number" maxlength="4" name="alunosEnsInfantil"><br>
    Ensino Fundamental <input type="number" maxlength="4" name="alunosEnsFundamental"><br>
    <input type="submit" class="btn btn-dark m-2" value="Cadastrar Escola">
</form>
<br>

<a href="index.php">Voltar</a>
<?php 
sectionBaixo();
rodape();

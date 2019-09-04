<?php
require_once '../../../funcoes-de-cabecalho.php';

//cabecalhoSecEdu("Atualizar Nutricionista", "../../escola", "../index.php", "../../produto", "../../cardapio");


    $id = $_GET['id'];

    $select = "select * from escola";

    $query = mysqli_query($conexao, $select);

?>
<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../estilo/styleCadastro.css"/>
    <meta charset='UTF-8'>
    <title>Atualizar Secretário da Escola</title>
    </head>
    <body>
        <header>
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        <a href='../../escola'>Escolas</a>
                    </div>
                    <div class='col'>
                        <a href='../index.php'>Usuários</a>
                    </div>
                    <div class='col'>
                        <a href='../../produto'>Produtos</a>
                    </div>
                    <div class='col'>
                        <a href='../../cardapio'>Cardápio</a>
                    </div>
                </div>
            </div>
        </header>   
        <section>
            <div id='Cadastro'>                
                <form method="post" action="validar-secesc.php?acao=atualizar&id=<?=$id?>">
                Nome <input type="text" required maxlength="64" name="nome"><br>
                    CPF <input type="text" required maxlength="11" name="cpf"><br>
                    RG <input type="text" required maxlength="11" name="rg"><br>
                    Endereco <input type="text" required maxlength="255" name="endereco"><br>
                    E-Mail <input type="email" required maxlength="255" name="email"><br>
                    Data de Nascimento <input type="date" required  name="nascimento"><br>
                    Número <input type="text" required maxlength="8" name="numero"><br>
                    Celular <input type="text" required maxlength="15" name="celular"><br>
                    Escola  <?php
                                echo "<select name='escola'>";
                                    while($table = mysqli_fetch_array($query)){
                                        $id = $table['id'];
                                        $nome = $table['nome'];

                                        echo "<option value=$id>$nome</option>";
                                    }
                                        echo "</select>";
                             ?><br>
                    Login <input type="text" required maxlength="64" name="login"><br>
                    Senha <input type="text" required maxlength="64" name="senha"><br><br>
                    <input type="submit" value="Atualizar Secretario da Escola">
                </form>
            </div>
        </section>


<br>
<a href="index.php">Voltar</a>

<?php 

rodape();
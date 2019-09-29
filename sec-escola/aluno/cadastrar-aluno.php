<?php
require_once '../../funcoes-de-cabecalho.php';;
require_once '../../conexao.php';

cabecalhoSecEsc('../../estilo/style.css','Secretário da Escola - Cadastrar Alunos', 'index.php', '../escola/', '../estoque/', '../cardapio/','../../login/logOut.php');

sectionTop();

$select2 = "select * from AnoEscolar";
$select3 = "select * from Escola";

$query2 = mysqli_query($conexao, $select2);
$query3 = mysqli_query($conexao, $select3);

?>
                <form method="post" action="validar-aluno.php?acao=cadastrar">
                    Nome <input type="text" required maxlength="64" name="nome"><br>
                    Login <input type="text" required maxlength="64" name="login"><br>
                    Senha <input type="text" required maxlength="64" name="senha"><br>
                    Data de Nascimento <input type="date" required  name="nascimento"><br>
                    <br>
                    Ano Escolar  <?php
                                echo "<select name='anoEscolar'>";
                                    while($table = mysqli_fetch_array($query2)){
                                        $id = $table['id'];
                                        $nome = $table['nome'];

                                        echo "<option value=$id>$nome</option>";
                                    }
                                        echo "</select>";
                             ?><br>
                    <br>
                    Escola  <?php
                   
                                echo "<select name='escola'>";
                                    while($table = mysqli_fetch_array($query3)){
                                        $id = $table['id'];
                                        $nome = $table['nome'];

                                        echo "<option value=$id>$nome</option>";
                                    }
                                        echo "</select>";
                             ?><br>
                    <br>
                    <input type="submit" value='Cadastrar' class="btn btn-dark">
                </form>
<br>
<a href="index.php">Voltar</a>

<?php 

sectionBaixo();

rodape();

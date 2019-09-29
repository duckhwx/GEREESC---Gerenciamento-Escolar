<?php
require_once '../../funcoes-de-cabecalho.php';
require_once "../../conexao.php";

cabecalhoSecEsc('../../estilo/style.css','Secretário da Escola - Atualizar Alunos', 'index.php', '../escola/', '../estoque/', '../cardapio/','../../login/logOut.php');

sectionTop();
    
    
    $select1 = "select * from SecEsc";
    $select2 = "select * from AnoEscolar";
    $select3 = "select * from escola";

    $query1 = mysqli_query($conexao, $select1);
    $query2 = mysqli_query($conexao, $select2);
    $query3 = mysqli_query($conexao, $select3);

?>
        <form method="post" action="validar-aluno.php?acao=atualizar">
        Nome <input type="text" required maxlength="64" name="nome"><br>
        Login <input type="text" required maxlength="64" name="login"><br>
        Senha <input type="text" required maxlength="64" name="senha"><br>
        Data de Nascimento <input type="date" required  name="nascimento"><br>
        Secretário da Escola  <?php
            echo "<select name='secesc'>";
                while($table = mysqli_fetch_array($query1)){
                    $id = $table['id_secesc'];
                    $nome = $table['nome'];

                    echo "<option value=$id>$nome</option>";
                }
            echo "</select>";
        ?><br>
        <br>
        Ano Escolar  <?php
            echo "<select name='anoEscolar'>";
                while($table = mysqli_fetch_array($query2)){
                    $id = $table['id_anoEscolar'];
                    $nome = $table['nome'];

                    echo "<option value=$id>$nome</option>";
                }
                echo "</select>";
            ?><br>
        <br>
        Escola  <?php
            echo "<select name='escola'>";
                while($table = mysqli_fetch_array($query3)){
                    $id = $table['id_escola'];
                    $nome = $table['nome'];
                   
                echo "<option value=$id>$nome</option>";
            }
            echo "</select>";
        ?><br>
        <br>
        <input type="submit" class="btn btn-dark" value="Atualizar Aluno">
    </form>
<br>
<a href="index.php">Voltar</a>

<?php 
        sectionBaixo();
rodape();

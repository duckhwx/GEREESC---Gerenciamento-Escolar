<?php
require_once '../../../funcoes-de-cabecalho.php';
require_once "../../../conexao.php";

cabecalhoSecEdu('../../../estilo/style.css', 'Atualizar Secretario da Escola', '../../escola', '../cadastrar-usuarios.php', '../../produto', '../../cardapio','../../../login/logOut.php');
sectionTop();

    $id = $_GET['id'];

    $select = "select * from escola";

    $query = mysqli_query($conexao, $select);

?>
                
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
                    <input type="submit" class="btn btn-dark" value="Atualizar Secretario da Escola">
                </form>
<br>
<a href="index.php">Voltar</a>

<?php 
sectionBaixo();
rodape();
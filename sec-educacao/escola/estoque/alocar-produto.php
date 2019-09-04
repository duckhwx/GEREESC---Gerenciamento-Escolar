<?php
    require_once "../../../funcoes-de-cabecalho.php";
    require_once "../../../conexao.php";
    
    cabecalhoSecEdu("Estoque", "../", "../../usuarios/cadastrar-usuarios.php", "../../produto", "../../cardapio");
    
    $id = $_GET['id'];
    
    $select = "select * from Produto";
    
    $query = mysqli_query($conexao, $select);
       
?>
<br><br>
<form method="post" action="validar-estoque.php?acao=alocar&id=<?=$id?>">
    Produto <?php
                echo "<select name='produto'>";
                    while($table = mysqli_fetch_array($query)){
                        $id = $table['id'];
                        $nome = $table['nome'];
                        
                        echo "<option value='$id'>$nome</option>";
                    }
                echo "</select>"
            ?><br>
    Quantidade <input type="number" name="quantidade" required><br>
               <input type="submit" value="Alocar">
</form>



<?php
rodape();


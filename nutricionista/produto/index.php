<?php

    require_once '../../conexao.php';
    require_once '../../funcoes-de-cabecalho.php';
    
    cabecalhoNutricionista('../../estilo/styleNutricionista.css', 'Cadastrar Produtos', '../escola', '../relatorio', '../produto', '../cardapio','../../login/logOut.php');
    
    sectionTop();
    
    $select = "select * from produto";
    
    $query = mysqli_query($conexao, $select);
    
    $row =1;
    
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
      $(document).ready(function(){
          $('.veiz').on("click", function(){
              var buttonId = $(this).val();

            $.ajax({
                 method: 'post',
                 url: 'validar-produto.php',
                 data: {
                     id: buttonId,
                     acao: 'getById'
                 },
                 dataType: "json",
                 success: function(data){
                     $("#nomeProduto").html(data.nomeProduto);
                    
                 }
              });
              $("#modalProduto").modal("show");
          });
      });
  </script>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col" width=60%>Nome</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php  while($table = mysqli_fetch_array($query)){
            $id = $table['id'];
            $nome = $table['nomeProduto'];
            
    ?>
    <tr>
      <th scope="row"><?php echo $row; ?></th>
      <td><?php echo $nome; ?></td>
      <td><button  class="btn btn-light veiz" value="<?php echo $id; ?>" ><img src='https://image.flaticon.com/icons/svg/65/65000.svg' width=26px/></button></td>
      <td><button  class="btn btn-light veiz" value="<?php echo $id; ?>" ><img src='https://image.flaticon.com/icons/svg/1001/1001371.svg' width=24px/></button></td>
      <td><button  class="btn btn-light veiz" value="<?php echo $id; ?>" ><img src='https://image.flaticon.com/icons/svg/32/32178.svg' width=24px/></button></td>
    </tr>
  
    <?php
    $row += 1;
    }
    ?>
  </tbody>
</table>
    
    

<a href="cadastrar-produto.php" class="btn btn-dark m-2">Cadastrar Produto</a>  <a href="TipoDeProduto/index.php" class="btn btn-dark m-2">Tipo de Produto</a>
    
    
    <?php
    sectionBaixo();
    ?>

<!-- Modal -->
<div class="modal fade" id="modalProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNome"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="nomeProduto"></div>
      </div>
    </div>
  </div>
</div>    
<?php
    rodape();
    
    
    
//echo '<table>';
//    
//        while($table = mysqli_fetch_array($query)){
//            $id = $table['id'];
//            $nome = $table['nomeProduto'];
//            
//
//            echo"$nome  "
//                . "<a href='visualizar-produto.php?id=$id'>Visualizar</a>  "
//                . "<a href='atualizar-produto.php?id=$id'>Atualizar</a>  "
//                . "<a href='validar-produto.php?id=$id&acao=excluir'>Excluir</a>"
//                . "<br>";
//            $row += 1;
//        }
//    echo "</table>";


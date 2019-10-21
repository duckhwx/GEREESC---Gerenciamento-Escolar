$(document).ready(function(){
   $('.reduzir-produto').on('click', function(){
     var idEstoque = $(this).val();
     
     $.ajax({
        method: 'post',
        url: 'reduzir.php',
        data:{
            id: idEstoque,
            acao: 'getById'
        },
        dataType: 'json',
        success: function(data){
            $('input[name=quant]').attr({
                'max': data.quantidade,
                'min': 0
            });
            $('#modalTitulo').html('Dar baixa em '+data.nomeProduto);
        }
     });
     
     $('#modalReduzir').modal('show');
     $('#formReduzir').submit(function(){
        event.preventDefault();
        $.ajax({
           method: 'post',
           url: 'reduzir.php',
           data: {
               id: idEstoque,
               quantidade: $('input[name=quant]').val(),
               acao: 'reduzir'
           },
           success: function(){
               location.reload();
           }
        });
     });
   });
});


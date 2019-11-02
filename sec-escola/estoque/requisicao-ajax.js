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
            $('#idEstoque').val(data.estoque_id);
            $('#modalTitulo').html('Dar baixa em '+data.nomeProduto);
        }
     });
     
     $('#modalReduzir').modal('show');
   });
    $('#formReduzir').submit(function () {
        event.preventDefault();
        $.ajax({
            method: 'post',
            url: 'reduzir.php',
            data: {
                id: $('#idEstoque').val(),
                quantidade: $('input[name=quant]').val(),
                acao: 'reduzir'
            },
            success: function () {
                location.reload();
            }
        });
    });
    
//Função que limpa todos os campos dos inputs toda vez que o modal de cadastro/atualização é fechado
    $('.modal').on('hide.bs.modal', function () {
        $('form input').val("");
    });
});


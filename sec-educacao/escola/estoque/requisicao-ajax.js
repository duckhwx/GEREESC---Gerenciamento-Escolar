$(document).ready(function () {
    $('#buttonAdicionar').on('click', function () {
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                acao: 'exibirDados'
            },
            success: function (data) {
                if ($('#selectProduto>option').length === 0) {
                    $.each(JSON.parse(data), function (index, value) {
                        $('#selectProduto').append('<option value=' + value.id + '>' + value.nome + '</option>');
                    });
                }
            }
        });
        $('#modalAdicionar').modal('show');
        $('#addProduto').submit(function () {
            event.preventDefault();
            $.ajax({
                method: 'post',
                url: 'verificacao.php',
                data: {
                    id: $('select[name=produto]').val(),
                    quantidade: $('input[name=quantidade]').val(),
                    acao: 'cadastrar'
                },
                success: function () {
                    location.reload();
                }
            });
        });
    });

    $('.alocar-produto').on('click', function () {
        var idEstoque = $(this).val();
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                id: idEstoque,
                acao: 'getById'
            },
            success: function (data) {
                var produto = JSON.parse(data);
                $('input[name=produtoNome]').val(produto.nomeProduto);
            }
        });
        $('#modalAlocar').modal('show');
        $('#alocarProduto').submit(function (event) {
            event.preventDefault();
            $.ajax({
                method: 'post',
                url: 'verificacao.php',
                data: {
                    id: idEstoque,
                    quantidade: $('input[name=quantidadeAlocada]').val(),
                    acao: 'alocar'
                },
                success: function () {
                    location.reload();
                }
            });
        });
    });

    $('.transferir-produto').on('click', function () {
        var idEstoque = $(this).val();
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                id: idEstoque,
                acao: 'getDataTransferir'
            },
            dataType: 'json',
            success: function (data) {
                if ($('#escolaAlvo>option').length === 0) {
                    $.each(data, function (index, value) {
                        if (index !== (data.length - 1)) {
                            $('#escolaAlvo').append('<option value=' + value.idEscola + '>' + value.nomeEscola + '</option>');
                        }
                    });
                }
                var itens = data[data.length-1];
                $('#produtoTransferir').html(itens.nomeProduto);
                $('#escola').html(itens.escola);
                $('input[name=quantidadeTransferida]').attr({
                    'max' : itens.quantidade
                });
            }
        });
        
        $('#modalTransferir').modal('show');
        $('#transferirProduto').submit(function(){
           event.preventDefault();
           $.ajax({
               method: 'post',
               url: 'verificacao.php',
               data: {
                   id: idEstoque,
                   escolaAlvo: $('select[name=escolaAlvo]').val(),
                   quantidade: $('input[name=quantidadeTransferida]').val(),
                   acao: 'transferir'
               },
               success: function(){
                    location.reload();
               }
           });
        });
    });
});
$(document).ready(function () {
    $('#button-cadastro').click(function (event) {
        event.preventDefault();

        $('#tituloModal').html('Cadastrar Tipo de Produto');
        $('#buttonSubmit').val('Cadastrar');
        $('#modalTipoProduto').modal('show');
        $('#formulario').submit(function () {

            $.ajax({
                method: 'post',
                url: 'verificacao.php',
                data: {
                    nome: $('input[name=nome]').val(),
                    acao: 'cadastrar'
                },
                success: function () {
                    location.reload();
                }
            });

        });
    });

    $('.button-atualizar').on("click", function () {
        var buttonId = $(this).val();
        $.ajax({
            url: 'verificacao.php',
            method: 'post',
            data: {
                id: buttonId,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nome').val(data.nomeTipoProduto);
            }
        });

        $('#tituloModal').html('Atualizar Tipo de Produto');
        $('#buttonSubmit').val('Atualizar');
        $('#modalTipoProduto').modal('show');
        $('#formulario').on("submit", function (event) {
            event.preventDefault();

            $.ajax({
                method: 'post',
                url: 'verificacao.php',
                data: {
                    id: buttonId,
                    nome: $('input[name=nome]').val(),
                    acao: 'atualizar'
                },
                success: function () {
                    location.reload();
                }
            });
        });
    });

    $('.button-deletar').on('click', function () {
        var buttonId = $(this).val();

        $.ajax({
            url: 'verificacao.php',
            method: 'post',
            data: {
                id: buttonId,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nomeTipoDeProdutoDel').html(data.nomeTipoProduto);
                $('#idTipoProdutoDel').val(data.id);
            }
        });
        $('#delTipoProduto').modal('show');
    });
    $('#buttonConfirmar').on('click', function () {
        $.ajax({
            url: 'verificacao.php',
            method: 'post',
            data: {
                id: $('#idTipoProdutoDel').val(),
                acao: 'excluir'
            },
            success: function () {
                location.reload();
            }
        });
    });
});
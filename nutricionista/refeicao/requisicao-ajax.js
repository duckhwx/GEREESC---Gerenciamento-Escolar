$(document).ready(function () {
    $('#button-cadastro').click(function (event) {
        event.preventDefault();

        $('#modalCadUp').html('Cadastrar Refeição');
        $('#buttonSubmit').val('Cadastrar');
        $('#divModal').modal('show');
        $('#formulario').submit(function () {

            $.ajax({
                method: 'post',
                url: 'gerenciar-refeicao.php',
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
            url: 'gerenciar-refeicao.php',
            method: 'post',
            data: {
                id: buttonId,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nome').val(data.nome);
            }
        });

        $('#modalCadUp').html('Atualizar Refeição');
        $('#buttonSubmit').val('Atualizar');
        $('#divModal').modal('show');
        $('#formulario').on("submit", function (event) {
            event.preventDefault();

            $.ajax({
                method: 'post',
                url: 'gerenciar-refeicao.php',
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

    $('.button-excluir').on('click', function () {
        var buttonId = $(this).val();

        $.ajax({
            url: 'gerenciar-refeicao.php',
            method: 'post',
            data: {
                id: buttonId,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nomeRefDel').html(data.nome);
            }
        });

        $('#delRef').modal('show');
        $('#buttonConfirmar').on('click', function () {
            $.ajax({
                url: 'gerenciar-refeicao.php',
                method: 'post',
                data: {
                    id: buttonId,
                    acao: 'excluir'
                },
                success: function () {
                    location.reload();
                }
            });
        });
    });
});
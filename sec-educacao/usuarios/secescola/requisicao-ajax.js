$(document).ready(function () {

    //Identifica se o usuário aperta o button de visualizar
    $('.visualizar-secEsc').on('click', function () {
        var secEscId = $(this).val();

        //Requisição dos dados do SecEsc Selecionado
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                idSecEsc: secEscId,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nome').html(data.nomeSecEsc);
                $('#escola').html(data.nomeEscola);
                if (data.cargo === 'Diretor') {
                    $('#cargo').html('Diretor');
                } else if (data.cargo === 'Secretario') {
                    $('#cargo').html('Secretário');
                }
                $('#cpf').html(data.cpf);
                $('#rg').html(data.rg);
                $('#endereco').html(data.endereco);
                $('#numero').html(data.numero);
                $('#email').html(data.email);
                $('#nascimento').html(data.dataDeNascimento);
                $('#celular').html(data.celular);
            }
        });

        //Invocação do modal de visualização do SecEsc
        $('#modalVisualizar').modal('show');
    });


    //Identifica se o usuário aperta o button de excluir
    $('.excluir-secEsc').on('click', function () {
        var idSecEsc = $(this).val();
        //Requisição dos dados do SecEsc Selecionado
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                idSecEsc: idSecEsc,
                acao: 'getDataSecEsc'
            },
            dataType: 'json',
            success: function (data) {
                //Atribuição do nome do usuário a ser excluido no modal de confimação  de exclusão
                $('#nomeExcluir').html(data.nomeSecEsc);
                $('#idSecEsc').val(data.id);
            }
        });
        //Exibição do modal de confirmação de exclusão do SecEsc   
        $('#modalExcluir').modal('show');
    });
    $('#excluirSecEsc').on('click', function () {
        var idSecEsc = $('#idSecEsc').val();
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                idSecEsc: idSecEsc,
                acao: 'excluir'
            },
            success: function () {
                location.reload();
            }
        });
    });

});
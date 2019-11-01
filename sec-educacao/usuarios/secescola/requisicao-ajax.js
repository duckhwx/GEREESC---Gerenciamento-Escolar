$(document).ready(function () {

//Identifica se o usuário aperta o button de visualizar
    $('.visualizar-secEsc').on('click', function () {
        var secEscId = $(this).val();

//Requisição dos dados do SecEsc Selecionado
        $.ajax({
            method: 'post',
            url: 'secescola/verificacao.php',
            data: {
                idSecEsc: secEscId,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nomeSecEsc').html(data.nomeSecEsc);
                
                if(data.nomeEscola === undefined){
                    $('#escolaSecEsc').html("---");
                } else {
                    $('#escolaSecEsc').html(data.nomeEscola);
                }
                
                if (data.cargo === 'Diretor') {
                    $('#cargoSecEsc').html('Diretor');
                } else if (data.cargo === 'Secretario') {
                    $('#cargoSecEsc').html('Secretário');
                }
                
                $('#cpfSecEsc').html(data.cpf);
                $('#rgSecEsc').html(data.rg);
                $('#enderecoSecEsc').html(data.endereco);
                $('#numeroSecEsc').html(data.numero);
                $('#emailSecEsc').html(data.email);
                $('#nascimentoSecEsc').html(data.dataDeNascimento);
                $('#celularSecEsc').html(data.celular);
            }
        });

//Invocação do modal de visualização do SecEsc
        $('#modalVisualizarSecEsc').modal('show');
    });


//Identifica se o usuário aperta o button de excluir
    $('.excluir-secEsc').on('click', function () {
        var idSecEsc = $(this).val();
//Requisição dos dados do SecEsc Selecionado
        $.ajax({
            method: 'post',
            url: 'secescola/verificacao.php',
            data: {
                idSecEsc: idSecEsc,
                acao: 'getDataSecEsc'
            },
            dataType: 'json',
            success: function (data) {
//Atribuição do nome do usuário a ser excluido no modal de confimação  de exclusão
                $('#nomeExcluirSecEsc').html(data.nomeSecEsc);
                $('#idSecEsc').val(data.id);
            }
        });
//Exibição do modal de confirmação de exclusão do SecEsc   
        $('#modalExcluirSecEsc').modal('show');
    });
    $('#excluirSecEsc').on('click', function () {
        var idSecEsc = $('#idSecEsc').val();
        $.ajax({
            method: 'post',
            url: 'secescola/verificacao.php',
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
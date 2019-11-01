$(document).ready(function() {
    
//Identifica se o usuário aperta o button de visualizar
    $('.visualizar-aluno').on('click', function () {
        var idAluno = $(this).val();

//Requisição dos dados do aluno Selecionado
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                idAluno: idAluno,
                acao: 'getById'
            },
            dataType: 'json',
            success: function (data) {
                $('#nomeAluno').html(data.nomeAluno);
                
                if(data.nomeEscola === undefined){
                    $('#escolaAluno').html("---");
                } else {
                    $('#escolaAluno').html(data.nomeEscola);
                }
                
                $('#anoEscolarAluno').html(data.nomeAnoEscolar);
                $('#nascimentoAluno').html(data.dataDeNascimento);
            }
        });

//Invocação do modal de visualização do aluno
        $('#modalVisualizar').modal('show');
    });
    
    
//Identifica se o usuário aperta o button de excluir
    $('.excluir-aluno').on('click', function () {
        var idAluno = $(this).val();
//Requisição dos dados do Aluno Selecionado
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                idAluno: idAluno,
                acao: 'getDataAluno'
            },
            dataType: 'json',
            success: function (data) {
//Atribuição do nome do usuário a ser excluido no modal de confimação  de exclusão
                $('#nomeExcluir').html(data.nomeAluno);
                $('#idAluno').val(data.id);
            }
        });
//Exibição do modal de confirmação de exclusão do Aluno   
        $('#modalExcluir').modal('show');
    });
    $('#excluir').on('click', function () {
        var idAluno = $('#idAluno').val();
        $.ajax({
            method: 'post',
            url: 'verificacao.php',
            data: {
                idAluno: idAluno,
                acao: 'excluir'
            },
            success: function () {
                location.reload();
            }
        });
    });
});

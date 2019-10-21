$(document).ready(function () {
    $('#button-cadastro').click(function () {
        $.ajax({
           method: 'post',
           url: 'verificacao.php',
           data: {
               acao: 'getValues'
           },
           success: function(data){
                if($('select>option').length === 0){
                    $.each(JSON.parse(data), function(index, value){
                        $.each(value.tipoPeso, function(index, tipoPeso){
                            $('#tipoDePeso').append('<option value=' + tipoPeso.id + '>' + tipoPeso.nomeTipoPeso + '</option>');
                        });
                        $.each(value.tipoProduto, function(index, tipoProduto){
                           $('#tipoDeProduto').append('<option value=' + tipoProduto.id + '>' + tipoProduto.nomeTipoProduto + '</option>');
                        });
                    });
                }
           }
        });

        $('#tituloModal').html('Cadastrar Produto');
        $('#buttonSubmit').val('Cadastrar');
        $('#modalProduto').modal('show');
        $('#formulario').submit(function () {
            event.preventDefault();
            
            $.ajax({
                method: 'post',
                url: 'verificacao.php',
                data: {
                    nome: $('input[name=nome]').val(),
                    marca: $('input[name=marca]').val(),
                    peso: $('input[name=peso]').val(),
                    tipoDePeso: $('select[name=tipoDePeso]').val(),
                    tipoDeProduto: $('select[name=tipoDeProduto]').val(),
                    acao: 'cadastrar'
                },
                success: function (data) {
                    $('#debug').html(data);
                    location.reload();
                }
            });

        });
    });
    
        $('.button-visualizar').on("click", function () {
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
                console.log(data);
                $('#nomeProduto').html(data.nomeProduto);
                $('#marcaProduto').html(data.marcaProduto);
                $('#pesoProduto').html(data.pesoProduto + " " + data.tipoDePeso);
                $('#tipoProduto').html(data.tipoDeProduto_id);
            }
        });
        $('#modalVisualizar').modal('show');
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
                $('#debug').html(data);
                console.log(data);
            }
        });

        $('#tituloModal').html('Atualizar Produto');
        $('#buttonSubmit').val('Atualizar');
        $('#modalProduto').modal('show');
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
                console.log(data);
                $('#nomeTipoDeProdutoDel').html(data.nomeTipoProduto);
            }
        });

        $('#delTipoProduto').modal('show');
        $('#buttonConfirmar').on('click', function () {
            $.ajax({
                url: 'verificacao.php',
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
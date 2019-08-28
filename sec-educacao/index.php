<?php
require_once("../funcoes-de-cabecalho.php");
//cabecalhoSecEdu("Secretário Da Educação", "escola", "usuarios", "produto", "cardapio");
?>

<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilo/styleCadastro.css"/>
    <meta charset='UTF-8'>
    <title>Inicio</title>
    </head>
    <body>
        <header>
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        <a href='escola/'>Escolas</a>
                    </div>
                    <div class='col'>
                        <a href='../sec-educacao/usuarios/'>Usuários</a>
                    </div>
                    <div class='col'>
                        <a href='../produto'>Produtos</a>
                    </div>
                    <div class='col'>
                        <a href='../cardapio'>Cardápio</a>
                    </div>
                </div>
            </div>
        </header>   
        <section>
            <div id='outrascoisas'>
                <!--AQUI APARECERAR ADICIONAIS FUTUROS -->
            </div>
        </section>


<?php 
rodape();
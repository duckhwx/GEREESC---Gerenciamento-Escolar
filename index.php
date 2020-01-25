<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo/styleLogin.css"/>
    <meta charset="UTF-8">
    <title>GEREESC - Gerenciamento de Estoque Escolar</title>
</head>
<body>
    <div class="container-fluid">
        <!--Cabeçalho titulo-->
        <header id="cabecalho" class="d-flex align-items-center justify-content-center">
            <span id="titulo">GEREESC <br> Sistema de Gerenciamento de Estoque Escolar</span>
        </header>

        <!--Bloco de Login-->
        <section>
                <div class="row d-flex justify-content-center px-4 mx-0">
                    <div class="col-lg-5 col-md-6 col-sm-8 shadow-sm rounded" id="login">
                        <div id="avatar"><img src="estilo/icones/userIcon.png"></div>
                            
                            <form method="post" class="px-5" action="login/verificacao.php">
                                <label class="textInput">Usuário</label>
                                <input type="text" class="form-control shadow-sm" required maxlength="64" name="login">

                                <label class="textInput">Senha</label>
                                <input type="password" class="form-control shadow-sm" required maxlength="64" name="senha">

                                <input type="submit" id="buttonLogin" class="btn btn-dark m-3" value="Logar">
                            </form>
                        </div>
                    </div>
                </div>
        </section>

        <footer>
        </footer>
    </div>
</body>
</html>
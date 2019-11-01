<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo/styleLogin.css"/>
    <meta charset="UTF-8">
    <title>GEREESC - Gerenciamento de Estoque Escolar</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-8">
                    <h1 id="Titulo">GEREESC <br> Sistema de Gerenciamento de Estoque</h1>
                </div>
                <div class="col-2">

                </div>
            </div>
        </div>
    </header>
    
    <section>
        <div id="Login">
            <form method="post" class="px-3" action="login/verificacao.php">
                <div id="avatar"><img src="estilo/icones/user.png"></div>
                
                <label class="textInput">Usuário</label>
                <input type="text" class="form-control" required maxlength="64" name="login">

                <label class="textInput">Senha</label>
                <input type="password" class="form-control" required maxlength="64" name="senha">

                <input type="submit" class="btn btn-dark m-3" value="Logar">
            </form>
        </div>
    </section>
</body>
</html>
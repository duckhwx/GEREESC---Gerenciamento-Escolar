<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo/styleLogin.css"/>
    <meta charset="UTF-8">
    <title>GEREESC - Sistema de Gerenciamento de Estoque Escolar</title>
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
                <form method="post" action="login/verificacao.php">
                    <div id="avatar"></div>
                    <h4>Usuário</h4>
                    <input type="text" required maxlength="64" name="login">
                    <br><br>
                    <h4>Senha</h4>
                    <input type="password" required maxlength="64" name="senha">
                    <br><br>
                    <input type="submit" class="btn btn-dark" value="Logar">
                </form>
            </div>
        </section>
</body>
</html>
</html>
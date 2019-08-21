<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Estilo/styleLogin.css"/>
    <meta charset="UTF-8">
    <title>GEREESC - Sistema de Gerenciamento de Estoque Escolar</title>
</head>
<body>
    <h1>GEREESC Sistema de Gerenciamento de Estoque</h1>

        <form method="post" action="login/verificacao.php">
            Login <input type="text" name="login" required maxlenght="64">
            Senha <input type="password" name="senha" required maxlength="64">
                <input type="submit" value="Logar">
        </form>
</body>
</html>
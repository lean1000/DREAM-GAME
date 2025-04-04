<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Game</title>

    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <div class="caixa">
        <img src="./assets/img/logo/logo.png" alt="logo">
        <form id="loginForm" action="./auxilio/auxlogin.php" onsubmit="validarFormulario(event)" method="post">
            <input type="email" id="email" placeholder="Email" name="email" required>
            <input type="password" id="senha" placeholder="Senha" maxlength="16" name="senha" required>
            <a href="./cadastro.php">Cadastrar-se</a>
            <input type="submit" value="Entrar">
        </form>
    </div>

    <script src="./assets/js/login.js"></script>

</body>

</html>
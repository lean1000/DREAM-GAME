<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Game</title>

    <link rel="stylesheet" href="./assets/css/cadastro.css">

</head>

<body>

    <div class="caixa">
        <img src="./assets/img/logo/logo.png" alt="logo">
        <form id="cadastroForm" action="./classes/auxcadastro.php" method="post" onsubmit="return validarFormulario()">
        <input type="text" id="apelido" placeholder="Apelido" name="apelido" required>
            <input type="text" id="nomeCompleto" placeholder="Nome Completo" name="nome" required>
            <input type="date" id="dataNascimento" min="1970-01-01" max="2025-12-31" name="nascimento" required>
            <input type="email" id="email" placeholder="Email" name="email" required>
            <input type="password" id="senha" placeholder="Senha" name="senha" required>
            <input type="password" id="confirmarSenha" placeholder="Confirmar Senha" name="confirmarSenha" required>
            <div id="erroMsg" class="erro"></div>
            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <script src="./assets/js/cadastro.js"></script>

</body>

</html>
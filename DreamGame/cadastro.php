<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Game</title>

    <link rel="stylesheet" href="./assets/css/cadastro.css">

    <style>
        .erro {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="caixa">
        <img src="./assets/img/logo/logo.png" alt="logo">
        <form id="cadastroForm" onsubmit="validarFormulario(event)" method="post">
            <input type="text" id="apelido" placeholder="Apelido" required>
            <input type="text" id="nomeCompleto" placeholder="Nome Completo" required>
            <input type="date" id="dataNascimento" min="1970-01-01" max="2025-12-31" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="senha" placeholder="Senha" required>
            <input type="password" id="confirmarSenha" placeholder="Confirmar Senha" required>
            <div id="erroMsg" class="erro"></div>
            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <script src="./assets/js/cadastro.js"></script>

</body>

</html>
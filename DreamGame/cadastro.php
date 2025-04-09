<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Game - Cadastro</title>
    <link rel="stylesheet" href="./assets/css/cadastro.css">
</head>
<body>
    <div class="caixa">
        <img src="./assets/img/logo/logo.png" alt="logo">
        <form id="cadastroForm" action="./auxilio/auxcadastro.php" method="post">
            <input type="text" id="apelido" placeholder="Apelido" name="apelido" required>
            <div id="erroApelido" class="box-erro"></div>

            <input type="text" id="nomeCompleto" placeholder="Nome Completo" name="nome" required>
            <div id="erroNome" class="box-erro"></div>

            <input type="date" id="dataNascimento" name="nascimento" min="1970-01-01" max="2025-12-31" required>
            <div id="erroNascimento" class="box-erro"></div>

            <input type="email" id="email" placeholder="Email" name="email" required>
            <div id="erroEmail" class="box-erro"></div>

            <input type="password" id="senha" placeholder="Senha" name="senha" required>
            <div id="erroSenha" class="box-erro"></div>

            <input type="password" id="confirmarSenha" placeholder="Confirmar Senha" name="confirmarSenha" required>
            <div id="erroConfirmarSenha" class="box-erro"></div>

            <input type="submit" id="btnCadastrar" value="Cadastrar" disabled>
        </form>
    </div>
    <script src="./assets/js/cadastro.js"></script>
</body>
</html>
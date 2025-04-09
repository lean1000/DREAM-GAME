<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="./assets/css/esqueci_senha.css">
    <script src="./assets/js/esqueciSenha.js" defer></script>
</head>
<body>
    <div class="caixa">
        <img src="./assets/img/logo/logo.png" alt="logo">
        <form id="formEsqueciSenha" method="POST" action="./auxilio/auxesqueci_senha.php">
            <input type="text" name="apelido" placeholder="Apelido" required>
            <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova senha" required>
            <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar nova senha" required>
            <input type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>
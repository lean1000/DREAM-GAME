<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="./assets/css/esqueci_senha.css">
</head>
<body>
    <div class="caixa">
        <img src="./assets/img/logo/logo.png" alt="logo">
        <form id="formEsqueciSenha" method="POST" action="./auxilio/auxesqueci_senha.php">
            <input type="text" name="apelido" id="apelido" placeholder="Apelido" required>
            <div id="erroApelido" class="box-erro">Apelido é obrigatório.</div>

            <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova senha" required>
            <div id="erroSenha" class="box-erro">A senha deve ter entre 8 e 16 caracteres, letra, número e caractere especial.</div>

            <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar nova senha" required>
            <div id="erroConfirmar" class="box-erro">As senhas não coincidem.</div>

            <ul class="box-list-erros" id="errosLista"></ul>

            <input type="submit" value="Salvar" id="btnSalvar">
        </form>
    </div>
    <script src="./assets/js/esqueci_senha.js" defer></script>
</body>
</html>
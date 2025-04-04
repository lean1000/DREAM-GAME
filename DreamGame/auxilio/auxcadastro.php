<?php

session_start();

// Recebendo dados do formulário com segurança
$apelidoFormulario = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
$senhaFormulario = $_POST['senha'];
$confirmarSenhaFormulario = $_POST['confirmarSenha'];
$nomeFormulario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$emailFormulario = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$dataNascimentoFormulario = $_POST['nascimento'];

// Verificando se as senhas coincidem
if ($senhaFormulario !== $confirmarSenhaFormulario) {
    echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
    exit;
}

// Conectando ao banco de dados
try {
    $banco = new PDO("mysql:host=localhost;dbname=db_dreamgame", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

// Inserindo os dados na tabela tb_users
$insertPessoa = 'INSERT INTO tb_users (apelido, nome, nascimento) 
                 VALUES (:apelido, :nome, :nascimento)';

$boxePessoa = $banco->prepare($insertPessoa);

try {
    $boxePessoa->execute([
        ':apelido' => $apelidoFormulario,
        ':nome' => $nomeFormulario,
        ':nascimento' => $dataNascimentoFormulario
    ]);

    // Pegando o último ID inserido
    $idPessoa = $banco->lastInsertId();

    // Inserindo os dados na tabela tb_info_users
    $insertUsuario = 'INSERT INTO tb_info_users (email, senha, ID_users) 
                      VALUES (:email, :senha, :ID_users)';

    $boxeUsuario = $banco->prepare($insertUsuario);
    $boxeUsuario->execute([
        ':email' => $emailFormulario,
        ':senha' => password_hash($senhaFormulario, PASSWORD_DEFAULT),
        ':ID_users' => $idPessoa
    ]);

    // Redirecionamento após sucesso

    header("Location: ../login.php");

    exit;

} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}

<?php
session_start();
require_once __DIR__ . '/../classes/conexao.php';

function validarNome($nome) {
    return preg_match('/^([A-ZÁÉÍÓÚÂÊÎÔÛÃÕ][a-záéíóúâêîôûãõ]+)(\s[A-ZÁÉÍÓÚÂÊÎÔÛÃÕ][a-záéíóúâêîôûãõ]+)+$/', $nome);
}

function validarSenha($senha) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/', $senha);
}

$apelidoFormulario = trim(filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING));
$senhaFormulario = $_POST['senha'];
$confirmarSenhaFormulario = $_POST['confirmarSenha'];
$nomeFormulario = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$emailFormulario = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$dataNascimentoFormulario = $_POST['nascimento'];

if (!$emailFormulario || $apelidoFormulario === $emailFormulario) {
    echo "<script>alert('E-mail inválido ou igual ao apelido.'); window.history.back();</script>";
    exit;
}

if (!validarNome($nomeFormulario)) {
    echo "<script>alert('Nome inválido. Use iniciais maiúsculas e sem números ou símbolos.'); window.history.back();</script>";
    exit;
}

if (!validarSenha($senhaFormulario)) {
    echo "<script>alert('A senha deve ter entre 8 e 16 caracteres, com letra, número e caractere especial.'); window.history.back();</script>";
    exit;
}

if ($senhaFormulario !== $confirmarSenhaFormulario) {
    echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
    exit;
}

$conn = Conexao::getConexao();

$stmtApelido = $conn->prepare("SELECT COUNT(*) FROM tb_users WHERE apelido = ?");
$stmtApelido->bind_param("s", $apelidoFormulario);
$stmtApelido->execute();
$stmtApelido->bind_result($countApelido);
$stmtApelido->fetch();
$stmtApelido->close();

if ($countApelido > 0) {
    echo "<script>alert('Este apelido já está em uso.'); window.history.back();</script>";
    exit;
}

$stmtEmail = $conn->prepare("SELECT COUNT(*) FROM tb_users WHERE apelido = ?");
$stmtEmail->bind_param("s", $emailFormulario);
$stmtEmail->execute();
$stmtEmail->bind_result($countEmail);
$stmtEmail->fetch();
$stmtEmail->close();

if ($countEmail > 0) {
    echo "<script>alert('Este e-mail já foi usado como apelido.'); window.history.back();</script>";
    exit;
}

$stmtInsertUser = $conn->prepare("INSERT INTO tb_users (apelido, nome, nascimento) VALUES (?, ?, ?)");
$stmtInsertUser->bind_param("sss", $apelidoFormulario, $nomeFormulario, $dataNascimentoFormulario);
$stmtInsertUser->execute();
$idPessoa = $conn->insert_id;
$stmtInsertUser->close();

$senhaHash = password_hash($senhaFormulario, PASSWORD_DEFAULT);
$stmtInsertInfo = $conn->prepare("INSERT INTO tb_info_users (email, senha, ID_users) VALUES (?, ?, ?)");
$stmtInsertInfo->bind_param("ssi", $emailFormulario, $senhaHash, $idPessoa);
$stmtInsertInfo->execute();
$stmtInsertInfo->close();

header("Location: ../login.php");
exit;
?>

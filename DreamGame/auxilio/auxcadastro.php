<?php
session_start();
require_once __DIR__ . '/../classes/conexao.php';

function validarNome($nome) {
    return preg_match('/^([A-ZÁÉÍÓÚÂÊÎÔÛÃÕ][a-záéíóúâêîôûãõ]+)(\s[A-ZÁÉÍÓÚÂÊÎÔÛÃÕ][a-záéíóúâêîôûãõ]+)+$/', $nome);
}

function validarSenha($senha) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/', $senha);
}

$apelido = trim($_POST['apelido']);
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$nascimento = $_POST['nascimento'];

if (!$email || $apelido === $email) {
    echo "<script>alert('E-mail inválido ou igual ao apelido.'); window.history.back();</script>";
    exit;
}
if (!validarNome($nome)) {
    echo "<script>alert('Nome inválido. Use iniciais maiúsculas e sem números.'); window.history.back();</script>";
    exit;
}
if (!validarSenha($senha)) {
    echo "<script>alert('Senha fraca.'); window.history.back();</script>";
    exit;
}
if ($senha !== $confirmarSenha) {
    echo "<script>alert('Senhas diferentes.'); window.history.back();</script>";
    exit;
}

$conn = Conexao::getConexao();

$stmt = $conn->prepare("SELECT COUNT(*) FROM tb_users WHERE apelido = ?");
$stmt->bind_param("s", $apelido);
$stmt->execute();
$stmt->bind_result($existe);
$stmt->fetch();
$stmt->close();

if ($existe > 0) {
    echo "<script>alert('Apelido já cadastrado.'); window.history.back();</script>";
    exit;
}

$stmt = $conn->prepare("INSERT INTO tb_users (apelido, nome, nascimento) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $apelido, $nome, $nascimento);
$stmt->execute();
$id = $conn->insert_id;
$stmt->close();

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO tb_info_users (email, senha, ID_users) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $email, $senhaHash, $id);
$stmt->execute();
$stmt->close();

header("Location: ../login.php");
exit;
?>
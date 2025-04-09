<?php
session_start();
require_once __DIR__ . '/../classes/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $apelido = trim($_POST['apelido']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $id = $_SESSION['usuario_id'];

    $conn = Conexao::getConexao();

    $stmtNome = $conn->prepare("UPDATE tb_users SET nome = ?, apelido = ? WHERE ID_users = ?");
    $stmtNome->bind_param("ssi", $nome, $apelido, $id);
    $stmtNome->execute();

    if (!empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmtInfo = $conn->prepare("UPDATE tb_info_users SET email = ?, senha = ? WHERE ID_users = ?");
        $stmtInfo->bind_param("ssi", $email, $senhaHash, $id);
    } else {
        $stmtInfo = $conn->prepare("UPDATE tb_info_users SET email = ? WHERE ID_users = ?");
        $stmtInfo->bind_param("si", $email, $id);
    }

    $stmtInfo->execute();

    header("Location: ../perfil.php");
    exit;
}
?>

<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $id = $_SESSION['usuario_id'];

    try {
        $banco = new PDO("mysql:host=localhost;dbname=db_dreamgame", "root", "");
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Atualiza o nome
        $stmtNome = $banco->prepare("UPDATE tb_users SET nome = :nome WHERE ID_users = :id");
        $stmtNome->bindParam(':nome', $nome);
        $stmtNome->bindParam(':id', $id);
        $stmtNome->execute();

        // Atualiza email e senha (se fornecida)
        if (!empty($senha)) {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $stmtInfo = $banco->prepare("UPDATE tb_info_users SET email = :email, senha = :senha WHERE ID_users = :id");
            $stmtInfo->bindParam(':email', $email);
            $stmtInfo->bindParam(':senha', $senhaHash);
        } else {
            $stmtInfo = $banco->prepare("UPDATE tb_info_users SET email = :email WHERE ID_users = :id");
            $stmtInfo->bindParam(':email', $email);
        }
        $stmtInfo->bindParam(':id', $id);
        $stmtInfo->execute();

        header("Location: ../perfil.php");
        exit;

    } catch (PDOException $e) {
        die("Erro ao atualizar: " . $e->getMessage());
    }
}
?>
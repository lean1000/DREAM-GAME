<?php
session_start();
ob_start();
require_once __DIR__ . '/../classes/conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $conn = Conexao::getConexao();

    $query = "
        SELECT info.ID_users, info.email, info.senha, users.nome
        FROM tb_info_users AS info
        INNER JOIN tb_users AS users ON info.ID_users = users.ID_users
        WHERE info.email = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $emailDb, $senhaDb, $nome);
        $stmt->fetch();

        if (password_verify($senha, $senhaDb)) {
            $_SESSION['usuario_id'] = $id;
            $_SESSION['email'] = $emailDb;
            $_SESSION['nome'] = $nome;

            if (isset($_SESSION['redir_after_login'])) {
                $destino = $_SESSION['redir_after_login'];
                unset($_SESSION['redir_after_login']);
                header("Location: ../$destino");
            } else {
                header("Location: ../index.php");
            }
            exit;
        }
    }

    $_SESSION['erro_login'] = "Email ou senha incorretos!";
    header("Location: ../login.php");
    exit;
} else {
    header("Location: ../index.php");
    exit;
}

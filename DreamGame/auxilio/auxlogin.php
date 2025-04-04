<?php
session_start();
ob_start();

// Conectar ao banco de dados
try {
    $banco = new PDO("mysql:host=localhost;dbname=db_dreamgame", "root", "");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Verificar se os dados foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Buscar o usuário pelo email
    $query = "SELECT ID_users, email, senha FROM tb_info_users WHERE email = :email";
    $stmt = $banco->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Login bem-sucedido, iniciar sessão
        $_SESSION['usuario_id'] = $usuario['ID_users'];
        $_SESSION['email'] = $usuario['email'];

        // Redirecionar para a página principal
        header("Location: ../index.php");
        exit;
    } else {
        // Falha no login
        echo "<script>alert('Email ou senha incorretos!'); window.location.href = '../login';</script>";

        exit;
    }
} else {
    // Se alguém tentar acessar diretamente, redireciona para login
    header("Location: ../index.php");
    exit;
}
?>
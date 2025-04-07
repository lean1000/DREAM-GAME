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

    // Buscar o usuário pelo email, incluindo o nome da tb_users
    $query = "
        SELECT info.ID_users, info.email, info.senha, users.nome
        FROM tb_info_users AS info
        INNER JOIN tb_users AS users ON info.ID_users = users.ID_users
        WHERE info.email = :email
    ";

    $stmt = $banco->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Login bem-sucedido, iniciar sessão
        $_SESSION['usuario_id'] = $usuario['ID_users'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];

        // Redirecionar para a página principal
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION['erro_login'] = "Email ou senha incorretos!";
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>
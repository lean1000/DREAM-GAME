<?php
require_once '../classes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apelido = trim($_POST['apelido']);
    $novaSenha = $_POST['nova_senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

    if (empty($apelido) || empty($novaSenha) || empty($confirmarSenha)) {
        die("Preencha todos os campos.");
    }

    if ($novaSenha !== $confirmarSenha) {
        die("As senhas não coincidem.");
    }

    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,16}$/', $novaSenha)) {
        die("Senha inválida.");
    }

    $conn = Conexao::getConexao();

    $stmt = $conn->prepare("SELECT tu.ID_users, tu.senha FROM tb_info_users tu 
                            JOIN tb_users ti ON tu.ID_users = ti.ID_users 
                            WHERE ti.apelido = ?");
    $stmt->bind_param("s", $apelido);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Apelido não encontrado.");
    }

    $user = $result->fetch_assoc();

    if (password_verify($novaSenha, $user['senha'])) {
        die("A nova senha não pode ser igual à senha atual.");
    }

    $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    $update = $conn->prepare("UPDATE tb_info_users SET senha = ? WHERE ID_users = ?");
    $update->bind_param("si", $novaSenhaHash, $user['ID_users']);

    if ($update->execute()) {
        echo "<script>alert('Senha atualizada com sucesso!'); window.location.href = '../login.php';</script>";
    } else {
        echo "Erro ao atualizar a senha.";
    }

    $stmt->close();
    $update->close();
    $conn->close();
}
?>
<?php
include '../classes/conexao.php';

$campo = $_GET['campo'] ?? '';
$valor = $_GET['valor'] ?? '';

$permitidos = ['email', 'apelido'];
if (!in_array($campo, $permitidos)) {
    echo json_encode(['existe' => false]);
    exit;
}

$conn = Conexao::getConexao();

if ($campo === 'email') {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_info_users WHERE email = ?");
} else {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_users WHERE apelido = ?");
}

$stmt->bind_param("s", $valor);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();

echo json_encode(['existe' => $total > 0]);
?>
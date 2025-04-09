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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=db_dreamgame", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($campo === "apelido") {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tb_users WHERE apelido = :valor");
        } elseif ($campo === "email") {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM tb_info_users WHERE email = :valor");
        } else {
            echo "invalido";
            exit;
        }

        $stmt->execute([':valor' => $valor]);
        $existe = $stmt->fetchColumn() > 0;

        echo $existe ? "existe" : "nao_existe";
    } catch (PDOException $e) {
        echo "erro";
    }
}
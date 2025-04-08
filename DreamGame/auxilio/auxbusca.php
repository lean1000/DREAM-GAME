<?php
include __DIR__ . '/../classes/conexao.php';
header('Content-Type: application/json');

$conn = Conexao::getConexao(); // <- pega a conexão corretamente

$acao = $_GET['acao'] ?? '';

if ($acao === 'generos') {
    $sql = "SELECT ID_genero, genero FROM tb_generos";
    $res = $conn->query($sql);
    $generos = [];
    while ($row = $res->fetch_assoc()) {
        $generos[] = $row;
    }
    echo json_encode($generos);
    exit;
}

if ($acao === 'buscar') {
    $termo = $_GET['termo'] ?? '';
    $genero = $_GET['genero'] ?? '';
    $ano = $_GET['ano'] ?? '';
    $precoMin = $_GET['precoMin'] ?? '';
    $precoMax = $_GET['precoMax'] ?? '';
    $avaliacao = $_GET['avaliacao'] ?? '';

    $params = [];
    $sql = "SELECT * FROM tb_produtos WHERE 1=1";

    if (!empty($termo)) {
        $sql .= " AND (titulo LIKE ? OR SOUNDEX(titulo) = SOUNDEX(?))";
        $params[] = "%$termo%";
        $params[] = $termo;
    }
    if (!empty($genero)) {
        $sql .= " AND ID_genero = ?";
        $params[] = $genero;
    }
    if (!empty($ano)) {
        $sql .= " AND ano = ?";
        $params[] = $ano;
    }
    if (!empty($precoMin)) {
        $sql .= " AND valor >= ?";
        $params[] = $precoMin;
    }
    if (!empty($precoMax)) {
        $sql .= " AND valor <= ?";
        $params[] = $precoMax;
    }
    if (!empty($avaliacao)) {
        $sql .= " AND avaliacao >= ?";
        $params[] = $avaliacao;
    }

    $stmt = $conn->prepare($sql);
    $tipos = str_repeat('s', count($params));
    if ($params) $stmt->bind_param($tipos, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();

    $produtos = [];
    while ($row = $res->fetch_assoc()) {
        $produtos[] = $row;
    }

    if (count($produtos) === 1 && !empty($termo)) {
        $generoID = $produtos[0]['ID_genero'];
        $stmt2 = $conn->prepare("SELECT * FROM tb_produtos WHERE ID_genero = ? AND id != ?");
        $stmt2->bind_param("ii", $generoID, $produtos[0]['id']);
        $stmt2->execute();
        $res2 = $stmt2->get_result();
        while ($row = $res2->fetch_assoc()) {
            $produtos[] = $row;
        }
    }

    echo json_encode($produtos);
    exit;
}

echo json_encode(["erro" => "Ação inválida"]);

<?php
require_once '../classes/conexao.php';

if (isset($_GET['apelido'])) {
    $apelido = trim($_GET['apelido']);

    $conn = Conexao::getConexao();
    $stmt = $conn->prepare("SELECT 1 FROM tb_users WHERE apelido = ?");
    $stmt->bind_param("s", $apelido);
    $stmt->execute();
    $result = $stmt->get_result();

    echo $result->num_rows > 0 ? 'existe' : 'nao_existe';
}
?>
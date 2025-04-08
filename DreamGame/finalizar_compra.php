<?php
session_start();

// Verifica se está logado
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['redir_after_login'] = 'finalizar.php?id=' . ($_GET['id'] ?? '');
    header('Location: login.php');
    exit;
}

include './includes/header.php';
include './classes/conexao.php';

// Pega o ID do produto
$idProduto = $_GET['id'] ?? null;

if (!$idProduto) {
    echo "<p style='color: white; padding: 20px;'>Produto inválido.</p>";
    include './includes/footer.php';
    exit;
}

// Consulta produto
$conn = Conexao::getConexao();
$stmt = $conn->prepare("SELECT * FROM tb_produtos WHERE id = ?");
$stmt->bind_param("i", $idProduto);
$stmt->execute();
$result = $stmt->get_result();
$produto = $result->fetch_assoc();

if (!$produto) {
    echo "<p style='color: white; padding: 20px;'>Produto não encontrado.</p>";
    include './includes/footer.php';
    exit;
}
?>

<div class="finalizar-container">
    <h2>Finalizar Compra</h2>
    <div class="produto-finalizar">
        <img src="./assets/img/capa_banners/<?= htmlspecialchars($produto['imagen']) ?>" alt="<?= htmlspecialchars($produto['titulo']) ?>">
        <div>
            <h3><?= htmlspecialchars($produto['titulo']) ?></h3>
            <p>Preço: R$ <?= number_format($produto['valor'], 2, ',', '.') ?></p>
        </div>
    </div>

    <form id="formFinalizar">
        <label for="email">E-mail para envio do comprovante:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Comprar</button>
    </form>

    <div class="mensagem-sucesso" id="mensagemSucesso">Compra realizada com sucesso!</div>
</div>

<script>
    const form = document.getElementById('formFinalizar');
    const sucesso = document.getElementById('mensagemSucesso');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        sucesso.style.display = 'block';

        setTimeout(() => {
            window.location.href = 'produto.php?id=<?= $produto['id'] ?>';
        }, 2500);
    });
</script>

<?php include './includes/footer.php'; ?>

<?php include './includes/header.php'; ?>
<?php include './includes/searchBar.php'; ?>
<?php
require_once './classes/conexao.php';

$conn = Conexao::getConexao();

// Produtos dos banners
$ids = [8, 62, 76];
$placeholders = implode(',', array_fill(0, count($ids), '?'));

$query = "SELECT * FROM tb_produtos WHERE id IN ($placeholders)";
$stmt = $conn->prepare($query);
$stmt->bind_param(str_repeat('i', count($ids)), ...$ids);
$stmt->execute();
$result = $stmt->get_result();

$banners = [];
while ($row = $result->fetch_assoc()) {
    $banners[] = $row;
}

// Miniaturas fixas para os banners
$miniaturas = [
    0 => [
        './assets/img/horizon1.jpg',
        './assets/img/horizon2.jpg',
        './assets/img/horizon3.jpg',
        './assets/img/horizon4.jpg',
    ],
    1 => [
        './assets/img/ops1.jpg',
        './assets/img/ops2.jpg',
        './assets/img/ops3.jpg',
        './assets/img/ops4.jpg',
    ],
    2 => [
        './assets/img/call1.jpg',
        './assets/img/call2.jpg',
        './assets/img/call3.jpg',
        './assets/img/call4.jpg',
    ],
];
?>

<section class="banner-container">
    <button class="banner-botao-nav banner-esquerda" onclick="prevBanner()">&#9664;</button>

    <?php foreach ($banners as $index => $produto): ?>
        <div class="banner-wrapper<?php echo $index === 0 ? ' ativo' : ''; ?>">
            <div class="banner">
                <img src="./assets/img/<?php echo htmlspecialchars($produto['imagen']); ?>" alt="<?php echo htmlspecialchars($produto['titulo']); ?>" class="banner-capa">
                <div class="banner-detalhes">
                    <div class="banner-miniaturas">
                        <?php foreach ($miniaturas[$index] as $img): ?>
                            <img src="<?php echo $img; ?>" alt="Screenshot">
                        <?php endforeach; ?>
                    </div>
                    <div class="banner-compra">
                        <p class="banner-preco">R$: <?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
                        <a href="produto.php?id=<?php echo $produto['id']; ?>">
                            <button class="banner-botao-compra">Ver Produto</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <button class="banner-botao-nav banner-direita" onclick="nextBanner()">&#9654;</button>
</section>

<?php
// Seções por gênero
$sql = "SELECT * FROM tb_generos";
$result = $conn->query($sql);

while ($genero = $result->fetch_assoc()):
    echo '<section>';
    echo '<h2 class="home-h2">' . htmlspecialchars($genero['genero']) . '</h2>';
    echo '<div class="home-container">';
    echo '<hr class="home-hr">';
    echo '<div class="home-scrol" id="scroll-container-' . $genero['ID_genero'] . '">';
    echo '<figure class="home-figure">';

    $sql_produtos = "SELECT * FROM tb_produtos WHERE ID_genero = ?";
    $stmt_produtos = $conn->prepare($sql_produtos);
    $stmt_produtos->bind_param("i", $genero['ID_genero']);
    $stmt_produtos->execute();
    $result_produtos = $stmt_produtos->get_result();

    if ($result_produtos->num_rows > 0) {
        while ($produto = $result_produtos->fetch_assoc()) {
            echo '<a href="produto.php?id=' . $produto['id'] . '">
                    <img src="./assets/img/' . htmlspecialchars($produto['imagen']) . '" alt="' . htmlspecialchars($produto['titulo']) . '">
                  </a>';
        }
    } else {
        echo '<p>Nenhum produto encontrado para este gênero.</p>';
    }

    echo '</figure>';
    echo '</div></div></section>';
endwhile;

$conn->close();
?>

<script src="./assets/js/cards.js?v=1.0"></script>
<script src="./assets/js/banner.js?v=1.0"></script>
<?php include './includes/footer.php'; ?>

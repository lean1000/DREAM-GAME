<link rel="stylesheet" href="./assets/css/produto.css">

<?php
include './includes/header.php';
include './classes/conexao.php';
include './includes/estrelas.php';


$conn = Conexao::getConexao();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id) {
    $sql = "SELECT 
                p.ID, p.titulo, p.valor, p.imagen, p.desenvolvedor, p.ano, p.avaliacao, p.descricao,
                g.genero 
            FROM tb_produtos p 
            JOIN tb_generos g ON p.ID_genero = g.ID_genero 
            WHERE p.ID = $id";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $produto = mysqli_fetch_assoc($result);
    } else {
        echo "<p>Produto não encontrado!</p>";
        exit;
    }
} else {
    echo "<p>ID do produto não fornecido!</p>";
    exit;
}
?>

<section id="produto">
    <main class="produto-container">
        <div class="produto-row">
            <img src="./assets/img/<?php echo htmlspecialchars($produto['imagen']); ?>" alt="<?php echo htmlspecialchars($produto['titulo']); ?>">

            <div class="produto-col">
                <img src="./assets/img/logo/logo.png" alt="logo">
                <div class="produto-row-buy">
                    <h3 class="produto-h">R$: <?php echo number_format($produto['valor'], 2, ',', '.'); ?></h3>

                    <button id="btnComprar"
                        data-id="<?php echo $produto['ID']; ?>"
                        data-titulo="<?php echo htmlspecialchars($produto['titulo']); ?>"
                        data-imagem="<?php echo htmlspecialchars($produto['imagen']); ?>"
                        data-valor="<?php echo $produto['valor']; ?>">
                        Comprar
                    </button>



                </div>
            </div>
        </div>
        <hr class="produto-linha">
        <div class="produto-info">
            <div class="produto-info-topo">
                <h1 class="produto-h"><?php echo htmlspecialchars($produto['titulo']); ?></h1>
                <div class="produto-estrelas">
                    <?php renderizarEstrelas($produto['avaliacao']); ?>
                </div>
            </div>
            <p class="produto-descricao"><?php echo htmlspecialchars($produto['descricao']); ?></p>

            <div class="produto-requisitos">
                <h3>Gênero: <?php echo htmlspecialchars($produto['genero']); ?></h3>
                <h3>Desenvolvedor: <?php echo htmlspecialchars($produto['desenvolvedor']); ?></h3>
                <h3>Ano: <?php echo htmlspecialchars($produto['ano']); ?></h3>
            </div>
        </div>
    </main>
</section>
<?php include './includes/footer.php'; ?>
<?php include './includes/header.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_dreamgame";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id) {
    $sql = "SELECT p.ID AS produto_id, p.*, g.genero 
            FROM tb_produtos p 
            JOIN tb_generos g ON p.ID_genero = g.ID_genero 
            WHERE p.ID = $id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
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
    <main class="container_produto">
        <div class="row">
            <img src="./assets/img/<?php echo $produto['imagen']; ?>" alt="<?php echo $produto['titulo']; ?>">

            <div class="col-prod">
                <img src="./assets/img/logo/logo.png" alt="logo">
                <div class="row-buy">
                    <h3 class="h">R$: <?php echo number_format($produto['valor'], 2, ',', '.'); ?></h3>
                    <a href="finalizar_compra.php?id=<?= $produto['produto_id'] ?>" class="button_compra">Comprar</a>
                </div>
            </div>
        </div>

        <div class="row">
            <h1 class="h"><?php echo $produto['titulo']; ?></h1>
            <?php 
                $avaliacao = $produto['avaliacao']; // puxando a nota do banco
                include_once './includes/estrelas.php'; // incluímos as estrelas aqui
            ?>
        </div>

        <p><?php echo $produto['descricao']; ?></p>

        <div class="row-requerimento">
            <h3>Gênero: <?php echo $produto['genero']; ?></h3>
            <h3>Desenvolvedor: <?php echo $produto['desenvolvedor']; ?></h3>
            <h3>Ano: <?php echo $produto['ano']; ?></h3>
        </div>
    </main>
</section>

<?php $conn->close(); ?>
<?php include './includes/footer.php'; ?>


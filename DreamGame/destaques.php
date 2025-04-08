<?php include './includes/header.php'; ?>
<?php include './includes/searchBar.php'; ?>
<?php include './includes/estrelas.php'; ?> <!-- Adiciona esta linha -->

<?php
require_once './classes/conexao.php';
$conn = Conexao::getConexao();
?>


<section>
    <main class="destaques-container">
        <?php

        $ids = [114, 115, 116, 117, 118, 119, 120];
        $ids_str = implode(',', $ids);

        // Incluímos a avaliação na query
        $query = "SELECT id, titulo, valor, imagen, avaliacao FROM tb_produtos WHERE id IN ($ids_str)";
        $result = mysqli_query($conn, $query);

        while ($produto = mysqli_fetch_assoc($result)) {
        ?>
            <div class="destaques-card">
                <img src="./assets/img/<?= $produto['imagen'] ?>" alt="<?= $produto['titulo'] ?>">

                <div class="destaques-info">
                    <h4 class="destaques-titulo"><?= $produto['titulo'] ?></h4>

                    <div class="destaques-top-bar">
                        <span class="destaques-price">R$ <?= number_format($produto['valor'], 2, ',', '.') ?></span>
                    </div>

                    <!-- Estrelas -->
                    <?php
                    $avaliacao = $produto['avaliacao'];
                    renderizarEstrelas($avaliacao); // Chama a função para exibir as estrelas
                    ?>

                    <div class="destaques-logo">
                        <img src="./assets/img/logo/logo 1.png" alt="Dream Game">
                    </div>

                    <a href="produto.php?id=<?= $produto['id'] ?>">
                        <button class="button-buy">Ver Produto</button>
                    </a>
                </div>
            </div>

        <?php } ?>
    </main>
</section>

<?php include './includes/footer.php'; ?>
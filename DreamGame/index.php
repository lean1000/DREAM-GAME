<?php include './includes/header.php'; ?>
<?php include './includes/searchBar.php'; ?>

<section class="banner-container">
    <button class="banner-botao-nav banner-esquerda" onclick="prevBanner()">&#9664;</button>

    <div class="banner-wrapper">
        <div class="banner">
            <img src="./assets/img/cod_modern_warfare.jpg" alt="foto-banner" class="banner-capa">
            <div class="banner-detalhes">
                <div class="banner-miniaturas">
                    <img src="./assets/img/batman_arkham_knight.jpg" alt="Screenshot 3">
                    <img src="./assets/img/among_us.jpg" alt="Screenshot 1">
                    <img src="./assets/img/battlefield_v.jpg" alt="Screenshot 4">
                    <img src="./assets/img/animal_crossing.jpg" alt="Screenshot 2">
                </div>
                <div class="banner-compra">
                    <p class="banner-preco">R$: 219,99</p>
                    <button class="banner-botao-compra">Ver Produto</button>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-wrapper">
        <div class="banner">
            <img src="./assets/img//call_of_duty_cold_war.jpg" alt="foto-banner" class="banner-capa">
            <div class="banner-detalhes">
                <div class="banner-miniaturas">
                    <img src="./assets/img/batman_arkham_knight.jpg" alt="Screenshot 3">
                    <img src="./assets/img/among_us.jpg" alt="Screenshot 1">
                    <img src="./assets/img/battlefield_v.jpg" alt="Screenshot 4">
                    <img src="./assets/img/animal_crossing.jpg" alt="Screenshot 2">
                </div>
                <div class="banner-compra">
                    <p class="banner-preco">R$: 219,99</p>
                    <button class="banner-botao-compra">Ver Produto</button>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-wrapper">
        <div class="banner">
            <img src="./assets/img/horizon_zero_dawn.jpg" alt="foto-banner" class="banner-capa">
            <div class="banner-detalhes">
                <div class="banner-miniaturas">
                    <img src="./assets/img/batman_arkham_knight.jpg" alt="Screenshot 3">
                    <img src="./assets/img/among_us.jpg" alt="Screenshot 1">
                    <img src="./assets/img/battlefield_v.jpg" alt="Screenshot 4">
                    <img src="./assets/img/animal_crossing.jpg" alt="Screenshot 2">
                </div>
                <div class="banner-compra">
                    <p class="banner-preco">R$: 219,99</p>
                    <button class="banner-botao-compra">Ver Produto</button>
                </div>
            </div>
        </div>
    </div>

    <button class="banner-botao-nav banner-direita" onclick="nextBanner()">&#9654;</button>
</section>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_dreamgame";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_generos";
$result = $conn->query($sql);
$generos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $generos[] = $row;
    }
}

foreach ($generos as $genero) {
    echo '<section>';
    echo '<h2 class="home-h2">' . $genero['genero'] . '</h2>';
    echo '<div class="home-container">';
    echo '<hr class="home-hr">';
    echo '<div class="home-scrol">';
    echo '<figure class="home-figure">';

    $sql_produtos = "SELECT * FROM tb_produtos WHERE ID_genero = " . $genero['ID_genero'];
    $result_produtos = $conn->query($sql_produtos);

    if ($result_produtos->num_rows > 0) {
        while ($produto = $result_produtos->fetch_assoc()) {
            echo '<a href="produto.php?id=' . $produto['id'] . '">
                    <img src="./assets/img/' . $produto['imagen'] . '" alt="' . $produto['titulo'] . '">
                  </a>';
        }
    } else {
        echo '<p>Nenhum produto encontrado para este gênero.</p>';
    }

    echo '</figure>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}

$conn->close();
?>

<script src="./assets/js/banner.js"></script>
<?php include './includes/footer.php'; ?>
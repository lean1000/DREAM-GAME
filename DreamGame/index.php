<?php include './includes/header.php'; ?>
<?php include './includes/searchBar.php'; ?>

<section class="banner-container">
    <button class="nav-button left" onclick="prevBanner()">&#9664;</button>

    <div class="banner-wrapper">
        <div class="banner">
            <img src="./assets/img/capa dos produtos/Horizon.png" alt="Horizon Forbidden West" class="cover">
            <div class="details">
                <div class="thumbnails">
                    <img src="./assets/img/capa dos produtos/HogwartsLegacy.png" alt="Screenshot 1">
                    <img src="./assets/img/capa dos produtos/GOWragnarok.png" alt="Screenshot 2">
                    <img src="./assets/img/capa dos produtos/LittleN.png" alt="Screenshot 3">
                    <img src="./assets/img/capa dos produtos/RedDeadR2.png" alt="Screenshot 4">
                </div>
                <div class="buy">
                    <p class="price">R$: 219,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-wrapper">
        <div class="banner">
            <img src="./assets/img/capa dos produtos/Horizon.png" alt="Horizon Forbidden West" class="cover">
            <div class="details">
                <div class="thumbnails">
                    <img src="./assets/img/capa dos produtos/RedDeadR2.png" alt="Screenshot 1">
                    <img src="./assets/img/capa dos produtos/LittleN.png" alt="Screenshot 2">
                    <img src="./assets/img/capa dos produtos/GOWragnarok.png" alt="Screenshot 3">
                    <img src="./assets/img/capa dos produtos/HogwartsLegacy.png" alt="Screenshot 4">
                </div>
                <div class="buy">
                    <p class="price">R$: 219,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-wrapper">
        <div class="banner">
            <img src="./assets/img/capa dos produtos/Horizon.png" alt="Horizon Forbidden West" class="cover">
            <div class="details">
                <div class="thumbnails">
                    <img src="./assets/img/capa dos produtos/GOWragnarok.png" alt="Screenshot 1">
                    <img src="./assets/img/capa dos produtos/HogwartsLegacy.png" alt="Screenshot 2">
                    <img src="./assets/img/capa dos produtos/LittleN.png" alt="Screenshot 3">
                    <img src="./assets/img/capa dos produtos/RedDeadR2.png" alt="Screenshot 4">
                </div>
                <div class="buy">
                    <p class="price">R$: 219,99</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
        </div>
    </div>

    <button class="nav-button right" onclick="nextBanner()">&#9654;</button>
</section>

<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_dreamgame";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperar todos os gêneros
$sql = "SELECT * FROM tb_generos";
$result = $conn->query($sql);
$generos = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $generos[] = $row;
    }
}

foreach ($generos as $genero) {
    echo '<section>';
    echo '<h2 class="h2">' . $genero['genero'] . '</h2>';
    echo '<div class="container">';
    echo '<hr>';
    echo '<div class="scrol">';
    echo '<figure>';

    // Recuperar os produtos para o gênero atual
    $sql_produtos = "SELECT * FROM tb_produtos WHERE ID_genero = " . $genero['ID_genero'];
    $result_produtos = $conn->query($sql_produtos);

    if ($result_produtos->num_rows > 0) {
        while($produto = $result_produtos->fetch_assoc()) {
            // Exibir a imagem do produto com id do produto
            echo '<img src="./assets/img/capa dos produtos/' . $produto['imagen'] . '" alt="foto-produto" id="produto_' . $produto['ID'] . '">';
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

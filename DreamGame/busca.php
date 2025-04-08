<?php include './includes/header.php'; ?>

<section class="conteiner_busca">
    <main class="ctn-busca">
        <div class="searchBar">
            <input type="text" id="searchInput" placeholder="Buscar...">
            <i class="bi bi-search" id="searchIcon" style="cursor: pointer;"></i>
        </div>

        <ul class="list-game" id="gameList"></ul>
    </main>

    <div class="filtro-container">
        <h2 class="filtro-titulo">Filtro</h2>
        <hr class="filtro-linha">

        <select class="filtro-input" id="genero">
            <option value="">Gênero</option>
        </select>

        <input type="number" class="filtro-input" id="ano" placeholder="Ano">
        <input type="number" class="filtro-input" id="precoMin" placeholder="Preço Mín">
        <input type="number" class="filtro-input" id="precoMax" placeholder="Preço Máx">
        <input type="number" class="filtro-input" id="avaliacao" placeholder="Avaliação mínima (1 a 5)">

        <hr class="filtro-linha">
        <button class="filtro-botao" onclick="buscarProdutos()">Filtrar</button>
    </div>
</section>

<script src="./assets/js/busca.js"></script>
<?php include './includes/footer.php'; ?>

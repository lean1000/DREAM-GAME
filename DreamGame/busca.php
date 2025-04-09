<?php include './includes/header.php'; ?>

<link rel="stylesheet" href="./assets/css/busca.css">

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

        <select class="option" id="genero">
            <option value="">Gênero</option>
        </select>

        <input type="number" class="filtro-input" id="ano" placeholder="Ano">
        <input type="number" class="filtro-input" id="precoMin" placeholder="Preço Mín">
        <input type="number" class="filtro-input" id="precoMax" placeholder="Preço Máx">
        <select class="option" id="avaliacao">
            <option value="">Avaliação</option>
            <option value="5">5 estrelas</option>
            <option value="4">4 estrelas ou mais</option>
            <option value="3">3 estrelas ou mais</option>
            <option value="2">2 estrelas ou mais</option>
            <option value="1">1 estrela ou mais</option>
        </select>

        <hr class="filtro-linha">
        <button class="filtro-botao" onclick="buscarProdutos()">Filtrar</button>
    </div>
</section>

<script src="./assets/js/busca.js"></script>
<?php include './includes/footer.php'; ?>
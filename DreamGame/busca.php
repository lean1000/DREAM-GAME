<?php include './includes/header.php'; ?>
<html>

<section class="conteiner_busca">
    <main class="ctn-busca">
        <div class="searchBar">

            <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchGames()">
            <i class="bi bi-search"></i>

            <button>Buscar</button>
        </div>

        <ul class="list-game" id="gameList">

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/Horizon.png" alt="Call of Duty">
                <div class="info-game">
                    <span>Horizon</span>
                </div>
                <span class="price-game">R$: 339,00</span>
            </li>

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/hogwarts.png" alt="Jujutsu Kaisen">
                <div class="info-game">
                    <span>Hogwarts</span>
                </div>
                <span class="price-game">R$: 229,00</span>
            </li>

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/TheLast.png" alt="Prince of Persia">
                <div class="info-game">
                    <span>The Last Of Us</span>
                </div>
                <span class="price-game">R$: 199,99</span>
            </li>

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/Star Wars Outlaws.png" alt="The Last of Us">
                <div class="info-game">
                    <span>Stars Wars Outlaws</span>
                </div>
                <span class="price-game">R$: 219,90</span>
            </li>

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/Mortal Kombat 1.png" alt="Tekken 8">
                <div class="info-game">
                    <span>Mortal Kombat 1</span>
                </div>
                <span class="price-game">R$: 269,90</span>
            </li>

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/Blackmyth_ Wu Kong.png" alt="Tekken 8">
                <div class="info-game">
                    <span>Wukong</span>
                </div>
                <span class="price-game">R$: 205,90</span>
            </li>

            <li class="item-game">
                <img src="./assets/img/capa dos produtos/SpiderMan2.png" alt="Tekken 8">
                <div class="info-game">
                    <span>Spider-Man 2</span>
                </div>
                <span class="price-game">R$: 139,90</span>
            </li>

        </ul>
    </main>


    <div class="filtro-container">

        <h2 class="filtro-titulo">Filtro</h2>
        <hr class="filtro-linha">

        <input type="text" class="filtro-input" placeholder="Gênero" name="genero">
        <input type="text" class="filtro-input" placeholder="Ano" name="ano">
        <input type="text" class="filtro-input" placeholder="Preço Máx" name="preco-max">
        <input type="text" class="filtro-input" placeholder="Preço Mín" name="preco-min">

        <hr class="filtro-linha">
        
        <input type="submit" class="filtro-botao" value="Filtrar">
    </div>
</section>

<?php include './includes/footer.php'; ?>
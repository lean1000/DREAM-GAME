<?php include './includes/header.php'; ?>

        <div class="container-busca">
            <div class="search-bar">
                
                <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="searchGames()">
                <i class="bi bi-search"></i>
                
                <div><button>Buscar</button></div>
            </div>

           <ul class="game-list" id="gameList">
                <li class="game-item">
                    <img src="./assets/img/capa dos produtos/hogwarts.png" alt="Call of Duty">
                    <div class="game-info">
                        <span>
                            <h6>Call of Duty: Black OPS 6</h6></span>
                    </div>
                    <span class="game-price">R$: 339,00</span>
                </li>
                <li class="game-item">
                    <img src="./assets/img/capa dos produtos/hogwarts.png" alt="Jujutsu Kaisen">
                    <div class="game-info">
                        <span>Jujutsu Kaisen Cursed Clash</span>
                    </div>
                    <span class="game-price">R$: 229,00</span>
                </li>
                <li class="game-item">
                    <img src="./assets/img/capa dos produtos/hogwarts.png" alt="Prince of Persia">
                    <div class="game-info">
                        <span>Prince of Persia: The Lost Crown</span>
                    </div>
                    <span class="game-price">R$: 199,99</span>
                </li>
                <li class="game-item">
                    <img src="./assets/img/capa dos produtos/hogwarts.png" alt="The Last of Us">
                    <div class="game-info">
                        <span>The Last of Us Part II</span>
                    </div>
                    <span class="game-price">R$: 219,90</span>
                </li>
                <li class="game-item">
                    <img src="./assets/img/capa dos produtos/hogwarts.png" alt="Tekken 8">
                    <div class="game-info">
                        <span>Tekken 8</span>
                    </div>
                    <span class="game-price">R$: 269,90</span>
                </li>
            </ul>
        </div>
        
    </body>

    </html>

    <script>
        function searchGames() {
            let input = document.getElementById("searchInput").value.toLowerCase(); // Captura o valor digitado
            let games = document.querySelectorAll(".game-item"); // Seleciona todos os itens da lista

            games.forEach(game => {
                let title = game.querySelector(".game-info span").textContent.toLowerCase(); // Pega o nome do jogo

                // Se o título contém o termo buscado, mostra o item, se não, esconde
                if (title.includes(input)) {
                    game.style.display = "flex";
                } else {
                    game.style.display = "none";
                }
            });

            // Se o campo de busca for apagado, volta à tela original
            if (input === "") {
                resetGameList();
            }
        }

        // Função para resetar a lista e mostrar todos os jogos novamente
        function resetGameList() {
            let games = document.querySelectorAll(".game-item");
            games.forEach(game => {
                game.style.display = "flex";
            });
        }

    </script>
document.addEventListener("DOMContentLoaded", () => {
    carregarGeneros();
    buscarProdutos(); // mostra todos os produtos inicialmente

    document.getElementById("searchInput").addEventListener("keypress", (event) => {
        if (event.key === "Enter") {
            buscarProdutos();
        }
    });

    document.getElementById("searchIcon").addEventListener("click", buscarProdutos);

    const urlParams = new URLSearchParams(window.location.search);
    const termo = urlParams.get('termo');
    if (termo) {
        document.getElementById("searchInput").value = termo;
        buscarProdutos();
    }
});

function carregarGeneros() {
    fetch('auxilio/auxbusca.php?acao=generos')
        .then(res => res.json())
        .then(generos => {
            const select = document.getElementById("genero");
            generos.forEach(genero => {
                const option = document.createElement("option");
                option.value = genero.ID_genero;
                option.textContent = genero.genero;
                select.appendChild(option);
            });
        })
        .catch(err => {
            console.error("Erro ao carregar gêneros:", err);
        });
}

function buscarProdutos() {
    const termo = document.getElementById("searchInput").value;
    const genero = document.getElementById("genero").value;
    const ano = document.getElementById("ano").value;
    const precoMin = document.getElementById("precoMin").value;
    const precoMax = document.getElementById("precoMax").value;
    const avaliacao = document.getElementById("avaliacao").value;

    const params = new URLSearchParams({
        acao: 'buscar',
        termo, genero, ano, precoMin, precoMax, avaliacao
    });

    fetch(`./auxilio/auxbusca.php?${params.toString()}`)
        .then(res => res.json())
        .then(produtos => {
            const lista = document.getElementById("gameList");
            lista.innerHTML = "";

            if (!produtos || produtos.length === 0) {
                lista.innerHTML = "<li style='color:white; padding: 10px;'>Nenhum produto encontrado.</li>";
                return;
            }

            produtos.forEach(p => {
                const item = document.createElement("li");
                item.className = "item-game";
                item.innerHTML = `
                    <a href="produto.php?id=${p.id}" style="display: flex; align-items: center; width: 100%;">
                        <img src="./assets/img/${p.imagen}" alt="${p.titulo}">
                        <div class="info-game">
                            <span>${p.titulo}</span>
                            <div class="estrelas" data-avaliacao="${p.avaliacao}"></div>
                        </div>
                        <span class="price-game">R$: ${parseFloat(p.valor).toFixed(2).replace('.', ',')}</span>
                    </a>
                `;
                lista.appendChild(item);
            });

            renderizarEstrelas();
        })
        .catch(err => {
            console.error("Erro ao buscar produtos:", err);
        });
}

function renderizarEstrelas() {
    document.querySelectorAll(".estrelas").forEach(div => {
        const avaliacao = parseInt(div.dataset.avaliacao);
        div.innerHTML = "";
        for (let i = 1; i <= 5; i++) {
            const estrela = document.createElement("i");
            estrela.className = i <= avaliacao ? "bi bi-star-fill" : "bi bi-star";
            estrela.style.color = "gold";
            div.appendChild(estrela);
        }
    });
}
document.addEventListener("DOMContentLoaded", () => {
    renderizarEstrelas();
});
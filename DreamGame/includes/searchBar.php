<form action="./busca.php" method="GET" class="search-bar">
    <!-- Botão Filtro: redireciona para busca sem termo -->
    <a href="./busca.php" class="icon-link" title="Abrir filtros">
        <i class="bi bi-funnel"></i>
    </a>

    <!-- Campo de busca -->
    <input type="text" name="termo" placeholder="Search..." required>

    <!-- Botão de busca: envia o termo -->
    <button type="submit" class="icon-link" style="background: none; border: none;" title="Buscar">
        <i class="bi bi-search"></i>
    </button>
</form>

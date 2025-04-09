<footer>
    <div class="footer-content">
        <p>
            © 2025 Dream Game. Todos os direitos reservados.
            Este site é um projeto acadêmico desenvolvido apenas para fins educacionais, sem qualquer intenção comercial. Todo o conteúdo apresentado é utilizado apenas para aprendizado e não possui vínculos oficiais com marcas, empresas ou entidades mencionadas. Caso haja qualquer questão relacionada a direitos autorais, entre em contato para que possamos resolver prontamente.
        </p>
        <ul class="footer-links">
            <a href="#">
                <li>Contatos</li>
            </a>
            <a href="#">
                <li>/</li>
            </a>
            <a href="#">
                <li>Redes Sociais</li>
            </a>
            <a href="#">
                <li>/</li>
            </a>
            <a href="./index.php">
                <li>Inicio</li>
            </a>
            <a href="#">
                <li>/</li>
            </a>
            <a href="./destaques.php">
                <li>Destaques</li>
            </a>
            <a href="#">
                <li>/</li>
            </a>
            <a href="./suporte.php">
                <li>Suporte</li>
            </a>
            <a href="#">
                <li>/</li>
            </a>
            <a href="./sobre.php">
                <li>Sobre</li>
            </a>
        </ul>
    </div>

</footer>
<script src="assets/js/carrinho.js"></script>
<script>
    const produtoAtual = {
        id: <?= $produto['ID'] ?>,
        titulo: "<?= addslashes($produto['titulo']) ?>",
        valor: <?= $produto['valor'] ?>,
        imagen: "<?= './assets/img/' . $produto['imagen'] ?>"
    };

    document.getElementById('btnComprar')?.addEventListener('click', function () {
        adicionarAoCarrinho(produtoAtual);
    });
</script>

</body>

</html>
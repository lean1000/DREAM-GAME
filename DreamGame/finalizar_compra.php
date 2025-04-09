<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['redir_after_login'] = 'finalizar_compra.php';
    header('Location: login.php');
    exit;
}

include './includes/header.php';
?>

<link rel="stylesheet" href="./assets/css/finalizar.css">

<div class="finalizar-container">
    <h2>Finalizar Compra</h2>

    <div id="lista-produtos-finalizar" class="lista-produtos-finalizar">
        <!-- Produtos do carrinho serão inseridos aqui via JS -->
    </div>

    <div class="total-finalizar">
        <strong>Total:</strong> R$ <span id="total-compra">0,00</span>
    </div>

    <form id="formFinalizar">
        <label for="email">E-mail para envio do comprovante:</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <button type="submit">Comprar</button>
    </form>

    <div class="mensagem-sucesso" id="mensagemSucesso">Compra realizada com sucesso!</div>
</div>

<script>
    const carrinho = JSON.parse(localStorage.getItem('carrinhoFinalizar')) || [];
    const lista = document.getElementById('lista-produtos-finalizar');
    const totalSpan = document.getElementById('total-compra');

    let total = 0;
    carrinho.forEach(prod => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('produto-finalizar');
        itemDiv.innerHTML = `
            <img src="./assets/img/${prod.imagen}" alt="${prod.titulo}">
            <div>
                <h3>${prod.titulo}</h3>
                <p>Preço: R$ ${prod.valor.toFixed(2).replace('.', ',')}</p>
            </div>
        `;
        lista.appendChild(itemDiv);
        total += prod.valor;
    });

    totalSpan.innerText = total.toFixed(2).replace('.', ',');

    const form = document.getElementById('formFinalizar');
    const sucesso = document.getElementById('mensagemSucesso');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        sucesso.style.display = 'block';

        // Limpa carrinho após compra
        localStorage.removeItem('carrinho');
        localStorage.removeItem('carrinhoFinalizar');

        setTimeout(() => {
            window.location.href = 'index.php';
        }, 2500);
    });
</script>

<?php include './includes/footer.php'; ?>
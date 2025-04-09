// Recupera o carrinho do localStorage ou inicia com um array vazio
let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

// Salva o carrinho no localStorage
function salvarCarrinho() {
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
}

// Atualiza a interface do carrinho (itens e total)
function atualizarCarrinhoUI() {
    const container = document.getElementById('itens-carrinho');
    const totalSpan = document.getElementById('total-carrinho');
    if (!container || !totalSpan) return;
    container.innerHTML = '';
    let total = 0;
    
    carrinho.forEach((item, index) => {
        const div = document.createElement('div');
        div.classList.add('carrinho-item');
        div.innerHTML = `
            <span>${item.titulo}</span>
            <span>R$ ${item.valor.toFixed(2).replace('.', ',')}</span>
            <button onclick="removerItem(${index})">x</button>
        `;
        container.appendChild(div);
        total += item.valor;
    });
    
    totalSpan.innerText = total.toFixed(2).replace('.', ',');
}

// Remove um item do carrinho
function removerItem(index) {
    carrinho.splice(index, 1);
    salvarCarrinho();
    atualizarCarrinhoUI();
}

// Função para adicionar um produto ao carrinho
function adicionarAoCarrinho(produto) {
    carrinho.push(produto);
    salvarCarrinho();
    atualizarCarrinhoUI();
    
    // Exibe o carrinho flutuante
    const carrinhoDiv = document.getElementById('carrinho-flutuante');
    if (carrinhoDiv) {
        carrinhoDiv.style.display = 'flex';
    }
    
    // Exibe uma mensagem de confirmação
    const aviso = document.createElement('div');
    aviso.innerText = 'Produto adicionado ao carrinho!';
    aviso.style.position = 'fixed';
    aviso.style.top = '20px';
    aviso.style.right = '20px';
    aviso.style.background = '#4caf50';
    aviso.style.color = 'white';
    aviso.style.padding = '10px 20px';
    aviso.style.borderRadius = '8px';
    aviso.style.boxShadow = '0 0 10px rgba(0,0,0,0.2)';
    aviso.style.zIndex = '10000';
    document.body.appendChild(aviso);
    setTimeout(() => { aviso.remove(); }, 2000);
}

// Configura os eventos assim que o DOM estiver carregado
document.addEventListener('DOMContentLoaded', function() {
    // Botão para fechar o carrinho
    const fecharBtn = document.getElementById('fechar-carrinho');
    if (fecharBtn) {
        fecharBtn.addEventListener('click', () => {
            const carrinhoDiv = document.getElementById('carrinho-flutuante');
            if (carrinhoDiv) {
                carrinhoDiv.style.display = 'none';
            }
        });
    }
    
    // Botão para abrir o carrinho (se você tiver um, por exemplo, no header)
    const abrirBtn = document.getElementById('abrir-carrinho');
    if (abrirBtn) {
        abrirBtn.addEventListener('click', () => {
            const carrinhoDiv = document.getElementById('carrinho-flutuante');
            if (carrinhoDiv) {
                carrinhoDiv.style.display = 'flex';
            }
        });
    }
    
    // Botão para finalizar compra
    const finalizarBtn = document.getElementById('btn-finalizar');
    if (finalizarBtn) {
        finalizarBtn.addEventListener('click', () => {
            localStorage.setItem('carrinhoFinalizar', JSON.stringify(carrinho));
            window.location.href = 'finalizar_compra.php';
        });
    }
    
    atualizarCarrinhoUI();
});

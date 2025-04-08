// Função para mover a rolagem para a esquerda
function prevBanner() {
    const container = document.querySelector('.home-scrol');
    container.scrollBy({
        left: -300, // Mover 300px para a esquerda
        behavior: 'smooth'
    });
}

// Função para mover a rolagem para a direita
function nextBanner() {
    const container = document.querySelector('.home-scrol');
    container.scrollBy({
        left: 300, // Mover 300px para a direita
        behavior: 'smooth'
    });
}

// Função para permitir arrastar o conteúdo
document.querySelectorAll('.home-scrol').forEach(container => {
    let isMouseDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isMouseDown = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        container.style.cursor = 'grabbing';
    });

    container.addEventListener('mouseleave', () => {
        isMouseDown = false;
        container.style.cursor = 'grab';
    });

    container.addEventListener('mouseup', () => {
        isMouseDown = false;
        container.style.cursor = 'grab';
    });

    container.addEventListener('mousemove', (e) => {
        if (!isMouseDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2; // Multiplicador para controlar a velocidade do arrasto
        container.scrollLeft = scrollLeft - walk;
    });
});

function prevBanner() {
    const container = document.querySelector('.home-scrol');
    container.scrollBy({
        left: -300,
        behavior: 'smooth'
    });
}

function nextBanner() {
    const container = document.querySelector('.home-scrol');
    container.scrollBy({
        left: 300,
        behavior: 'smooth'
    });
}

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
        const walk = (x - startX) * 2;
        container.scrollLeft = scrollLeft - walk;
    });
});
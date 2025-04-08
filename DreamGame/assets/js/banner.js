document.addEventListener("DOMContentLoaded", () => {
    const bannerWrappers = document.querySelectorAll(".banner-wrapper");
    let currentBannerIndex = 0;

    function updateBanner() {
        bannerWrappers.forEach((banner, index) => {
            banner.classList.toggle("ativo", index === currentBannerIndex);
        });
    }

    // Tornar funções globais para funcionar com onclick
    window.prevBanner = function () {
        currentBannerIndex = (currentBannerIndex - 1 + bannerWrappers.length) % bannerWrappers.length;
        updateBanner();
        resetAutoSlide();
    };

    window.nextBanner = function () {
        currentBannerIndex = (currentBannerIndex + 1) % bannerWrappers.length;
        updateBanner();
        resetAutoSlide();
    };

    let autoSlideInterval;
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            nextBanner();
        }, 5000); // Troca a cada 5 segundos
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    updateBanner();
    startAutoSlide();
});

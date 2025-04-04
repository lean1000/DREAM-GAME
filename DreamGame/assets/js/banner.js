document.addEventListener("DOMContentLoaded", () => {
    const bannerWrappers = document.querySelectorAll(".banner-wrapper");
    let currentBannerIndex = 0;

    function updateBanner() {
        bannerWrappers.forEach((banner, index) => {
            banner.style.display = index === currentBannerIndex ? "block" : "none";
        });
    }

    function prevBanner() {
        currentBannerIndex = (currentBannerIndex - 1 + bannerWrappers.length) % bannerWrappers.length;
        updateBanner();
        resetAutoSlide();
    }

    function nextBanner() {
        currentBannerIndex = (currentBannerIndex + 1) % bannerWrappers.length;
        updateBanner();
        resetAutoSlide();
    }

    let autoSlideInterval;
    function startAutoSlide() {
        autoSlideInterval = setInterval(nextBanner, 3000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    document.querySelector(".nav-button.left").addEventListener("click", prevBanner);
    document.querySelector(".nav-button.right").addEventListener("click", nextBanner);

    updateBanner();
    startAutoSlide();
});

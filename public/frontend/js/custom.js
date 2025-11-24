(function () {
    const slider = document.getElementById("reviewSlider");

    let originalSlides = Array.from(slider.children);

    const visible = 7;
    const slideWidth = 180;
    let index = 0;

    originalSlides.forEach(slide => slider.appendChild(slide.cloneNode(true)));
    let slides = Array.from(document.querySelectorAll(".tooltip-slide"));

    const totalOriginalSlides = originalSlides.length;

    function updateSlider() {

        slides.forEach(s => s.classList.remove("active"));

        const centerIndexInSlidesArray = index + Math.floor(visible / 2);

        if (slides[centerIndexInSlidesArray]) slides[centerIndexInSlidesArray].classList.add("active");

        const offset = (visible * slideWidth) / 2 - (slideWidth / 2);
        const moveX = index * slideWidth;

        slider.style.transform = `translateX(-${moveX - offset}px)`;

        index++;

        if (index >= totalOriginalSlides) {

            setTimeout(() => {
                slider.style.transition = "none";


                index = index - totalOriginalSlides;

                const newMoveX = index * slideWidth;
                slider.style.transform = `translateX(-${newMoveX - offset}px)`;

                setTimeout(() => slider.style.transition = "0.6s ease", 50);
            }, 600);
        }
    }

    updateSlider();

    setInterval(updateSlider, 2000);

})();


const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    item.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        faqItems.forEach(i => i.classList.remove('active'));

        if (!isActive) {
            item.classList.add('active');
        }
    });
});

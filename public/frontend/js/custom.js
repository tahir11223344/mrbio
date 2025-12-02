(function () {
    const slider = document.getElementById("reviewSlider");
    if (!slider) return;

    const visible = 5; // Figma ke hisaab se jitne thumbnails dikhane hain (odd number rakhna)

    // Original slides ko store karo
    const originalSlides = Array.from(slider.children);
    const originalCount = originalSlides.length;

    // Infinite loop ke liye original slides ko duplicate karke end pe add kar do
    originalSlides.forEach(slide => slider.appendChild(slide.cloneNode(true)));

    // Ab saare slides (original + clones)
    const slides = Array.from(slider.querySelectorAll(".tooltip-slide"));

    // Slide width ko dynamically nikaal lo
    const slideWidth = slides[0].getBoundingClientRect().width;

    // Basic styling JS se bhi enforce kar dete hain
    slider.style.display = "flex";
    slider.style.transition = "transform 0.6s ease";

    let index = 0; // left-most visible slide index
    const offset = (visible * slideWidth) / 2 - (slideWidth / 2);

    function setActive() {
        // Sab slides se active hatao
        slides.forEach(s => s.classList.remove("active"));

        // Center slide ka index nikaalo (mod use kiya taake range ke bahar na jaye)
        const centerIndex = (index + Math.floor(visible / 2)) % slides.length;

        if (slides[centerIndex]) {
            slides[centerIndex].classList.add("active");
        }
    }

    function applyTransform() {
        const moveX = index * slideWidth;
        slider.style.transform = `translateX(-${moveX - offset}px)`;
        setActive();
    }

    function nextSlide() {
        index++;

        applyTransform();

        // Jab hum cloned part me pohanch jate hain, toh quietly wapas originals pe jump karo
        if (index >= originalCount) {
            setTimeout(() => {
                // animation off karke jump
                slider.style.transition = "none";
                index = index - originalCount;
                applyTransform();

                // thoda delay dekar transition dubara on karo
                setTimeout(() => {
                    slider.style.transition = "transform 0.6s ease";
                }, 50);
            }, 600); // yahi tumhari transition duration hai
        }
    }

    // Initial position + active tooltip
    applyTransform();

    // Auto-play
    setInterval(nextSlide, 2000);
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

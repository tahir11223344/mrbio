// (function () {
//     const slider = document.getElementById("reviewSlider");

//     let originalSlides = Array.from(slider.children);

//     const visible = 8;
//     const slideWidth = 10;
//     let index = 0;

//     originalSlides.forEach(slide => slider.appendChild(slide.cloneNode(true)));
//     let slides = Array.from(document.querySelectorAll(".tooltip-slide"));

//     const totalOriginalSlides = originalSlides.length;

//     function updateSlider() {

//         slides.forEach(s => s.classList.remove("active"));

//         const centerIndexInSlidesArray = index + Math.floor(visible / 2);

//         if (slides[centerIndexInSlidesArray]) slides[centerIndexInSlidesArray].classList.add("active");

//         const offset = (visible * slideWidth) / 2 - (slideWidth / 2);
//         const moveX = index * slideWidth;

//         slider.style.transform = `translateX(-${moveX - offset}px)`;

//         index++;

//         if (index >= totalOriginalSlides) {

//             setTimeout(() => {
//                 slider.style.transition = "none";


//                 index = index - totalOriginalSlides;

//                 const newMoveX = index * slideWidth;
//                 slider.style.transform = `translateX(-${newMoveX - offset}px)`;

//                 setTimeout(() => slider.style.transition = "0.6s ease", 50);
//             }, 600);
//         }
//     }

//     updateSlider();

//     setInterval(updateSlider, 2000);

// })();


// const faqItems = document.querySelectorAll('.faq-item');

// faqItems.forEach(item => {
//     item.addEventListener('click', () => {
//         const isActive = item.classList.contains('active');

//         faqItems.forEach(i => i.classList.remove('active'));

//         if (!isActive) {
//             item.classList.add('active');
//         }
//     });
// });


// =========== show more faqs js ============


// (function () {
//     const slider = document.getElementById("reviewSlider");

//     let originalSlides = Array.from(slider.children);

//     const visible = 8;       // Visible slides
//     const slideWidth = 106;  // Width of each slide
//     let index = 0;

//     // Duplicate slides for infinite effect
//     originalSlides.forEach(slide => slider.appendChild(slide.cloneNode(true)));
//     let slides = Array.from(document.querySelectorAll(".tooltip-slide"));

//     const totalOriginalSlides = originalSlides.length;

//     // Update slider: center current index
//     function updateSlider() {
//         slides.forEach(s => s.classList.remove("active", "show-tooltip"));

//         const centerIndex = index + Math.floor(visible / 2);
//         if (slides[centerIndex]) {
//             slides[centerIndex].classList.add("active");
//             slides[centerIndex].classList.add("show-tooltip");
//         }

//         const offset = (visible * slideWidth) / 2 - slideWidth / 2;
//         const moveX = index * slideWidth;

//         slider.style.transition = "0.6s ease";
//         slider.style.transform = `translateX(-${moveX - offset}px)`;

//         index++;

//         // Infinite loop
//         if (index >= totalOriginalSlides) {
//             setTimeout(() => {
//                 slider.style.transition = "none";
//                 index = index - totalOriginalSlides;
//                 const newMoveX = index * slideWidth;
//                 slider.style.transform = `translateX(-${newMoveX - offset}px)`;
//                 setTimeout(() => slider.style.transition = "0.6s ease", 50);
//             }, 600);
//         }
//     }

//     // 🔥 Click on any slide to move to center
//     slides.forEach((slide, i) => {
//         slide.addEventListener("click", () => {
//             index = i;
//             updateSlider();
//         });
//     });

//     updateSlider();
//     setInterval(updateSlider, 2000); // Auto-slide every 2 sec

// })();


(function () {
    const slider = document.getElementById("reviewSlider");

    let originalSlides = Array.from(slider.children);

    const visible = 8;       // Visible slides in container
    const slideWidth = 106;  // Width of each slide
    let index = 0;           // Current index of leftmost visible slide

    // Duplicate slides for infinite effect
    originalSlides.forEach(slide => slider.appendChild(slide.cloneNode(true)));
    let slides = Array.from(document.querySelectorAll(".tooltip-slide"));
    const totalOriginalSlides = originalSlides.length;

    function updateSlider() {
        slides.forEach(s => s.classList.remove("active", "show-tooltip"));

        // Calculate center slide index
        const centerIndex = index + Math.floor(visible / 2);

        // Only center slide gets tooltip
        if (slides[centerIndex]) {
            slides[centerIndex].classList.add("active");
            slides[centerIndex].classList.add("show-tooltip");
        }

        const offset = (visible * slideWidth) / 2 - slideWidth / 2;
        const moveX = index * slideWidth;

        slider.style.transition = "0.6s ease";
        slider.style.transform = `translateX(-${moveX - offset}px)`;

        index++;

        // Loop when reaching end
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

    // Click: move clicked slide to center
    slides.forEach((slide, i) => {
        slide.addEventListener("click", () => {
            index = i - Math.floor(visible / 2);
            if (index < 0) index = 0;
            updateSlider();
        });
    });

    updateSlider();

    // Auto-slide every 2 seconds
    setInterval(updateSlider, 2000);

})();



// ============= faqs ==================


// document.addEventListener("DOMContentLoaded", function () {
//     const faqItems = Array.from(document.querySelectorAll(".faqs-list .faq-item"));
//     const seeMoreBtn = document.querySelector(".btn-see-more");
//     const visibleCount = 4;
//     const totalFAQs = faqItems.length;

//     const originalBg = "#0071A8";
//     const lessBg = "red";

//     let currentVisible = visibleCount;

//     // Hide extra FAQs initially
//     faqItems.forEach((item, index) => {
//         if (index >= visibleCount) item.style.display = "none";
//     });

//     // Accordion toggle (one open at a time)
//     faqItems.forEach(item => {
//         const title = item.querySelector(".faq-title");
//         const content = item.querySelector(".faq-content");

//         title.addEventListener("click", () => {
//             faqItems.forEach(i => {
//                 if (i !== item) {
//                     i.classList.remove("active");
//                     i.querySelector(".faq-content").style.maxHeight = "0px";
//                 }
//             });

//             item.classList.toggle("active");
//             if (item.classList.contains("active")) {
//                 content.style.maxHeight = content.scrollHeight + "px";
//             } else {
//                 content.style.maxHeight = "0px";
//             }
//         });
//     });

//     // ⭐ FINAL UPDATED LOGIC — Show All at Once ⭐
//     seeMoreBtn.addEventListener("click", () => {
//         const hiddenItems = faqItems.filter(item => item.style.display === "none");

//         if (hiddenItems.length > 0) {
//             // 👉 Show ALL hidden FAQs at once
//             hiddenItems.forEach(item => item.style.display = "block");

//             currentVisible = totalFAQs;
//             seeMoreBtn.textContent = "Show Less";
//             seeMoreBtn.style.backgroundColor = lessBg;

//         } else {
//             // 👉 Hide all except first 4
//             faqItems.forEach((item, index) => {
//                 if (index >= visibleCount) {
//                     item.style.display = "none";
//                     item.classList.remove("active");
//                     item.querySelector(".faq-content").style.maxHeight = "0px";
//                 }
//             });

//             currentVisible = visibleCount;
//             seeMoreBtn.textContent = "See More";
//             seeMoreBtn.style.backgroundColor = originalBg;
//         }
//     });
// });

document.addEventListener("DOMContentLoaded", function () {

    // Har faqs-section ke liye alag logic
    document.querySelectorAll(".faqs-section").forEach(function (section) {
        const faqItems = Array.from(section.querySelectorAll(".faqs-list .faq-item"));
        const seeMoreBtn = section.querySelector(".btn-see-more");

        if (!faqItems.length) {
            return; // is section mein faqs hi nahi
        }

        const visibleCount = parseInt(section.getAttribute('data-visible') || '4', 10);
        const totalFAQs = faqItems.length;

        const btnMoreText = section.getAttribute('data-btn-more') || 'See More';
        const btnLessText = section.getAttribute('data-btn-less') || 'Show Less';

        const originalBg = "#0168A4"; // tumhari CSS wali color
        const lessBg = "#004972";

        let allVisible = false;

        // --- Initially: sirf first N show karo
        faqItems.forEach((item, index) => {
            const content = item.querySelector(".faq-content");
            content.style.maxHeight = "0px"; // start closed

            if (index >= visibleCount) {
                item.style.display = "none";
            }
        });

        // --- Accordion toggle (one open at a time)
        faqItems.forEach(item => {
            const title = item.querySelector(".faq-title");
            const content = item.querySelector(".faq-content");

            title.addEventListener("click", () => {
                // sab close karo except current
                faqItems.forEach(i => {
                    const c = i.querySelector(".faq-content");
                    if (i !== item) {
                        i.classList.remove("active");
                        c.style.maxHeight = "0px";
                    }
                });

                item.classList.toggle("active");
                if (item.classList.contains("active")) {
                    content.style.maxHeight = content.scrollHeight + "px";
                } else {
                    content.style.maxHeight = "0px";
                }
            });
        });

        // --- See More / Show Less (all at once)
        if (seeMoreBtn && totalFAQs > visibleCount) {

            // initial button state
            seeMoreBtn.textContent = btnMoreText;
            seeMoreBtn.style.backgroundColor = originalBg;

            seeMoreBtn.addEventListener("click", () => {
                if (!allVisible) {
                    // show ALL
                    faqItems.forEach(item => {
                        item.style.display = "block";
                    });
                    seeMoreBtn.textContent = btnLessText;
                    seeMoreBtn.style.backgroundColor = lessBg;
                    allVisible = true;
                } else {
                    // hide except first N
                    faqItems.forEach((item, index) => {
                        const content = item.querySelector(".faq-content");
                        if (index >= visibleCount) {
                            item.style.display = "none";
                            item.classList.remove("active");
                            content.style.maxHeight = "0px";
                        }
                    });
                    seeMoreBtn.textContent = btnMoreText;
                    seeMoreBtn.style.backgroundColor = originalBg;
                    allVisible = false;
                }
            });
        } else if (seeMoreBtn) {
            // agar FAQs already <= visibleCount hain to button hide
            seeMoreBtn.style.display = "none";
        }

    });
});




// ================ offer slider =================




document.querySelectorAll(".offer-slider-wrapper").forEach(wrapper => {

    const offerTrack = wrapper.querySelector(".offer-slider-track");
    const offerCards = wrapper.querySelectorAll(".offer-card");
    const offerPrev = wrapper.querySelector(".offer-prev");
    const offerNext = wrapper.querySelector(".offer-next");
    const pagination = wrapper.querySelector(".offer-pagination");

    let offerIndex = 0;
    let offerVisibleCards = 4;

    function getCardWidth() {
        return offerCards[0].offsetWidth + 20;
    }

    let offerCardWidth = getCardWidth();

    function updateVisibleCards() {
        if (window.innerWidth < 576) offerVisibleCards = 1;
        else if (window.innerWidth < 992) offerVisibleCards = 2;
        else offerVisibleCards = 4;

        offerCardWidth = getCardWidth();
    }

    updateVisibleCards();
    window.addEventListener("resize", updateVisibleCards);

    const totalCards = offerCards.length / 2;

    /* ------------------ Pagination Dots Create -------------------- */
    pagination.innerHTML = "";
    const dots = [];

    for (let i = 0; i < totalCards; i++) {
        const dot = document.createElement("div");
        dot.classList.add("offer-dot");
        if (i === 0) dot.classList.add("active");

        dot.addEventListener("click", () => {
            offerIndex = i;
            slideToIndex();
            updateDots();
        });

        pagination.appendChild(dot);
        dots.push(dot);
    }

    function updateDots() {
        dots.forEach((dot, i) => {
            dot.classList.toggle("active", i === offerIndex);
        });
    }

    /* ------------------ Slider Movement -------------------- */


    function slideToIndex() {
        offerTrack.style.transition = "transform 1s linear";
        offerTrack.style.transform = `translateX(-${offerIndex * offerCardWidth}px)`;
        updateDots();
    }

    function autoSlide() {
        offerIndex++;
        slideToIndex();

        if (offerIndex >= totalCards) {
            setTimeout(() => {
                offerTrack.style.transition = "none";
                offerIndex = 0;
                offerTrack.style.transform = `translateX(0)`;
                updateDots();
            }, 1000);
        }
    }

    offerNext.onclick = autoSlide;

    offerPrev.onclick = () => {
        offerIndex--;
        if (offerIndex < 0) {
            offerTrack.style.transition = "none";
            offerIndex = totalCards - 1;
        }
        slideToIndex();
    };

    let sliderInterval = setInterval(autoSlide, 3000);

    function pauseSlider() {
        clearInterval(sliderInterval);
        sliderInterval = null;
    }

    function resumeSlider() {
        if (!sliderInterval) {
            sliderInterval = setInterval(autoSlide, 3000);
        }
    }

    [wrapper, offerPrev, offerNext].forEach(el => {
        el.addEventListener("mouseenter", pauseSlider);
        el.addEventListener("mouseleave", resumeSlider);
    });

});

// =================repair or location  details pages js ==================


document.addEventListener("DOMContentLoaded", function () {

    const mainImage = document.getElementById("mainImage");
    const thumbTrack = document.getElementById("thumbsTrack");
    const paginationBar = document.getElementById("paginationBar");
    const prevBtn = document.querySelector(".thumb-prev");
    const nextBtn = document.querySelector(".thumb-next");

    // Agar slider ke elements exist hi nahi karte → EXIT
    if (!mainImage || !thumbTrack || !paginationBar) {
        console.warn("Slider elements not found on this page.");
        return;
    }

    let offset = 0;
    const visibleThumbs = 4;
    const thumbWidth = 92;
    let thumbElements = document.querySelectorAll(".thumb");

    const totalPages = Math.ceil(thumbElements.length / visibleThumbs);

    // Create Pagination
    for (let i = 0; i < totalPages; i++) {
        let seg = document.createElement("div");
        seg.classList.add("pg-segment");
        seg.dataset.page = i;
        paginationBar.appendChild(seg);
    }

    const pgSegments = document.querySelectorAll(".pg-segment");

    function setActivePage(page) {
        pgSegments.forEach(seg => seg.classList.remove("active"));
        if (pgSegments[page]) pgSegments[page].classList.add("active");
    }
    setActivePage(0);

    function goToPage(page) {
        offset = -(page * visibleThumbs * thumbWidth);
        thumbTrack.style.transform = `translateX(${offset}px)`;
        setActivePage(page);
    }

    // Pagination click
    pgSegments.forEach(seg => {
        seg.onclick = () => goToPage(parseInt(seg.dataset.page));
    });

    // Left Arrow
    if (prevBtn) {
        prevBtn.onclick = () => {
            let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
            if (currentPage > 0) goToPage(currentPage - 1);
        };
    }

    // Right Arrow
    if (nextBtn) {
        nextBtn.onclick = () => {
            let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
            if (currentPage < totalPages - 1) goToPage(currentPage + 1);
        };
    }

    // Thumbnail click
    window.thumbClicked = function (src) {
        mainImage.src = src;

        const clickedThumb = [...thumbElements].find(t => t.src === src);

        if (clickedThumb) {
            thumbTrack.appendChild(clickedThumb);
            thumbElements = document.querySelectorAll(".thumb");
        }

        goToPage(0);
    };
});


// ---------------------------------------------------------
// When user selects a state, load its related cities via AJAX
// ---------------------------------------------------------
$('#footer_state').on('change', function () {

    // Selected state ID
    let stateId = $(this).val();

    // City dropdown reference
    let cityDropdown = $('select[name="city"]');

    // Show loading before request
    cityDropdown.html('<option>Loading...</option>');

    // If a valid state is selected
    if (stateId) {

        $.ajax({
            url: "/get-cities/" + stateId, // Route to fetch cities
            type: "GET",

            // -------------------------------------------
            // On successful response from controller
            // -------------------------------------------
            success: function (response) {

                // If API returned status=false
                if (!response.status) {
                    cityDropdown.html('<option>' + response.message + '</option>');
                    return;
                }

                // Clear & append default option
                cityDropdown.empty();
                cityDropdown.append('<option value="">Select City</option>');

                // Add cities to dropdown
                $.each(response.data, function (id, name) {
                    cityDropdown.append(
                        '<option value="' + id + '">' + name + '</option>'
                    );
                });
            },

            // -------------------------------------------
            // Handle server-side or network errors
            // -------------------------------------------
            error: function (xhr) {

                let errorMessage = "Error loading cities";

                // Custom error for bad request
                if (xhr.status === 400) {
                    errorMessage = "Invalid state selected";
                }

                cityDropdown.html('<option>' + errorMessage + '</option>');
            }
        });

    } else {
        // If no state is selected, reset dropdown
        cityDropdown.html('<option>Select City</option>');
    }

});








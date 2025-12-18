// ================ review slider function ======================

function initReviewSlider() {

    const sliderEl = document.querySelector(".reviewSwiper");

    // Agar page me slider exist nahi karta → function stop
    if (!sliderEl) return;

    var swiper = new Swiper(".reviewSwiper", {
        slidesPerView: 5,
        spaceBetween: 40,
        centeredSlides: true,
        loop: true,
        speed: 5000,

        autoplay: {
            delay: 10,
            disableOnInteraction: false,
            reverseDirection: true,
        },

        on: {
            click(swiper) {
                swiper.slideTo(swiper.clickedIndex, 900);
            },

            slideChange(swiper) {
                updateTooltip(swiper);
            },

            init(swiper) {
                updateTooltip(swiper);
            }
        }
    });
}

function updateTooltip(swiper) {
    if (!swiper) return;

    document.querySelectorAll('.tooltip-slide')
        .forEach(s => s.classList.remove('is-center'));

    let centerSlide = swiper.slides[swiper.activeIndex];

    if (centerSlide && centerSlide.classList.contains("tooltip-slide")) {
        centerSlide.classList.add("is-center");
    }
}

// Page load par slider initialize
document.addEventListener("DOMContentLoaded", initReviewSlider);

document.addEventListener("DOMContentLoaded", function () {
    const faqItems = Array.from(document.querySelectorAll(".faqs-list .faq-item"));
    const seeMoreBtn = document.querySelector(".btn-see-more");
    const visibleCount = 4;
    const totalFAQs = faqItems.length;

    const originalBg = "#0071A8";
    const lessBg = "red";

    let currentVisible = visibleCount;

    // Hide extra FAQs initially
    faqItems.forEach((item, index) => {
        if (index >= visibleCount) item.style.display = "none";
    });

    // Accordion toggle (one open at a time)
    faqItems.forEach(item => {
        const title = item.querySelector(".faq-title");
        const content = item.querySelector(".faq-content");

        title.addEventListener("click", () => {
            faqItems.forEach(i => {
                if (i !== item) {
                    i.classList.remove("active");
                    i.querySelector(".faq-content").style.maxHeight = "0px";
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

    // ⭐ FINAL UPDATED LOGIC — Show All at Once ⭐
    seeMoreBtn.addEventListener("click", () => {
        const hiddenItems = faqItems.filter(item => item.style.display === "none");

        if (hiddenItems.length > 0) {
            // 👉 Show ALL hidden FAQs at once
            hiddenItems.forEach(item => item.style.display = "block");

            currentVisible = totalFAQs;
            seeMoreBtn.textContent = "Show Less";
            seeMoreBtn.style.backgroundColor = lessBg;

        } else {
            // 👉 Hide all except first 4
            faqItems.forEach((item, index) => {
                if (index >= visibleCount) {
                    item.style.display = "none";
                    item.classList.remove("active");
                    item.querySelector(".faq-content").style.maxHeight = "0px";
                }
            });

            currentVisible = visibleCount;
            seeMoreBtn.textContent = "See More";
            seeMoreBtn.style.backgroundColor = originalBg;
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


// document.addEventListener("DOMContentLoaded", function () {

//     const mainImage = document.getElementById("mainImage");
//     const thumbTrack = document.getElementById("thumbsTrack");
//     const paginationBar = document.getElementById("paginationBar");
//     const prevBtn = document.querySelector(".thumb-prev");
//     const nextBtn = document.querySelector(".thumb-next");

//     // Agar slider ke elements exist hi nahi karte → EXIT
//     if (!mainImage || !thumbTrack || !paginationBar) {
//         console.warn("Slider elements not found on this page.");
//         return;
//     }

//     let offset = 0;
//     const visibleThumbs = 4;
//     const thumbWidth = 92;
//     let thumbElements = document.querySelectorAll(".thumb");

//     const totalPages = Math.ceil(thumbElements.length / visibleThumbs);

//     // Create Pagination
//     for (let i = 0; i < totalPages; i++) {
//         let seg = document.createElement("div");
//         seg.classList.add("pg-segment");
//         seg.dataset.page = i;
//         paginationBar.appendChild(seg);
//     }

//     const pgSegments = document.querySelectorAll(".pg-segment");

//     function setActivePage(page) {
//         pgSegments.forEach(seg => seg.classList.remove("active"));
//         if (pgSegments[page]) pgSegments[page].classList.add("active");
//     }
//     setActivePage(0);

//     function goToPage(page) {
//         offset = -(page * visibleThumbs * thumbWidth);
//         thumbTrack.style.transform = `translateX(${offset}px)`;
//         setActivePage(page);
//     }

//     // Pagination click
//     pgSegments.forEach(seg => {
//         seg.onclick = () => goToPage(parseInt(seg.dataset.page));
//     });

//     // Left Arrow
//     if (prevBtn) {
//         prevBtn.onclick = () => {
//             let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
//             if (currentPage > 0) goToPage(currentPage - 1);
//         };
//     }

//     // Right Arrow
//     if (nextBtn) {
//         nextBtn.onclick = () => {
//             let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
//             if (currentPage < totalPages - 1) goToPage(currentPage + 1);
//         };
//     }

//     // Thumbnail click
//     window.thumbClicked = function (src) {
//         mainImage.src = src;

//         const clickedThumb = [...thumbElements].find(t => t.src === src);

//         if (clickedThumb) {
//             thumbTrack.appendChild(clickedThumb);
//             thumbElements = document.querySelectorAll(".thumb");
//         }

//         goToPage(0);
//     };
// });

document.addEventListener("DOMContentLoaded", function () {

    const mainImage = document.getElementById("mainImage");
    const thumbTrack = document.getElementById("thumbsTrack");
    const paginationBar = document.getElementById("paginationBar");
    const prevBtn = document.querySelector(".thumb-prev");
    const nextBtn = document.querySelector(".thumb-next");

    if (!mainImage || !thumbTrack || !paginationBar) {
        console.warn("Slider elements not found!");
        return;
    }

    let offset = 0;
    const visibleThumbs = 4;
    const thumbWidth = 92;

    let thumbElements = document.querySelectorAll(".thumb");

    /** ------------------------------------------
     *  1: Set DEFAULT MAIN IMAGE + ACTIVE THUMB
     * ------------------------------------------ */

    if (thumbElements.length > 0) {
        const firstSrc = thumbElements[0].getAttribute("src");
        mainImage.src = firstSrc;

        thumbElements[0].classList.add("active-thumb");
    }

    /** ------------------------------------------
     *  2: Pagination Setup
     * ------------------------------------------ */
    const totalPages = Math.ceil(thumbElements.length / visibleThumbs);

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

    pgSegments.forEach(seg => {
        seg.onclick = () => goToPage(parseInt(seg.dataset.page));
    });

    if (prevBtn) {
        prevBtn.onclick = () => {
            let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
            if (currentPage > 0) goToPage(currentPage - 1);
        };
    }

    if (nextBtn) {
        nextBtn.onclick = () => {
            let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
            if (currentPage < totalPages - 1) goToPage(currentPage + 1);
        };
    }

    /** ------------------------------------------
     *  3: On Thumbnail Click → update main + active
     * ------------------------------------------ */
    window.thumbClicked = function (src) {
        mainImage.src = src;

        // Remove previous active thumb
        thumbElements.forEach(t => t.classList.remove("active-thumb"));

        // Add active class to clicked thumb
        const clickedThumb = [...thumbElements].find(t => t.src === src);
        if (clickedThumb) clickedThumb.classList.add("active-thumb");
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


// ============= animate card =========================


// document.addEventListener("DOMContentLoaded", function () {
//     const cards = document.querySelectorAll(".animate-card");

//     const observer = new IntersectionObserver((entries, observer) => {
//         entries.forEach((entry, index) => {
//             if (entry.isIntersecting) {
//                 const card = entry.target;

//                 const delay = Array.from(cards).indexOf(card) * 300;
//                 card.style.setProperty('--delay', `${delay}ms`);

//                 setTimeout(() => {
//                     card.classList.add("show");
//                 }, delay);

//                 observer.unobserve(card);
//             }
//         });
//     }, {
//         threshold: 0.2
//     });

//     cards.forEach(card => observer.observe(card));
// });

document.addEventListener("DOMContentLoaded", function () {

    const cards = document.querySelectorAll(".animate-card");

    const observer = new IntersectionObserver((entries, observer) => {

        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            const card = entry.target;

            // Find parent row
            const row = card.closest('.row');
            if (!row) return;

            // Cards only inside this row
            const rowCards = row.querySelectorAll('.animate-card');

            // Index inside its own row
            const index = Array.from(rowCards).indexOf(card);

            // Row-wise delay (reset)
            const delay = index * 500; // 0, 300, 600...

            card.style.setProperty('--delay', `${delay}ms`);
            card.classList.add('show');

            observer.unobserve(card); // animate once
        });

    }, {
        threshold: 0.25
    });

    cards.forEach(card => observer.observe(card));
});


//  add fade-left & right js

document.addEventListener("DOMContentLoaded", () => {

    const elements = document.querySelectorAll('.fade-left, .fade-right');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, {
        threshold: 0.2
    });

    elements.forEach(el => observer.observe(el));
});


// navbar toggler

document.addEventListener('DOMContentLoaded', function () {

    let closeTimer;

    document.querySelectorAll('.has-mega').forEach(item => {
        const menu = item.querySelector('.mega-menu');
        const toggleBtn = item.querySelector('.mega-toggle'); // mobile toggle button

        const isDesktop = () => window.innerWidth >= 992;

        // Desktop → hover only
        if (isDesktop()) {
            item.addEventListener('mouseenter', () => {
                clearTimeout(closeTimer);
                item.classList.add('show');
            });

            item.addEventListener('mouseleave', () => {
                closeTimer = setTimeout(() => {
                    item.classList.remove('show');
                }, 250);
            });

            menu.addEventListener('mouseenter', () => clearTimeout(closeTimer));
            menu.addEventListener('mouseleave', () => {
                item.classList.remove('show');
            });
        }

        // Mobile / MD → click toggle only
        if (toggleBtn) {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (!isDesktop()) {
                    item.classList.toggle('show');
                }
            });
        }
    });

    // Click outside → close mobile menu
    document.addEventListener('click', (e) => {
        document.querySelectorAll('.has-mega.show').forEach(item => {
            const toggleBtn = item.querySelector('.mega-toggle');
            if (!window.innerWidth >= 992 && toggleBtn && !item.contains(e.target)) {
                item.classList.remove('show');
            }
        });
    });

    // Window resize → remove show on desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 992) {
            document.querySelectorAll('.has-mega.show').forEach(item => {
                item.classList.remove('show');
            });
        }
    });

});



// custom cursor 

const cursor = document.querySelector('.custom-cursor');

document.addEventListener('mousemove', (e) => {
    cursor.style.left = e.clientX + 'px';

    // 👇 Y-axis offset (10–15px best hota hai)
    cursor.style.top = (e.clientY - 6) + 'px';
});

// Hover effect
document.querySelectorAll('a, button, .hover-target').forEach(el => {
    el.addEventListener('mouseenter', () => {
        cursor.classList.add('hover');
    });

    el.addEventListener('mouseleave', () => {
        cursor.classList.remove('hover');
    });
});
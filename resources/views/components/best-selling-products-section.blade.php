<style>
    .category-slider-wrapper {
        max-width: 100%;
        /* overflow: hidden; */
        z-index: 1;
    }

    .category-slider {
        overflow: hidden;
        max-width: 1020px;
        /* 5 items only */
        margin: 0 auto;
        /* center slider */
    }


    .category-slider .row {
        flex-wrap: nowrap;
        transition: transform 0.4s ease;
    }

    /* Prev / Next buttons */
    .cat-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: none;
        background: #005884;
        color: #fff;
        font-size: 8px;
        cursor: pointer;
        z-index: 999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s ease-in-out;
        cursor: pointer;
    }

    .cat-nav:hover {
        background: #004a6f;
    }

    .cat-nav.prev {
        left: 90px;
    }

    .cat-nav.next {
        right: 90px;
    }


    .cat-btn.active {
        background: #005884;
        color: #fff;
    }

    @media(max-width: 768px) {
        .cat-nav.next {
            right: -36px;
        }

        .cat-nav.prev {
            left: -36px;
        }
    }

    @media(max-width: 767px) {
        .cat-nav.next {
            right: -15px;
        }

        .cat-nav.prev {
            left: -15px;
        }

        .category-slider {
            overflow: hidden;
            max-width: 288px !important;
            margin: 0 auto;
        }
    }
</style>

<section class="best-selling-section mt-5 py-3">

    <div class="container">

        <h2 class="section-title mb-4">
            Best <span>Selling</span> Medical Equipment Essentials
        </h2>

        <!-- Search -->
        <div class="search-wrapper mb-4">
            <input type="text" id="bestSearchInput" class="search-input" placeholder="Search the store">
            <button class="search-btn">
                <i class="bi bi-search"></i>
            </button>
        </div>

        <!-- Category Buttons -->
        <div class="category-slider-wrapper position-relative mb-4">

            <!-- PREV -->
            <button class="cat-nav prev">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <!-- SLIDER -->
            <div class="category-slider">
                <div class="row g-2-4 flex-nowrap" id="categorySlider">

                    <!-- ALL -->
                    <div class="col-auto">
                        <button class="cat-btn active" data-slug="all">All</button>
                    </div>

                </div>
            </div>

            <!-- NEXT -->
            <button class="cat-nav next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

    </div>

    <!-- Products -->
    <section class="best-products mt-4">
        <div class="container">
            <div class="row g-4 justify-content-center" id="best-products-container">
                <!-- Products load here -->
            </div>

            <div class="text-center mt-5">
                <button class="all-products-btn">All Products</button>
            </div>
        </div>
    </section>

</section>

{{-- ===================== JS ===================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (window.bestSellingLoaded) return;
        window.bestSellingLoaded = true;

        const API_BASE = document.querySelector('meta[name="api-base"]').content;

        const categorySlider = document.getElementById('categorySlider');
        const productsContainer = document.getElementById('best-products-container');
        const searchInput = document.getElementById('bestSearchInput');

        /* ===============================
            LOAD CATEGORIES FROM API
        =============================== */
        fetch(`${API_BASE}/api/categories`)
            .then(res => res.json())
            .then(res => {
                if (!res.data) return;

                // Populate category buttons from database
                res.data.forEach(cat => {
                    categorySlider.innerHTML += `
                    <div class="col-auto">
                        <button class="cat-btn" data-slug="${cat.slug}">
                            ${cat.name}
                        </button>
                    </div>
                `;
                });
            })
            .catch(() => {
                console.error('Failed to load categories');
            });

        /* ===============================
            LOAD PRODUCTS FROM API
        =============================== */
        function loadProducts(params = {}) {

            productsContainer.innerHTML = `
            <div class="col-12 text-center py-5">
                <div class="spinner-border"></div>
                <p class="mt-2">Loading...</p>
            </div>
        `;

            const query = new URLSearchParams(params).toString();

            // Fetch products from database with filters
            fetch(`${API_BASE}/api/products?${query}`)
                .then(res => res.json())
                .then(res => {
                    renderProducts(res.data);
                })
                .catch(() => {
                    productsContainer.innerHTML = `
                    <div class="col-12 text-center text-danger py-5">
                        Failed to load products
                    </div>
                `;
                });
        }

        /* ===============================
            RENDER PRODUCTS ON UI
        =============================== */
        function renderProducts(products) {

            productsContainer.innerHTML = '';

            if (!products || products.length === 0) {
                productsContainer.innerHTML = `
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No products found.</p>
                </div>`;
                return;
            }

            // Display each product from database
            products.forEach(product => {

                const discountBadge = product.discount_percent > 0 ?
                    `<span class="discount-badge">${product.discount_percent}% OFF</span>` :
                    '';

                const oldPrice = product.price && product.price > 0 ?
                    `<span class="old-price">$${Number(product.price).toLocaleString()}</span>` :
                    '';

                const shortDesc = product.short_description ?
                    product.short_description.substring(0, 180) :
                    '';

                productsContainer.innerHTML += `
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">

                        ${discountBadge}

                        <img src="${product.thumbnail ?? ''}"
                             alt="${product.image_alt ?? ''}"
                             class="product-img img-fluid">

                        <h4 class="product-title">${product.name}</h4>

                        <p class="product-desc">
                            ${shortDesc}
                        </p>

                        <div class="price-box d-flex justify-content-between">
                            ${oldPrice}
                            <span class="new-price">
                                $${Number(product.sale_price).toLocaleString()}
                            </span>
                            <button class="buy-btn" id="productBuyBtn"
                                data-slug="${product.slug ?? ''}">
                                Buy Now
                            </button>
                        </div>

                    </div>
                </div>
            `;
            });
        }

        /* ===============================
            INITIAL LOAD - ALL PRODUCTS
        =============================== */
        loadProducts({
            category: 'all'
        });

        /* ===============================
            CATEGORY FILTER CLICK
        =============================== */
        document.addEventListener('click', function(e) {

            if (!e.target.classList.contains('cat-btn')) return;

            // Update active category button
            document.querySelectorAll('.cat-btn')
                .forEach(btn => btn.classList.remove('active'));

            e.target.classList.add('active');

            // Load products for selected category
            loadProducts({
                category: e.target.dataset.slug,
                search: searchInput.value
            });
        });



        /* ===============================
            BUY NOW BUTTON CLICK (dynamic)
        =============================== */
        document.addEventListener('click', function(e) {

            // Check if clicked element has 'buy-btn' class
            if (e.target.classList.contains('buy-btn')) {
                const slug = e.target.dataset.slug;
                if (!slug) return;

                // Redirect to product detail page
                window.location.href = `${API_BASE}/product/${slug}`;
            }
        });


        /* ===============================
            ALL PRODUCTS BUTTON CLICK
        =============================== */
        document.querySelector('.all-products-btn')
            .addEventListener('click', function() {

                // Redirect to full products page
                window.location.href = `${API_BASE}/products`;
            });


        /* ===============================
            SEARCH FUNCTIONALITY
        =============================== */
        document.querySelector('.search-btn')
            .addEventListener('click', function() {

                const activeCategory =
                    document.querySelector('.cat-btn.active')?.dataset.slug || 'all';

                // Load products with search filter
                loadProducts({
                    category: activeCategory,
                    search: searchInput.value.trim()
                });
            });

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const sliderRow = document.querySelector('.category-slider .row');
        const items = document.querySelectorAll('.category-slider .col-auto');
        const prevBtn = document.querySelector('.cat-nav.prev');
        const nextBtn = document.querySelector('.cat-nav.next');

        let currentIndex = 0;
        let visibleItems = 6;

        function updateVisibleItems() {
            const width = window.innerWidth;
            if (width < 576) visibleItems = 2;
            else if (width < 768) visibleItems = 2;
            else if (width < 992) visibleItems = 3;
            else visibleItems = 6;
        }

        function updateSlider() {
            const itemWidth = items[0].offsetWidth + 24;
            const maxIndex = Math.max(items.length - visibleItems, 0);
            if (currentIndex > maxIndex) currentIndex = maxIndex;
            sliderRow.style.transform = `translateX(-${currentIndex * itemWidth}px)`;

            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;
        }

        nextBtn.addEventListener('click', () => {
            currentIndex++;
            updateSlider();
        });

        prevBtn.addEventListener('click', () => {
            currentIndex--;
            updateSlider();
        });

        window.addEventListener('resize', () => {
            updateVisibleItems();
            updateSlider();
        });

        updateVisibleItems();
        updateSlider();
    });
</script>

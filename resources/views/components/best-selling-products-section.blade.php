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
        <div class="row g-4 justify-content-center mb-4">

            <!-- ALL Button -->
            <div class="col-auto">
                <button class="cat-btn active" data-slug="all">All</button>
            </div>

            @foreach ($categories as $category)
                <div class="col-auto">
                    <button class="cat-btn" data-slug="{{ $category->slug }}">
                        {{ $category->name }}
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Products -->
    <section class="best-products mt-4">
        <div class="container">
            <div class="row g-4 justify-content-center" id="best-products-container">
                @include('partials.best-products', ['products' => $initialProducts])
            </div>

            <div class="text-center mt-5">
                <button class="all-products-btn">All Products</button>
            </div>
        </div>
    </section>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (window.bestSellingInitialized) return;
        window.bestSellingInitialized = true;

        const filterUrl = "{{ route('best.products.filter') }}";
        const container = document.getElementById('best-products-container');
        const searchInput = document.getElementById('bestSearchInput');

        function loadProducts(params = {}) {

            container.innerHTML = `
            <div class="col-12 text-center py-5">
                <div class="spinner-border"></div>
                <p class="mt-2">Loading...</p>
            </div>
        `;

            const query = new URLSearchParams(params).toString();

            fetch(`${filterUrl}?${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    container.innerHTML = data.html;

                    // Remove animation on AJAX load
                    container.querySelectorAll('.animate-card').forEach(card => {
                        card.classList.remove('animate-card');
                    });
                })
                .catch(() => {
                    container.innerHTML = `
                <div class="col-12 text-center text-danger py-5">
                    Failed to load products
                </div>
            `;
                });
        }

        // Category click
        document.querySelectorAll('.cat-btn').forEach(btn => {
            btn.addEventListener('click', function() {

                document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove(
                    'active'));
                this.classList.add('active');

                loadProducts({
                    category: this.dataset.slug,
                    search: searchInput.value
                });
            });
        });

        // Search
        // searchInput.addEventListener('keyup', function() {
        //     const activeCat = document.querySelector('.cat-btn.active').dataset.slug;
        //     loadProducts({
        //         category: activeCat,
        //         search: this.value
        //     });
        // });

        document.querySelector('.search-btn').addEventListener('click', function() {

            const activeCat = document.querySelector('.cat-btn.active')?.dataset.slug || 'all';

            loadProducts({
                category: activeCat,
                search: searchInput.value.trim()
            });
        });

    });
</script>

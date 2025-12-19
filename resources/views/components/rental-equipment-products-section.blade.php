<div class="row pb-3 pt-0 mt-0">
    <h3 class="rental-heading fade-left">Rental <span>Equipment</span> </h3>

    <div class="product-filter-tabs  d-flex justify-content-center flex-wrap gap-2 mt-4">

        @foreach ($staticCategories as $tab)
            <button class="filter-btn {{ $loop->first ? 'active' : 'text-dark' }}" data-filter="{{ $tab['slug'] }}">
                {{ $tab['label'] }}
            </button>
        @endforeach
    </div>
</div>
<section class="rental-section bg-white ">
    <div class="container">
        <div id="rental-products-container" class="row">
            @if (!empty($initialProducts) && $initialProducts->count())
                @include('partials.rental-products', ['products' => $initialProducts])
            @else
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No rental products available.</p>
                </div>
            @endif
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sirf ek baar initialize ho, chahe component 10 baar bhi lage page par
        if (window.rentalTabsInitialized) return;
        window.rentalTabsInitialized = true;

        const filterUrl = "{{ route('rentals.filter') }}";

        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const slug = this.dataset.filter;
                const container = document.getElementById('rental-products-container');

                // Sab buttons se active hatao aur text-dark lagao
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('text-dark'); // inactive tabs black text
                });

                // Current button ko active karo aur text-dark hatao (kyunki active white hai)
                this.classList.add('active');
                this.classList.remove('text-dark');

                // Loading spinner
                container.innerHTML = `
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Loading products...</p>
                </div>`;

                // AJAX call
                fetch(`${filterUrl}?slug=${slug}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network error');
                        return response.json();
                    })
                    .then(data => {
                        container.innerHTML = data.html;
                    })
                    .catch(err => {
                        console.error('Rental filter error:', err);
                        container.innerHTML = `
                    <div class="col-12 text-center py-5 text-danger">
                        <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                        <p>Failed to load products. Please try again.</p>
                    </div>`;
                    });
            });
        });
    });
</script>

<style>
    /* Hover par icon show */
    /* .nav-repair-title:hover i {
        opacity: 1;
        transform: translateX(0);
    } */
    .nav-link {
        position: relative;
        padding-bottom: 6px;
    }

    .nav-link::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 0;
        width: 0;
        height: 3px;
        background-color: #FE0000;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link.active::after {
        width: 60%;
        left: 44%;

    }
</style>
<section class="sticky-to">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-0">
        <div class="container-fluid d-flex align-items-center p-0 position-relative">

            <!-- Logo -->
            <a class="navbar-brand px-3 py-2" href="#">
                <img src="{{ asset('storage/' . setting('site_logo', 'frontend/images/logo.png')) }}" height=""
                    alt="{{ setting('site_name') }}" class="img-fluid nav-logo">
            </a>

            <button class="navbar-toggler me-3" type="button" id="customToggler" aria-controls="mainNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="mainNav">
                <ul
                    class="navbar-nav blue-block d-flex flex-lg-row flex-column align-items-lg-center align-items-start  ">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown  has-mega">
                        <a class="nav-link mega-toggle" href="#">
                            Mr Biomed Service
                            <i class="bi bi-chevron-down dropdown-icon"></i>
                        </a>
                        <div class="mega-menu">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6 class="nav-repair-title">
                                                Repair Services
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                            <h6 class="nav-title">
                                                Biomedical Equipment Repair and Maintenance ›
                                                {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                            </h6>

                                            <ul class="list-unstyled">
                                                <li><a href="#" class="bottomm"> Beds and Surfaces ›</a></li>
                                                <li><a href="#" class="bottomm">Infusion ›</a></li>
                                                <li><a href="#" class="bottomm"> Anesthesia ›</a></li>
                                                <li><a href="#" class="bottomm"> Monitors ›</a></li>



                                            </ul>
                                            <h6 class="nav-title">
                                                Medical Imaging
                                                Repair and Maintenance › {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                            </h6>

                                            <ul class="list-unstyled">
                                                <li><a href="#" class="bottomm"> Beds and Surfaces ›</a></li>
                                                <li><a href="#" class="bottomm">Infusion ›</a></li>
                                                <li><a href="#" class="bottomm"> Anesthesia ›</a></li>
                                                <li><a href="#" class="bottomm"> Monitors ›</a></li>



                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6 class="nav-repair-title">
                                                Surgical Equipment
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                            <h6 class="nav-title">
                                                Surgical Equipment Repair and Maintenance ›
                                                {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                            </h6>

                                            <ul class="list-unstyled">
                                                <li><a href="#" class="bottomm"> Beds and Surfaces ›</a></li>
                                                <li><a href="#" class="bottomm">Infusion ›</a></li>
                                                <li><a href="#" class="bottomm"> Anesthesia ›</a></li>
                                                <li><a href="#" class="bottomm"> Monitors ›</a></li>



                                            </ul>
                                            <h6 class="nav-title">
                                                Surgical Laser and Technology Services ›
                                                {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                            </h6>

                                            <ul class="list-unstyled">
                                                <li><a href="#" class="bottomm"> Beds and Surfaces ›</a></li>
                                                <li><a href="#" class="bottomm">Infusion ›</a></li>
                                                <li><a href="#" class="bottomm"> Anesthesia ›</a></li>
                                                <li><a href="#" class="bottomm"> Monitors ›</a></li>



                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6 class="nav-repair-title">
                                                Medical Equipment
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                            <h6 class="nav-title">
                                                Onsite Medical Equipment Management ›

                                                {{-- <i class="fa-solid fa-angle-right"></i> --}}
                                            </h6>

                                            <ul class="list-unstyled">
                                                <li><a href="#" class="bottomm"> Beds and Surfaces ›</a></li>
                                                <li><a href="#" class="bottomm">Infusion ›</a></li>




                                            </ul>

                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6 class="nav-repair-title">
                                                Retired assets
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                            <div class="nav-div">
                                                <p>Our reputation is based on integrity, honesty, and reliability for
                                                    selling new medical equipment, pre-owned medical equipment, and
                                                    disposition services.</p>
                                                <a href="{{ route('contact-us') }}">
                                                    <button class="nav-mega-btn">Talk To Expert</button>
                                                </a>
                                            </div>

                                            <h6 class="nav-repair-title mt-4">
                                                Consultancy
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>

                                            <ul class="list-unstyled">
                                                <li><a href="#" class="bottomm"> Beds and Surfaces ›</a></li>
                                                <li><a href="#" class="bottomm">Infusion ›</a></li>
                                                <li><a href="#" class="bottomm"> Anesthesia ›</a></li>
                                                <li><a href="#" class="bottomm"> Monitors ›</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown has-mega">
                        <a class="nav-link mega-toggle" href="#">Locations <i
                                class="bi bi-chevron-down dropdown-icon"></i></a>
                        <div class="mega-menu">
                            <div class="container-fluid">
                                <div class="city-grid">
                                    @foreach ($headerCities as $cityKey => $areas)
                                        <div>
                                            {{-- <h6 class="city-repair-title">
                                                {{ $cityLabels[$cityKey] ?? ucfirst(str_replace('-', ' ', $cityKey)) }}
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6> --}}

                                            <h6 class="city-repair-title">
                                                <a href="{{ route('location') }}">
                                                    {{ $cityLabels[$cityKey] ?? ucfirst(str_replace('-', ' ', $cityKey)) }}
                                                </a>
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>

                                            @foreach ($areas as $area)
                                                <p>
                                                    <a href="{{ route('location.detail', $area->slug) }}"
                                                        class="bottomm">{{ $area->area_name ?? $area->city_name }}</a>
                                                </p>
                                            @endforeach
                                            <p class="mt-3"><a href="#" class="bottomm">Nearby
                                                    communities</a>
                                            </p>
                                            <a href="{{ route('contact-us') }}">
                                                <button class="nav-mega-btn mt-3">Talk To Expert</button>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </li>

                    <li class="nav-item dropdown has-mega">
                        <a class="nav-link mega-toggle" href="#">Product Store <i
                                class="bi bi-chevron-down dropdown-icon"></i></a>
                        <div class="mega-menu">
                            <div class="container-fluid nav-product">
                                <div class="row">
                                    @foreach ($headerCategories as $category)
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6 class="city-repair-title">
                                                {{ $category->name }}
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>

                                            @if ($category->products->isNotEmpty())
                                                @foreach ($category->products as $product)
                                                    <p>
                                                        {{ $product->name }}
                                                    </p>
                                                @endforeach
                                            @endif
                                            <p class="mt-3"><a href="#" class="bottomm">Nearby
                                                    communities</a></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rental-services') ? 'active' : '' }}"
                            href="{{ route('rental-services') }}">
                            Rental
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('repair') ? 'active' : '' }}"
                            href="{{ route('repair') }}">
                            Repair
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blogs*') ? 'active' : '' }}"
                            href="{{ route('blogs') }}">
                            Blog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}"
                            href="{{ route('about-us') }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('biomed-services*') ? 'active' : '' }}"
                            href="{{ route('biomed-services') }}">
                            Services
                        </a>
                    </li>


                    <li class="nav-item d-flex flex-column align-items-center ms-lg-4 mt-2 mt-lg-0 ">
                        <div class="d-flex align-items-center gap-2 mb-1 contact-icons-wrapper ">

                            {{-- Email Icon --}}
                            @if (setting('email'))
                                <a href="mailto:{{ setting('email') }}" target="_blank" title="Send us an Email">
                                    <img src="{{ asset('frontend/images/nav-icon-img-1.png') }}" alt="Email"
                                        class="icon-image">
                                </a>
                            @endif

                            {{-- Separator - only show if previous icon exists --}}
                            @if (setting('email') && (setting('phone') || setting('whatsapp')))
                                <span class="separator text-white fw-bold">|</span>
                            @endif

                            {{-- Phone Icon --}}
                            @if (setting('phone'))
                                <a href="tel:{{ cleanPhone(setting('phone')) }}" title="Call Us">
                                    <img src="{{ asset('frontend/images/nav-icon-mg-2.png') }}" alt="Call"
                                        class="icon-image">
                                </a>
                            @endif

                            {{-- Separator - only show if phone exists and whatsapp exists --}}
                            @if (setting('phone') && setting('whatsapp'))
                                <span class="separator text-white fw-bold">|</span>
                            @endif

                            {{-- WhatsApp Icon --}}
                            @if (setting('whatsapp'))
                                <a href="https://wa.me/{{ cleanPhone(setting('whatsapp')) }}" target="_blank"
                                    title="Chat on WhatsApp">
                                    <img src="{{ asset('frontend/images/nav-icon-img-3.png') }}" alt="WhatsApp"
                                        class="icon-image">
                                </a>
                            @endif

                        </div>
                        <a href="{{ route('contact-us') }}" class="btn contact-btn mt-2 px-3 py-1">CONTACT</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
</section>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.getElementById('customToggler');
        const mainNav = document.getElementById('mainNav');
        const isDesktop = () => window.innerWidth >= 992;

        toggler.addEventListener('click', function() {
            if (!isDesktop()) {
                mainNav.classList.toggle('show');
                const isExpanded = mainNav.classList.contains('show');
                toggler.setAttribute('aria-expanded', isExpanded);
            }
        });

        window.addEventListener('resize', function() {
            if (isDesktop() && mainNav.classList.contains('show')) {
                mainNav.classList.remove('show');
                toggler.setAttribute('aria-expanded', false);
            }
        });
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.getElementById('customToggler');
        const mainNav = document.getElementById('mainNav');
        const isDesktop = () => window.innerWidth >= 992;

        // Toggler click → open/close menu
        toggler.addEventListener('click', function(e) {
            if (!isDesktop()) {
                mainNav.classList.toggle('show');
                const isExpanded = mainNav.classList.contains('show');
                toggler.setAttribute('aria-expanded', isExpanded);
            }
        });

        // Window resize → close menu on desktop
        window.addEventListener('resize', function() {
            if (isDesktop() && mainNav.classList.contains('show')) {
                mainNav.classList.remove('show');
                toggler.setAttribute('aria-expanded', false);
            }
        });

        // Click outside → close menu
        document.addEventListener('click', function(e) {
            if (!isDesktop() && mainNav.classList.contains('show')) {
                // agar click nav ya toggler ke bahar hai
                if (!mainNav.contains(e.target) && !toggler.contains(e.target)) {
                    mainNav.classList.remove('show');
                    toggler.setAttribute('aria-expanded', false);
                }
            }
        });
    });
</script>

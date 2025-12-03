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

                    <li class="nav-item dropdown ">
                        <a class="nav-link" href="#">Mr Biomed Service <i
                                class="bi bi-chevron-down dropdown-icon"></i></a>
                        <div class="mega-menu">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6>Category 1</h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#">Service 1</a></li>
                                                <li><a href="#">Service 2</a></li>
                                                <li><a href="#">Service 3</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6>Category 2</h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#">Service 4</a></li>
                                                <li><a href="#">Service 5</a></li>
                                                <li><a href="#">Service 6</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6>Category 3</h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#">Service 7</a></li>
                                                <li><a href="#">Service 8</a></li>
                                                <li><a href="#">Service 9</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-6 mb-3">
                                            <h6>Category 4</h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#">Service 10</a></li>
                                                <li><a href="#">Service 11</a></li>
                                                <li><a href="#">Service 12</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link" href="#">Locations <i
                                class="bi bi-chevron-down dropdown-icon"></i></a>
                        <div class="mega-menu">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>City 1</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Branch 1</a></li>
                                            <li><a href="#">Branch 2</a></li>
                                            <li><a href="#">Branch 3</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>City 2</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Branch 4</a></li>
                                            <li><a href="#">Branch 5</a></li>
                                            <li><a href="#">Branch 6</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>City 3</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Branch 7</a></li>
                                            <li><a href="#">Branch 8</a></li>
                                            <li><a href="#">Branch 9</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>City 4</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Branch 10</a></li>
                                            <li><a href="#">Branch 11</a></li>
                                            <li><a href="#">Branch 12</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link" href="#">Product Store <i
                                class="bi bi-chevron-down dropdown-icon"></i></a>
                        <div class="mega-menu">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>Category 1</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Product 1</a></li>
                                            <li><a href="#">Product 2</a></li>
                                            <li><a href="#">Product 3</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>Category 2</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Product 4</a></li>
                                            <li><a href="#">Product 5</a></li>
                                            <li><a href="#">Product 6</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>Category 3</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Product 7</a></li>
                                            <li><a href="#">Product 8</a></li>
                                            <li><a href="#">Product 9</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <h6>Category 4</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Product 10</a></li>
                                            <li><a href="#">Product 11</a></li>
                                            <li><a href="#">Product 12</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Rental</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>

                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>

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
                                <a href="https://wa.me/{{ cleanPhone(setting('whatsapp')) }}"
                                    target="_blank" title="Chat on WhatsApp">
                                    <img src="{{ asset('frontend/images/nav-icon-img-3.png') }}" alt="WhatsApp"
                                        class="icon-image">
                                </a>
                            @endif

                        </div>
                        <a href="#" class="btn contact-btn mt-2 px-3 py-1">CONTACT</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.getElementById('customToggler');
        const mainNav = document.getElementById('mainNav');
        const isDesktop = () => window.innerWidth >= 992;

        // Event listener on the Toggler button
        toggler.addEventListener('click', function() {
            if (!isDesktop()) {
                mainNav.classList.toggle('show');
                const isExpanded = mainNav.classList.contains('show');
                toggler.setAttribute('aria-expanded', isExpanded);
            }
        });

        // Desktop resize check:
        window.addEventListener('resize', function() {
            if (isDesktop() && mainNav.classList.contains('show')) {
                mainNav.classList.remove('show');
                toggler.setAttribute('aria-expanded', false);
            }
        });
    });
</script>

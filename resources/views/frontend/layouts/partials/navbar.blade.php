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

    /* ===== FORCE STICKY HEADER ===== */

    .site-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 10000;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 0 10px #000000;
    }

    @media(max-width:767px) {
        .site-header {
            box-shadow: 0 0 10px #000000;
        }
    }

    .site-header.hide-header {
        transform: translateY(-100%);
    }

    .site-header.show-header {
        transform: translateY(0);
    }

    /* Mobile: Remove fixed when navbar is open */







    /* .mega-menu {
        position: fixed;
        top: 119px;
        left: 50%;
        transform: translateX(-50%);
        width: 85vw;
        z-index: 99999;
    } */

    /* Dropdown toggle icon styling */
    .has-mega {
        position: relative;
    }

    .mega-toggle {
        cursor: pointer;
        /* padding: 0.3rem; */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
        margin-left: -10px;

    }

    .has-mega.show .mega-toggle i {
        transform: rotate(180deg);
    }

    /* Desktop: icon inline with link */
    @media (min-width: 992px) {
        .nav-main-link {
            display: inline;
        }

        .mega-toggle {
            display: inline-flex;
            padding: 0 0.25rem;
        }
    }

    .nav-main-link {
        display: inline-block;
        /* required for transform */
        transition: transform 0.4s ease-in-out;
        will-change: transform;
    }

    .nav-main-link:hover {
        transform: scale(1.04);
    }


    /* Mobile/Tablet: icon on the right */
    @media (max-width: 991px) {
        .has-mega {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            position: relative;
            gap: 5px;
        }

        .nav-main-link {
            flex: 0 0 auto;
            padding-right: 0;
        }

        .mega-toggle {
            padding: 0.5rem 0.5rem 0.5rem 0;
            margin-left: 0;
            flex-shrink: 0;
        }

        .mega-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            width: 100%;
            transform: none;
            margin-top: 5px;
        }

        .navbar-collapse {
            position: relative;
        }

        .navbar-nav {
            position: relative;
        }
    }

    /* Logo */
    .nav-gif-icon {
        width: 90px;

        height: 90px;
    }

    /* Common button style */
    .request-btn {
        background-color: #D43838;
        width: 136px;
        height: 21px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;
        box-shadow: 0px 4px 4px 0px #00000040;

        color: #ffffff;
        font-size: 13px;
        font-weight: 500;
        font-family: Inter;
        line-height: 100%;
        letter-spacing: 1%;
        text-decoration: none;

        padding: 0;
    }

    /* Hover effect (optional but clean) */
    .request-btn:hover {
        background-color: #bb2f2f;
        color: #fff;
    }

    /* cnange css */
</style>
<header class="site-header " id="siteHeader">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-0 ">
        <div class="container-fluid d-flex align-items-center p-0 position-relative">

            <!-- Logo -->
            <a class="navbar-brand  " href="{{ route('home') }}">
                <img src="{{ asset('storage/' . setting('site_logo', 'frontend/images/logo.png')) }}" height=""
                    alt="{{ setting('site_name') }}" class="img-fluid nav-logo">
            </a>

            <button class="navbar-toggler me-" type="button" id="customToggler" aria-controls="mainNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>




        </div>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav blue-block d-flex flex-lg-row flex-column align-items-lg-center align-items-start  ">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item dropdown  has-mega">
                    {{-- <a class="nav-link nav-main-link {{ request()->routeIs('biomed-services*') ? 'active' : '' }}"
                        href="{{ route('biomed-services') }}">
                        Services We Offer
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </a> --}}

                    <a class="nav-link nav-main-link {{ request()->routeIs('biomed-services*') ? 'active' : '' }}"
                        href="{{ route('biomed-services') }}">
                        Biomed Services
                    </a>
                    <span class="mega-toggle">
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </span>
                    <div class="mega-menu">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        {{-- <a href="{{ route('repair') }}">
                                            <h6 class="nav-repair-title">
                                                Repair Services
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                        </a> --}}
                                        <div class="d-flex flex-column gap-2 ">
                                            <h6 class="nav-title">
                                                <a href=""> Inspection, Calibration, & Repair ›</a>
                                            </h6>
                                            <h6 class="nav-title">
                                                <a href="">Dis-positioning Service ›</a>
                                            </h6>
                                        </div>

                                        {{-- <ul class="list-unstyled">
                                            <li><a href="{{ url('repairing-services/houston') }}"
                                                    class="bottomm">Rowlett ›</a></li>
                                            <li><a href="{{ url('repairing-services/dallas') }}" class="bottomm">Sachse
                                                    ›</a></li>
                                            <li><a href="{{ url('repairing-services/austin') }}"
                                                    class="bottomm">Mesquite ›</a></li>
                                            <li><a href="{{ url('repairing-services/garland') }}" class="bottomm">Wylie
                                                    ›</a></li>



                                        </ul> --}}

                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        {{-- <a href="{{ url('repairing-services/texas-medical-equipment') }}">
                                            <h6 class="nav-repair-title">
                                                Surgical Equipment
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                        </a> --}}
                                        <div class="d-flex flex-column gap-2 ">
                                            <h6 class="nav-title">
                                                <a href="">New & Pre-Owned Medical Equipment Sales ›</a>
                                            </h6>
                                            <h6 class="nav-title">
                                                <a href="">CLaser & Surgical Technology Services Across Texas
                                                    ›</a>
                                            </h6>
                                        </div>

                                        {{-- <ul class="list-unstyled">
                                            <li><a href="{{ url('repairing-services/texas-medical-equipment') }}"
                                                    class="bottomm">X-Ray Repair in Texas ›</a></li>
                                            <li><a href="{{ url('x-ray-repairing/x-ray-in-dallas') }}"
                                                    class="bottomm">X-Ray Repair in Dallas ›</a></li>
                                            <li><a href="{{ url('x-ray-repairing/x-ray-in-houston') }}"
                                                    class="bottomm">X-Ray Repair in Houston ›</a></li>
                                            <li><a href="{{ url('x-ray-repairing/x-ray-in-san-antonio') }}"
                                                    class="bottomm">X-Ray Repair in San-Antonio ›</a></li>



                                        </ul> --}}

                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        {{-- <a href="{{ url('medical-equipment') }}">
                                            <h6 class="nav-repair-title">
                                                Medical Equipment
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6>
                                        </a> --}}
                                        <div class="d-flex flex-column gap-2 ">
                                            <h6 class="nav-title">
                                                <a href="">Medical Equipment Rental ›</a>

                                            </h6>

                                            <h6 class="nav-title">
                                                <a href="">Consultancy Services ›</a>

                                            </h6>
                                        </div>

                                        {{-- <ul class="list-unstyled">
                                            <li><a href="{{ route('rental-services') }}" class="bottomm"> Rental
                                                    Products ›</a></li>
                                            <li><a href="{{ url('c-arm-repairing/repairing-in-texas') }}"
                                                    class="bottomm">C-Arm Repair in Texas ›</a></li>
                                            <li><a href="{{ url('c-arm-repairing/c-arm-in-dallas') }}"
                                                    class="bottomm">C-Arm Repair in Dallas ›</a></li>
                                            <li><a href="{{ url('c-arm-repairing/c-arm-in-houston') }}"
                                                    class="bottomm">C-Arm Repair in Houston ›</a></li>
                                            <li><a href="{{ url('c-arm-repairing/c-arm-in-san-antonio') }}"
                                                    class="bottomm">C-Arm Repair in San-Antonio ›</a></li>
                                        </ul> --}}

                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">

                                        <div class="nav-div">
                                            <p>We also provide domestic and international wholesale medical equipment,
                                                along with professional packing and shipping services.</p>
                                            <a href="{{ route('contact-us') }}">
                                                <button class="nav-mega-btn">Talk To Expert</button>
                                            </a>
                                        </div>

                                        {{-- <div class="nav-div">
                                            <a href="{{ route('contact-us') }}">
                                                <button class="nav-mega-btn">Talk To Expert</button>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>





                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rental-services') ? 'active' : '' }}"
                        href="{{ route('rental-services') }}">
                        Sales
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rental-services') ? 'active' : '' }}"
                        href="{{ route('rental-services') }}">
                        Rental
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rental-services') ? 'active' : '' }}"
                        href="{{ route('rental-services') }}">
                        Dispositioning
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rental-services') ? 'active' : '' }}"
                        href="{{ route('rental-services') }}">
                        Home Health
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('rental-services') ? 'active' : '' }}"
                        href="{{ route('rental-services') }}">
                        Consultancy
                    </a>
                </li>



                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('repair') ? 'active' : '' }}"
                        href="{{ route('repair') }}">
                        Repair
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blogs*') ? 'active' : '' }}"
                        href="{{ route('blogs') }}">
                        Blog
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}"
                        href="{{ route('about-us') }}">
                        About
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faqs') ? 'active' : '' }}" href="{{ route('faqs') }}">
                        FAQs
                    </a>
                </li> --}}


                <li class="nav-item dropdown has-mega">
                    <a class="nav-link nav-main-link {{ request()->routeIs('location') ? 'active' : '' }}"
                        href="{{ route('location') }}">Facilities</a>
                    <span class="mega-toggle">
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </span>
                    <div class="mega-menu">
                        <div class="container-fluid">
                            <div class="city-grid">
                                {{-- @foreach ($headerCities as $cityKey => $areas) --}}
                                <div class="d-flex flex-column">
                                    {{-- <h6 class="city-repair-title">
                                                {{ $cityLabels[$cityKey] ?? ucfirst(str_replace('-', ' ', $cityKey)) }}
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6> --}}

                                    {{-- <h6 class="city-repair-title">
                                            <a href="{{ route('location') }}">
                                                {{ $cityLabels[$cityKey] ?? ucfirst(str_replace('-', ' ', $cityKey)) }}
                                            </a>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </h6> --}}

                                    {{-- @foreach ($areas as $area)
                                            <p>
                                                <a href="{{ route('location.detail', $area->slug) }}"
                                                    class="bottomm">{{ $area->area_name ?? $area->city_name }}</a>
                                            </p>
                                        @endforeach --}}
                                    {{-- <p class="mt-3"><a href="#" class="bottomm">Nearby
                                                communities</a>
                                        </p>
                                        <a href="{{ route('contact-us') }}">
                                            <button class="nav-mega-btn mt-3">Talk To Expert</button>
                                        </a> --}}

                                    <h6 class="nav-title">
                                        <a href="">Complete Hospital Management ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">HOME HEALTH ›</a>

                                    </h6>
                                </div>
                                {{-- @endforeach --}}

                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">CARDIAC CLINICS ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">PODIATRY ›</a>

                                    </h6>
                                </div>

                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">DENTAL HOSPITALS ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">PAIN MANAGEMENT ›</a>

                                    </h6>
                                </div>
                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">FREE STANDING ERS ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">PRIMARY HEALTHCARE ›</a>

                                    </h6>
                                </div>

                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">Hospital Management SUPPORT ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">SURGERY CENTERS ›</a>

                                    </h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>


                <li class="nav-item dropdown has-mega">
                    <a class="nav-link nav-main-link {{ request()->routeIs('location') ? 'active' : '' }}"
                        href="{{ route('location') }}">About</a>
                    <span class="mega-toggle">
                        <i class="bi bi-chevron-down dropdown-icon"></i>
                    </span>
                    <div class="mega-menu">
                        <div class="container-fluid">
                            <div class="city-grid">
                                {{-- @foreach ($headerCities as $cityKey => $areas) --}}
                                <div class="d-flex flex-column">
                                    {{-- <h6 class="city-repair-title">
                                                {{ $cityLabels[$cityKey] ?? ucfirst(str_replace('-', ' ', $cityKey)) }}
                                                <i class="fa-solid fa-angle-right"></i>
                                            </h6> --}}

                                    {{-- <h6 class="city-repair-title">
                                            <a href="{{ route('location') }}">
                                                {{ $cityLabels[$cityKey] ?? ucfirst(str_replace('-', ' ', $cityKey)) }}
                                            </a>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </h6> --}}

                                    {{-- @foreach ($areas as $area)
                                            <p>
                                                <a href="{{ route('location.detail', $area->slug) }}"
                                                    class="bottomm">{{ $area->area_name ?? $area->city_name }}</a>
                                            </p>
                                        @endforeach --}}
                                    {{-- <p class="mt-3"><a href="#" class="bottomm">Nearby
                                                communities</a>
                                        </p>
                                        <a href="{{ route('contact-us') }}">
                                            <button class="nav-mega-btn mt-3">Talk To Expert</button>
                                        </a> --}}

                                    <h6 class="nav-title">
                                        <a href="">LOCATIONS ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">TERMS & CONDITIONS ›</a>

                                    </h6>
                                </div>
                                {{-- @endforeach --}}

                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">BLOGS ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">PRIVACY POLICY ›</a>

                                    </h6>
                                </div>

                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">FAQS ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">DISCLAIMER ›</a>

                                    </h6>
                                </div>
                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">FEEDBACK ›</a>

                                    </h6>
                                    <h6 class="nav-title">
                                        <a href="">ADDRESS & LOCATION ›</a>

                                    </h6>
                                </div>

                                <div class="d-flex flex-column">




                                    <h6 class="nav-title">
                                        <a href="">CONTACT US ›</a>

                                    </h6>
                                    {{-- <h6 class="nav-title">
                                        <a href="">SURGERY CENTERS ›</a>

                                    </h6> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </li>

                <li class="nav-item ms-auto d-flex  align-items-center mt-2 mt-lg-0">

                    <!-- Logo -->
                    <img src="{{ asset('frontend/images/emergency-1.gif') }}" alt="Logo"
                        class="nav-gif-icon mb-2">

                    <div class="d-flex flex-column gap-3">
                        <!-- Request a Quote -->
                        <a href="{{ route('contact-us') }}" class="btn request-btn mb-1">
                            Request a Quote
                        </a>

                        <!-- Request a Services -->
                        <a href="{{ route('contact-us') }}" class="btn request-btn">
                            Request a Services
                        </a>
                    </div>

                </li>

                {{-- <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        @endguest

                        @auth
                           
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                    id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->name ?? auth()->user()->email }}

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userMenu">
                                    @if (auth()->user()->hasRole('administrator'))
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </li> --}}

            </ul>
        </div>
    </nav>
</header>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('siteHeader');
        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // small scroll ignore
            if (Math.abs(scrollTop - lastScrollTop) < 10) return;

            if (scrollTop > lastScrollTop && scrollTop > 150) {
                // SCROLL DOWN → hide
                header.classList.add('hide-header');
                header.classList.remove('show-header');
            } else {
                // SCROLL UP → show
                header.classList.remove('hide-header');
                header.classList.add('show-header');
            }

            lastScrollTop = scrollTop;
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggler = document.getElementById('customToggler');
        const mainNav = document.getElementById('mainNav');
        const isDesktop = () => window.innerWidth >= 992;

        toggler.addEventListener('click', function(e) {
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

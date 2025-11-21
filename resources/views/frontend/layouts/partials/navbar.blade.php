<section class="sticky-to">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-0">
        <div class="container-fluid d-flex align-items-center p-0">

            <!-- Logo -->
            <a class="navbar-brand px-3 py-2" href="#">
                <img src="{{ asset('frontend/images/logo.png') }}" height="" alt="logo" class="img-fluid nav-logo">
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <button class="navbar-toggler me-3" type="button" aria-controls="mainNav" aria-expanded="false"
                aria-label="Toggle navigation" id="navToggle">
                <span class="navbar-toggler-icon"></span>
            </button> --}}



            <!-- Blue block -->
            <div class="collapse navbar-collapse" id="mainNav">
                <div class="blue-block">

                    <ul
                        class="navbar-nav blue-block d-flex flex-lg-row flex-column align-items-lg-center align-items-start  w-100">

                        <!-- Normal Links -->
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>

                        <!-- Mr Biomed Service -->
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

                        <!-- Locations -->
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

                        <!-- Product Store -->
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

                        <!-- Other Links -->
                        <li class="nav-item"><a class="nav-link" href="#">Rental</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Services</a></li>

                        <!-- Icons + Contact Button -->
                        {{-- <li class="nav-item d-flex flex-column align-items-center ms-lg-4 mt-2 mt-lg-0">
                            <div class="d-flex gap-3 mb-1">
                                <a href="#"><i class="bi bi-chat-dots-fill icon-style"></i></a>
                                <a href="#"><i class="bi bi-telephone-fill icon-style"></i></a>
                                <a href="#"><i class="bi bi-whatsapp icon-style"></i></a>
                            </div>
                            <a href="#" class="btn contact-btn mt-2 px-3 py-1">Contact</a>
                        </li> --}}
                        <li class="nav-item d-flex flex-column align-items-center ms-lg-4 mt-2 mt-lg-0">
                            <div class="d-flex align-items-center gap-2 mb-1 contact-icons-wrapper">

                                <a href="#">
                                    <img src="{{ asset('frontend/images/nav-icon-img-1.png') }}" alt="Chat"
                                        class="icon-image">
                                </a>

                                <span class="separator">|</span>

                                <a href="#">
                                    <img src="{{ asset('frontend/images/nav-icon-mg-2.png') }}" alt="Call"
                                        class="icon-image">
                                </a>

                                <span class="separator">|</span>

                                <a href="#">
                                    <img src="{{ asset('frontend/images/nav-icon-img-3.png') }}" alt="WhatsApp"
                                        class="icon-image">
                                </a>

                            </div>
                            <a href="#" class="btn contact-btn mt-2 px-3 py-1">CONTACT</a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </nav>
</section>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}

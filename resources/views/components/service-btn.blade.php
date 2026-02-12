<style>
    /* .services-btn {
        opacity: 0;
        visibility: hidden;
        transform: translateX(20px);
        transition: 0.3s ease;
    }

    .services-wrapper.show-btn .services-btn {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
    } */

    /* Panel hidden by default */
    .services-panel {
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: 0.3s ease;
    }

    /* Panel show */
    .services-panel.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
</style>

<div class="services-wrapper">

    <!-- SLIDE PANEL -->
    <div class="services-panel">
        <h4>Choose Your Rental Services</h4>

        @foreach (getServicesList() as $service)
            <p class="mb-1">
                <a href="{{ route('biomed-services') }}" class="text-decoration-none">
                    {{ $service }}
                </a>
            </p>
        @endforeach

        <a href="{{ route('biomed-services') }}">
            <button type="button" class="explore-btn">
                Explore More
            </button>
        </a>

    </div>

    <!-- BUTTON + ICON GROUP -->
    <div class="services-toggle">

        <button class="services-btn">Services</button>

        <div class="arrow-icon">
            <img src="{{ asset('frontend/images/icon-img.png') }}" alt="">

        </div>

    </div>
</div>

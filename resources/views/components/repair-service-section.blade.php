<style>
    .xraySwiper {
        width: 100%;
        overflow: hidden;
    }

    .xraySwiper .swiper-slide {
        width: auto;
        height: auto;
    }

    /* .xray-card {
        width: 100%;
        min-height: 100%;
    } */
</style>
@foreach ($sections as $section)
    @if (
        $section['items']->isNotEmpty() ||
            filled($section['shortDescription']) ||
            filled($section['headingData']['first_text'] ?? ''))
        <section class="xray-section py-5">
            <div class="container-fluid xray-box p-4 mt-5">
                <div class="container text-center mb-5">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h2 class="main-heading fade-left">
                                {{ $section['headingData']['first_text'] ?? '' }}
                                <span>{{ $section['headingData']['second_text'] ?? '' }}</span>
                            </h2>
                            <p class="xray-desc fade-right">
                                {{ $section['shortDescription'] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    {{-- <div class="row g-4 justify-content-center">
                        @foreach ($section['items'] as $item)
                            <div class="col-lg-3 col-md-6 animate-card">
                                <div class="xray-card p-3">
                                    <h3 class="xray-title reveal-lines">
                                        {{ plainBracketText($item->title) ?? '' }}
                                    </h3>

                                    <p class="xray-desc ">
                                        {{ \Illuminate\Support\Str::limit($item->short_description ?? '', 150) }}
                                    </p>

                                    @php
                                        $routeMap = [
                                            'repairing-services' => 'repair.service.repairing',
                                            'x-ray-repairing' => 'repair.service.xray',
                                            'c-arm-repairing' => 'repair.service.carm',
                                        ];
                                        $routeName = $routeMap[$section['urlSegment']] ?? 'repair.service.detail';
                                    @endphp
                                    <a href="{{ route($routeName, ['slug' => $item->slug]) }}"
                                        class="xray-btn ">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div> --}}
                    <div class="swiper xraySwiper">
                        <div class="swiper-wrapper">

                            @foreach ($section['items'] as $item)
                                <div class="swiper-slide">
                                    <div class="xray-card p-3 h-100">
                                        <h3 class="xray-title reveal-lines">
                                            {{ plainBracketText($item->title) ?? '' }}
                                        </h3>

                                        <p class="xray-desc">
                                            {{ \Illuminate\Support\Str::limit($item->short_description ?? '', 150) }}
                                        </p>

                                        @php
                                            $routeMap = [
                                                'repairing-services' => 'repair.service.repairing',
                                                'x-ray-repairing' => 'repair.service.xray',
                                                'c-arm-repairing' => 'repair.service.carm',
                                            ];
                                            $routeName = $routeMap[$section['urlSegment']] ?? 'repair.service.detail';
                                        @endphp

                                        <a href="{{ route($routeName, ['slug' => $item->slug]) }}" class="xrayy-btn">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
@endforeach


<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".xraySwiper", {
            slidesPerView: 4,
            spaceBetween: 24,
            loop: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            grabCursor: true,
            touchStartPreventDefault: false,

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1200: {
                    slidesPerView: 4,
                }
            }
        });
    });
</script>

<style>
    .blogSwiper {
        padding: 10px 0;
    }

    .swiper-slide {
        height: auto;
    }

    /* continuous smooth linear movement */
    .blogSwiper .swiper-wrapper {
        transition-timing-function: linear !important;
    }

    /* card animation when entering */
    .swiper-slide {
        /* opacity: 0.6; */
        /* transform: scale(0.9); */
        transition: all 0.6s ease;
    }

    .swiper-slide.card-animate {
        opacity: 1;
        /* transform: scale(1); */
    }

    /* hover premium effect */
    /* .news-card {
        border-radius: 15px;
        transition: all 0.4s ease;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    } */
</style>

@if (isset($blogs) && $blogs->count() > 0)
    <section class="recent-news-section py- mb-5">
        <div class="container text-center">
            <h2 class="section-title text-white mb-3">Recent News</h2>
            <p class="section-desc  mb-5">
                Stay informed with the latest updates, innovations, and industry insights in biomedical equipment and
                healthcare technology.
            </p>
        </div>
        <div class="container">
            <div class="swiper blogSwiper">
                <div class="swiper-wrapper">

                    @foreach ($blogs as $item)
                        <div class="swiper-slide">
                            <div class="news-card bg-white">
                                <img src="{{ $item->image ? asset('storage/blog/images/' . $item->image) : '' }}"
                                    class="img-fluid w-100" alt="{{ $item->image_alt_text ?? '' }}">

                                <div class="p-3">
                                    <h5 class="news-title fw-bold mt-2 mb-2">
                                        {{ \Illuminate\Support\Str::limit($item->title ?? '', 50) }}
                                    </h5>

                                    <p class="news-desc small text-muted mb-3">
                                        {{ \Illuminate\Support\Str::limit($item->short_description ?? '', 120) }}
                                    </p>

                                    <a href="{{ route('blog.detail', $item->slug) }}"
                                        class="read-more-link d-flex align-items-center text-decoration-none">
                                        Read More <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </section>
@endif


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const swiper = new Swiper(".blogSwiper", {
            slidesPerView: 4,
            spaceBetween: 24,
            loop: true,
            speed: 6000, // 🔥 high speed for smooth effect
            freeMode: true,
            allowTouchMove: true,
            grabCursor: true,

            autoplay: {
                delay: 0, // important for continuous
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                }
            },

            on: {
                slideChangeTransitionStart: function() {
                    document.querySelectorAll('.swiper-slide').forEach(slide => {
                        slide.classList.remove('card-animate');
                    });
                },
                slideChangeTransitionEnd: function() {
                    const activeSlides = document.querySelectorAll('.swiper-slide-visible');
                    activeSlides.forEach(slide => {
                        slide.classList.add('card-animate');
                    });
                }
            }
        });

    });
</script>

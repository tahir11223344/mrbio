<style>
    .main-wrapper {
        margin-bottom: 60px;
    }

    .review-hr {
        width: 100%;
        margin: 0 auto;
        height: 3px;
        background-color: #056EA0 !important;
        border: none !important;
        opacity: 1 !important;
    }
</style>
<section>
    <h2 class="review-heading fade-left">Our Users Are <span>Happy And Healthy</span></h2>

    <div class="container">

        <div class="mx-auto main-wrapper" style="width:1100px;">

            <div class="swiper reviewSwiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ $testimonial->image ? asset('storage/testimonials/' . $testimonial->image) : '' }}"
                                alt="">
                            <div class="tooltip-box">
                                <div class="starss">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $testimonial->rating ? 'active' : '' }}"></i>
                                    @endfor
                                </div>

                                <p><span class="quote">“</span> {{ $testimonial->short_description ?? '' }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="d-flex gap-5 mx-auto justify-content-center mt-4">
                <p>Share your feedback with us and receive a promotional code worth 50,000 as our token of appreciation.
                </p>
                <button class="nav-mega-btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#talkToExpertModal">
                    Leave a Review
                </button>
            </div>
            <hr class="review-hr">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="talkToExpertModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Enter phone number" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="3" placeholder="Write your message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning w-100">
                            Submit
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

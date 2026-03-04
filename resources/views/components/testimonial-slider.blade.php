<style>
    /* .main-wrapper {
        margin-bottom: 60px;
    } */

    .review-hr {
        width: 90%;
        margin: 20px auto;
        height: 3px;
        background-color: #056EA0 !important;
        border: none !important;
        opacity: 1 !important;
    }

    @media (max-width: 991px) {
        .review-hr {
            width: 100%;
        }

        .promo-desc {
            font-size: 14px;
            text-align: center
        }
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


        </div>
        <div class="d-flex gap-2 mx-auto flex-wrap justify-content-center mb-2">
            <p class="promo-desc">Share your feedback with us and receive a promotional code worth 50,000 as our token
                of appreciation.
            </p>
            <button class="nav-mega-btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#talkToExpertModal">
                Leave a Review
            </button>
        </div>
        <hr class="review-hr">
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
                    <form id="review_modal_form" action="{{ route('post.feedback') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select" required>
                                <option value="">Select Category</option>
                                @php
                                    $allCategories = \App\Models\Category::where('status', 1)->pluck('name', 'slug')->toArray();
                                @endphp
                                @foreach ($allCategories as $slug => $name)
                                    <option value="{{ $slug }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text category_error"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Write your comment" required></textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>

                        {{-- ⭐ Rating --}}
                        <div class="mb-3">
                            <label class="form-label">Give The Rate!</label>
                            <div class="rate-stars-modal">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star star-modal" data-value="{{ $i }}" style="color: #CACDD8; font-size: 30px; cursor: pointer;"></i>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating_modal">
                            <span class="text-danger error-text rating_error"></span>
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

@push('frontend-scripts')
<script>
$(document).ready(function() {
    
    // ⭐ STAR CLICK LOGIC FOR MODAL
    $('.rate-stars-modal .star-modal').on('click', function() {
        let rating = $(this).data('value');
        $('#rating_modal').val(rating);

        $('.rate-stars-modal .star-modal').css('color', '#CACDD8');
        $('.rate-stars-modal .star-modal').each(function() {
            if ($(this).data('value') <= rating) {
                $(this).css('color', '#f5b301');
            }
        });
    });

    // 🚀 AJAX SUBMIT FOR MODAL
    $('#review_modal_form').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let actionUrl = form.attr('action');

        $('.error-text').text('');

        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: form.serialize(),
            dataType: 'json',

            success: function(response) {
                if (response.success) {
                    // Close modal first
                    $('#talkToExpertModal').modal('hide');
                    
                    // Wait for modal to fully close before showing alert
                    setTimeout(function() {
                        // Reset form
                        form[0].reset();
                        $('#rating_modal').val('');
                        $('.rate-stars-modal .star-modal').css('color', '#CACDD8');

                        // Show success message with auto-close
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                text: response.message || "Thank you for your feedback!",
                                icon: "success",
                                buttonsStyling: false,
                                showConfirmButton: true,
                                showCancelButton: true,
                                confirmButtonText: "Ok, got it!",
                                cancelButtonText: "Close",
                                timer: 2000,
                                timerProgressBar: false,
                                backdrop: true,
                                allowOutsideClick: true,
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-secondary"
                                },
                                didOpen: () => {
                                    // Ensure no modal backdrop remains
                                    $('.modal-backdrop').remove();
                                    $('body').removeClass('modal-open').css('overflow', '');
                                    $('body').css('padding-right', '');
                                },
                                didClose: () => {
                                    // Complete cleanup
                                    $('.swal2-container').remove();
                                    $('.swal2-backdrop-show').remove();
                                    $('body').removeClass('swal2-shown swal2-height-auto');
                                    $('html').removeClass('swal2-shown swal2-height-auto');
                                    $('body').css('overflow', '');
                                    $('body').css('padding-right', '');
                                }
                            });
                        } else if (typeof toastr !== 'undefined') {
                            toastr.success(response.message);
                        } else {
                            alert(response.message);
                        }
                    }, 300);
                }
            },

            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error('Something went wrong. Please try again.');
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                }
            }
        });
    });
});
</script>
@endpush

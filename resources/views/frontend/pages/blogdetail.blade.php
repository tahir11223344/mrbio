@extends('frontend.layouts.frontend')

{{-- @section('title', 'Blog’s Details Page ') --}}
@section('meta_title', $data->meta_title ?? 'Blog Details')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

@push('frontend-styles')
    <style>
        /* ============================================================
                                                    BLOG DETAILS PAGE – CSS Styling
                                                    Includes: Images, Lists, Sidebar, Related Articles, Responsive Fixes
                                                    =============================================================== */

        .blog-content {
            max-width: 100%;
            overflow: hidden;
        }

        .blog-content img {
            max-width: 100% !important;
            height: auto !important;
            display: block;
        }

        .blog-content iframe,
        .blog-content video,
        .blog-content table {
            max-width: 100%;
        }

        .blog-content * {
            box-sizing: border-box;
        }

        .blog-main-img {
            width: 896px;
            height: 528px;
            object-fit: cover;
            border-radius: 8px;
        }

        .blog-sub-img {
            width: 820px;
            height: 534px;
            object-fit: cover;
            border-radius: 8px;
        }

        .blog-title,
        .blog-subtitle {
            font-family: Saira;
            font-weight: 600;
            font-size: 32px;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
        }

        .blog-desc {
            font-family: sans-serif;
            font-weight: 500;
            font-size: 16px;
            line-height: 160%;
            letter-spacing: 0;
            max-width: 895px;
            color: #000000;
        }

        .blog-list li {
            font-family: sans-serif;
            font-weight: 500;
            font-size: 16px;
            line-height: 160%;
            line-height: 160%;
            /* letter-spacing: 0; */
            color: #000000;
            margin-top: 12px;


        }

        /* Sidebar */
        .sidebar-heading {
            font-family: Inter;
            font-weight: 700;
            font-size: 20px;
            line-height: 100%;
            color: #000000;

        }

        .categories-list {
            list-style: none;
            padding: 0;
        }

        .categories-list li {
            font-family: Inter;
            font-weight: 400;
            font-size: 20px;
            line-height: 100%;
            cursor: pointer;
            color: #000000;
            margin-top: 20px;
            transition: all 0.2s ease-in;
        }

        /* Remove blue color and underline from links inside li */
        .categories-list li {
            color: #000000;
            /* default text color */
            text-decoration: none;
            /* remove underline */
            transition: all 0.2s ease-in;
        }

        .categories-list li:hover {
            /* color: #036CA0; */
            color: #FE0000;

            transform: scale(1.03)
        }

        .categories-list li i {
            font-size: 16px;
            margin-right: 6px;
            color: #FE0000;
        }

        /* Related Articles */


        .related-img {
            width: 90px;
            height: 70px;
            border-radius: 6px;
            object-fit: cover;
            /* margin-bottom: 15px; */

        }

        .related-title {
            font-family: Inter, sans-serif;
            font-weight: 400;
            font-size: 17px;
            line-height: 100%;
            color: #000000;
            /* margin-bottom: 3px; */
        }

        .related-date {
            font-size: 13px;
            color: #777;
        }

        .sidebarr {
            border-radius: 23px;
            box-shadow: 0px 0px 4px #00000040;
            width: 100%;
            max-width: 308px;
            padding: 10px;
        }

        /* ================= Responsive ================= */

        @media (max-width: 992px) {

            .blog-main-img,
            .blog-sub-img {
                width: 100%;
                height: auto;
            }
        }

        @media (max-width: 576px) {
            .related-img {
                width: 70px;
                height: 55px;
            }

            .categories-list li {
                font-size: 14px;
            }
        }

        /* ================= COMMENT SECTION STYLING ================= */

        .comment-section {
            background: #006A9E1A;
        }

        .comment-heading {
            color: #0168A4;
            font-size: 36px;
            font-weight: 700;
            line-height: 100%;
            font-family: Inter;
        }

        /* Inputs */
        .comment-input {
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 12px 14px;
            font-size: 24px;
            font-weight: 400;
            line-height: 140%;
            font-family: Inter;
            max-width: 567px;
            height: 71px;
            color: #8B8B8B;
        }

        .comment-textarea {
            border-radius: 15px;
            border: 1px solid #ccc;
            padding: 12px 14px;
            font-size: 24px;
            font-weight: 400;
            line-height: 140%;
            font-family: Inter;
            max-width: 567px;
            height: 118px;
            color: #8B8B8B;

        }

        .comment-input:focus,
        .comment-textarea:focus {
            border-color: #0168A4;
            box-shadow: 0px 0px 5px #0168A450;
        }

        /* Submit Button */
        .submitt-btn {
            background: #0168A4;
            color: #FFFFFF;
            width: 145px;
            height: 45px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 20px;
            line-height: 100%;
            transition: all 0.4s ease-in-out;
            margin-top: 20px;
        }

        .submitt-btn:hover {
            background: #004f7a;
            transform: scale(1.06);
            color: #FFFFFF;

        }


        /* ================= RIGHT SIDE COMMENTS BOX ================= */

        .comments-box {
            background: #F4F4F4;
            width: 567px;
            height: 318px;
            padding: 20px;
            border-radius: 10px;
            overflow-y: auto;
            overflow-x: hidden;
        }





        .single-comment {
            background: #fff;
            width: 518px;
            height: auto;
            border-left: 10px solid #0168A4;
            padding: 2px 15px;
            margin-top: 10px;
        }

        .comment-name {
            font-size: 24px;
            font-weight: 600;
            line-height: 140%;
            font-family: Inter;
            margin-bottom: 4px;
            color: #000000;
        }

        .comment-by {
            font-size: 22px;
            font-weight: 600;
            line-height: 140%;
            font-family: Inter;
            margin-bottom: 4px;
            color: #00000099;
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width: 992px) {
            .comments-box {
                width: 100%;
                height: auto;
            }

            .single-comment {
                width: 100%;
                height: auto;
            }
        }

        @media(max-width: 576px) {
            .submit-btn {
                width: 100%;
            }
        }
    </style>
@endpush



@section('frontend-content')

    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3">{!! highlightBracketText($blog->title ?? '', ['#000000']) !!}</h1>

            <p class="hero-description mx-auto mb-4">
                {{ $blog->short_description ?? '' }}
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">
                        <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
                        <span class="breadcrumb-separator">|</span>
                        <a href="{{ route('blogs') }}" class="breadcrumb-link">Blog</a>
                        <span class="breadcrumb-separator">|</span>
                        <span class="breadcrumb-active">{{ $blog->title ?? '' }}</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- ============================================================
                                                                                                                    BLOG DETAILS SECTION (Responsive)
                                                                                                                    Created for: Detailed Blog Page Layout
                                                                                                                    Columns: Left Content (8), Right Sidebar (4)
                                                                                                                    Includes: Images, Headings, Description, Lists, Categories, Related Articles
                                                                                                                    =============================================================== -->

    <section class="blog-details-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- ================== LEFT CONTENT ================== -->
                <div class="col-lg-9">

                    <!-- Main Image -->
                    <img src="{{ $blog->image ? asset('storage/blog/images/' . $blog->image) : '' }}"
                        class="img-fluid blog-main-img mb-4" alt="{{ $blog->image_alt_text ?? $blog->title }}">

                    {{-- <h2 class="blog-title mb-3">
                        {!! highlightBracketText($blog->title ?? '') !!}
                    </h2> --}}
                    <div class="blog-content">
                        {!! $blog->description !!}
                    </div>

                    {{-- <p class="blog-desc mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis magnam,
                        temporibus asperiores, deleniti tempora possimus dolores incidunt ratione
                        consectetur culpa veniam impedit illum voluptatum fuga laboriosam nam minus,
                        blanditiis voluptas. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolores, incidunt quos nobis modi perspiciatis consequuntur?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                    </p>

                    <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid blog-sub-img mb-4"
                        alt="News Image">
                    <h3 class="blog-subtitle mb-3">Top Key Highlights of Future Technologies</h3>

                    <p class="blog-desc mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
                        officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                    </p>

                    <ul class="blog-list mb-4">
                        <li>Artificial Intelligence and Machine Learning Improvements</li>
                        <li>Cloud Transformation for Enterprise Infrastructure</li>
                        <li>5G Networks Enabling Ultra-Fast Communications</li>
                        <li>Robotics and Automation in Business Operations</li>
                        <li>Cybersecurity Enhancements to Protect Data</li>
                        <li>IoT Devices Improving Industrial Performance</li>
                        <li>Blockchain Use in Financial and Supply-Chain Systems</li>
                        <li>Data Analytics for Smarter Decision Making</li>
                        <li>AR/VR for Training and Virtual Simulations</li>
                        <li>Quantum Computing Advancements</li>
                        <li>Green Technology for Sustainable Growth</li>
                        <li>Digital Workspaces for Remote Teams</li>
                        <li>Innovations in Medical Tech and Healthcare</li>
                        <li>Smart Cities Powered by Integrated Systems</li>
                        <li>Automation Tools to Reduce Manual Load</li>
                    </ul>

                    <h3 class="blog-subtitle mb-4">Conclusion</h3>
                    <p class="blog-desc mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                    </p>

                    <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid blog-sub-img mb-4"
                        alt="News Image">
                    <h3 class="blog-subtitle mb-3">Top Key Highlights of Future Technologies</h3>

                    <p class="blog-desc mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                    </p>
                    <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid blog-sub-img mb-4"
                        alt="News Image">
                    <h3 class="blog-subtitle mb-3">Top Key Highlights of Future Technologies</h3>

                    <p class="blog-desc mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates officiis
                        saepe molestias asperiores dolor fuga, repellendus commodi praesentium eveniet
                        voluptatibus porro corporis.
                    </p> --}}

                </div>

                <!-- ================== RIGHT SIDEBAR ================== -->
                <div class="col-lg-3">


                    <div class="sidebarr ">
                        <!-- Categories -->
                        <h4 class="sidebar-heading mb-3">Categories</h4>

                        <ul class="categories-list mb-4">
                            @foreach ($categories as $category)
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    {{ $category->name }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="row d-flex mb-3 g-3">
                            <h4 class="sidebar-heading mb-3">Related Articles</h4>
                            @foreach ($relatedBlogs as $related)
                                <div class="col-lg-12">
                                    <a href="{{ route('blog.detail', $related->slug) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-lg-4">
                                                <img src="{{ $related->image ? asset('storage/blog/images/' . $related->image) : '' }}"
                                                    class="related-img me-3"
                                                    alt="{{ $related->image_alt_text ?? plainBracketText($related->title) }}">
                                            </div>
                                            <div class="col-lg-8">
                                                <h6 class="related-title">
                                                    {{ \Illuminate\Support\Str::limit(plainBracketText($related->title) ?? '', 50) }}
                                                </h6>
                                                <p class="related-date">
                                                    {{ $related->updated_at ? $related->updated_at->format('d.M.Y') : '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
                                            LEAVE A COMMENT + COMMENTS SECTION
                                            Background: #006A9E1A
                                            Left: Comment Form
                                            Right: Comments Box
                                            =============================================================== -->

    <section class="comment-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- ================= LEFT COLUMN ================= -->
                <div class="col-lg-6 col-md-6">

                    <h3 class="comment-heading mb-4">Leave a Comment</h3>

                    <form id="blogCommentForm" action="{{ route('post.blog.comment', $blog->slug) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="name" class="form-control comment-input"
                                placeholder="Enter Name">
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control comment-input"
                                placeholder="Enter Email">
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="mb-3">
                            <textarea name="comment" class="form-control comment-textarea" rows="5" placeholder="Write your comment"></textarea>
                            <span class="text-danger error-text comment_error"></span>
                        </div>

                        <div class="form-group mb-3">
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div class="g-recaptcha w-100" data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                            </div>
                            <span class="text-danger error-text g-recaptcha-response_error"></span>
                        </div>

                        <button class="btn submitt-btn">Submit</button>
                    </form>

                </div>

                <!-- ================= RIGHT COLUMN ================= -->
                <div class="col-lg-6 col-md-6">

                    <h3 class="comment-heading mb-3">Comments [{{ $comments->count() }}]</h3>

                    <!-- Outer Box -->
                    <div class="comments-box">
                        @forelse ($comments as $comment)
                            <!-- Inner Comment -->
                            <div class="single-comment">
                                <h5 class="comment-name">{{ $comment->name ?? '' }}</h5>
                                <p class="comment-by">{{ $comment->comment ?? '' }}</p>
                            </div>
                        @empty
                            <p>No comments available for this blog.</p>
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- =============== feature section ===================== --}}
    <x-featured-blogs-section :limit="4" />

@endsection

@push('frontend-scripts')
    <script>
        $(document).ready(function() {
            $('#blogCommentForm').on('submit', function(e) {
                e.preventDefault(); // prevent default form submission

                // Clear previous errors
                $('.error-text').text('');

                var form = $(this);
                var actionUrl = form.attr('action');

                $.ajax({
                    url: actionUrl,
                    method: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Clear form fields
                            form[0].reset();

                            if (typeof grecaptcha !== 'undefined') {
                                grecaptcha.reset();
                            }

                            // Show success toast
                            if (typeof toastr !== 'undefined') {
                                toastr.success(response.message ||
                                    'Comment submitted successfully!');
                            } else {
                                alert(response.message || 'Comment submitted successfully!');
                            }
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) { // validation errors
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]);
                            });

                            if (typeof grecaptcha !== 'undefined') {
                                grecaptcha.reset();
                            }

                            // Optional: show a toast for error
                            if (typeof toastr !== 'undefined') {
                                toastr.error('Please fix the errors in the form.');
                            }
                        } else {
                            // General server error
                            if (typeof toastr !== 'undefined') {
                                toastr.error('Something went wrong. Please try again later.');
                            } else {
                                alert('Something went wrong. Please try again later.');
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush

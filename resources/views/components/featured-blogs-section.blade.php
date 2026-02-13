{{-- resources/views/components/featured-blogs-section.blade.php --}}

@if ($featuredBlogs->count())
    <section class="featured-section container my-5">
        <h2 class="latest-blog-heading mb-4 text-center">
            Featured <span>Updates</span>
        </h2>

        <div class="row g-4 mt-4">
            @foreach ($featuredBlogs as $featuredBlog)
                <div class="col-lg-6">

                    <a href="{{ route('blog.detail', $featuredBlog->slug) }}"
                        class="featured-card-link text-decoration-none">

                        <div class="featured-card">

                            <!-- Image -->
                            <img src="{{ $featuredBlog->image ? asset('storage/blog/images/' . $featuredBlog->image) : asset('frontend/images/placeholder.jpg') }}"
                                class="featured-img" alt="{{ $featuredBlog->image_alt_text ?? $featuredBlog->title }}">

                            <!-- Content -->
                            <div class="featured-content">

                                @if ($featuredBlog->category)
                                    <button class="cate-btn">
                                        {{ $featuredBlog->category->name }}
                                    </button>
                                @endif

                                <h4 class="featured-title">
                                    {{ \Illuminate\Support\Str::limit($featuredBlog->title ?? '', 70) }}
                                </h4>

                                <p class="featured-desc">
                                    {{ \Illuminate\Support\Str::limit($featuredBlog->short_description ?? '', 120) }}
                                </p>

                                @if ($featuredBlog->read_time)
                                    <span class="read-time">{{ $featuredBlog->read_time }}</span>
                                @endif

                                <hr class="featured-hr">

                                <div class="featured-footer">
                                    <span class="post-date">
                                        {{ $featuredBlog->updated_at?->format('d.M.Y') ?? '' }}
                                    </span>

                                    <div class="social-icons">
                                        @if (setting('facebook'))
                                            <i class="fab fa-facebook-f"></i>
                                        @endif
                                        @if (setting('twitter'))
                                            <i class="fa-brands fa-yelp"></i>
                                        @endif
                                        @if (setting('linkedin'))
                                            <i class="fab fa-linkedin-in"></i>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>

    </section>
@endif

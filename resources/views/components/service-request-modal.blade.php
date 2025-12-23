<div class="service-modal-overlay" id="serviceModal">
    <div class="service-modal-box">

        <span class="service-modal-close">&times;</span>

        <!-- Heading -->
        <h2 class="service-modal-heading">Service Request</h2>

        <!-- Form  -->
        <form class="service-form" id="serviceRequestForm" action="{{ route('service.request.submit') }}" method="POST">
            @csrf

            <!-- Full Name -->
            <div class="mb-2">
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Full Name">
                <span class="text-danger error-text name_error"></span>
            </div>

            <!-- Email -->
            <div class="mb-2">
                <input type="email" name="email" class="form-control form-control-sm" placeholder="Email Address">
                <span class="text-danger error-text email_error"></span>
            </div>

            <!-- Phone -->
            <div class="mb-2">
                <input type="tel" name="phone" class="form-control form-control-sm" placeholder="Phone Number">
                <span class="text-danger error-text phone_error"></span>
            </div>

            <!-- Company -->
            <div class="mb-2">
                <input type="text" name="company" class="form-control form-control-sm"
                    placeholder="Company / Hospital Name">
                <span class="text-danger error-text company_error"></span>
            </div>

            <!-- Service -->
            <div class="mb-2 w-50">
                <select name="service" class="form-select form-select-sm">
                    <option value="" disabled selected>Services Dropdown</option>
                    @foreach (getServicesList() as $service)
                        <option value="{{ $service }}">{{ $service }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text service_error"></span>
            </div>

            <!-- Equipment Category -->
            <div class="mb-2">
                <label class="form-label mb-1">Equipment Category</label>

                <div class="checkbox-group">
                    @forelse ($all_categories as $category)
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="categories[]"
                                value="{{ $category->slug }}">
                            <span class="form-check-label">
                                {{ $category->name }}
                            </span>
                        </label>
                    @empty
                        <p class="text-muted small">No categories available</p>
                    @endforelse
                </div>
                <span class="text-danger error-text categories_error"></span>
            </div>

            <!-- Message -->
            <div class="mb-2">
                <textarea name="message" class="form-control form-control-sm" rows="3" placeholder="Message / Details"></textarea>
                <span class="text-danger error-text message_error"></span>
            </div>

            <!-- Preferred Contact Method -->
            <div class="mb-3">
                <label class="form-label mb-1">Preferred Contact Method</label>

                <div class="radio-group">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="preferred_contact" value="email" checked>
                        <span class="form-check-label">Email</span>
                    </label>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="preferred_contact" value="phone">
                        <span class="form-check-label">Phone</span>
                    </label>
                </div>
                <span class="text-danger error-text preferred_contact_error"></span>
            </div>

            <div class="mb-3">
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <div class="g-recaptcha w-100" data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                </div>
                <span class="text-danger error-text g-recaptcha-response_error"></span>
            </div>

            <button type="submit" class="service-submit-btn">
                Submit Request
            </button>

        </form>
    </div>
</div>

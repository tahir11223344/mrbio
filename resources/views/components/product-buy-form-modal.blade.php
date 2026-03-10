<style>
    .custom-check {
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    .custom-check input {
        width: 14px;
        height: 14px;
        margin: 0;
        vertical-align: middle;
    }

    .custom-check span {
        line-height: 1;
    }
</style>

<div class="buy-form-overlay" id="buyFormOverlay">
    <div class="buy-form-box">
        <span class="close-form text-danger">&times;</span>

        <h3>Get <span>This</span></h3>

        <form class="buy-form" action="{{ route('buy.product.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="product_slug" id="product_slug" value="">

            <div>
                <input type="text" name="name" placeholder="Full Name" required>
                <span class="text-danger error-text name_error"></span>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email Address" required>
                <span class="text-danger error-text email_error"></span>
            </div>

            <div>
                <select name="state" id="modal_form_state" required>
                    <option value="">Select State</option>
                    @foreach (getPriorityStates() as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text state_error"></span>
            </div>

            <div>
                <select name="city" id="modal_form_city">
                    <option value="">Select City</option>
                </select>
                <span class="text-danger error-text city_error"></span>
            </div>

            <div>
                <textarea name="message" placeholder="Message" required></textarea>
                <span class="text-danger error-text message_error"></span>
            </div>

            <div class="col-md-6 col-6">
                <label class="form-label mb-2">Request Type</label>

                <div class="d-flex align-items-center gap-4">

                    <label class="custom-check">
                        <input type="checkbox" name="request_type[]" value="sale" required>
                        <span>For Sale</span>
                    </label>

                    <label class="custom-check">
                        <input type="checkbox" name="request_type[]" value="rental" required>
                        <span>For Rental</span>
                    </label>

                </div>

                <span class="text-danger error-text request_type_error"></span>
            </div>

            <div class="col-12 mt-2">
                <div class="g-recaptcha" id="buyCaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                </div>
                <span class="text-danger error-text g-recaptcha-response_error"></span>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>

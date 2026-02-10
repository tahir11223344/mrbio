<section class="location-section ">
    <div class="container">

        <!-- MAIN HEADING -->
        <h2 class="section-title text-center mt-5 fade-left">Everything’s Bigger In <span>Texas </span>-- Including Our
            Reach </h2>
        <p class="section-desc text-center fade-right">
            Texas-based hospitals and healthcare providers trust Mr. Biomed Tech Services Services for our precise and targeted
            biomedical equipment solutions. We cover it all and at a cost-effective rate: Biomed/Clinical Engineering
            Repair Services, Medical and Surgical Equipment Rental Services, New/Refurbished Medical and Surgical
            Equipment Sales, Disposition Services, and Consultancy Services.
        </p>

        <div class="row align-items-center ">

            <!-- LEFT IMAGE -->
            <div class="col-lg-3 text-center mb-4 mb-lg-0 fade-left">

                <img src="{{ asset('frontend/images/location-img.png') }}" alt="Location" class="location-img img-fluid">
            </div>

            <!-- RIGHT BOX -->
            <div class="col-lg-9 fade-right">
                <div class="location-box ">

                    <h3 class="box-title">Nationwide <span>Service Coverage</span> </h3>

                    <h4 class="sub-title">We provide services across the United States. The following are our primary service location:</h4>

                    <!-- 3 COLUMN LIST -->
                     <div class="row mt-3">
                        <div class="col-md-4">
                            <ul class="primary-list">
                                <li> <a href="/locations/san-antonio-tx">San Antonio</a> </li>
                                <li><a href="/locations/austin-tx">Austin</a></li>
                                <li><a href="/locations/houston-tx">Houston</a></li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <ul class="primary-list">
                                <li><a href="/locations/dallas-tx">Dallas</a></li>
                                <li><a href="/locations/garland-tx">Garland</a></li>
                            </ul>
                        </div>

                        {{-- <div class="col-md-4">
                            <ul class="primary-list">
                                <li>Louisiana</li>
                                <li>Mississippi</li>
                                <li>Oklahoma</li>
                            </ul>
                        </div> --}}
                    </div>

                    {{-- <h4 class="sub-title mt-4">
                        Mr. Biomed Tech Services, Also Services These Additional States Through Our Sister Companies
                        At The Scientific Safety Alliance.
                    </h4>

                    @php
                        $chunks = $serving_areas->chunk(3);
                    @endphp --}}

                    {{-- <div class="row mt-3">
                        @foreach ($chunks as $chunk)
                            @foreach ($chunk as $area)
                                <div class="col-md-4">
                                    <ul class="secondary-list">
                                        <li>
                                            <a href="{{ route('location.detail', $area->slug) }}" class="area-link">
                                                {{ $area->area_name }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @endforeach
                    </div> --}}

                    
                    <!-- 3 COLUMN LIST #2 -->
                    {{-- <div class="row mt-3">
                        <div class="col-md-4">
                            <ul class="secondary-list">
                                <li>New York</li>
                                <li>New Jersey</li>
                                <li>Pennsylvania</li>
                                <li>New York</li>
                                <li>New Jersey</li>
                                <li>Pennsylvania</li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <ul class="secondary-list">
                                <li>California</li>
                                <li>Arizona</li>
                                <li>Nevada</li>
                                <li>New York</li>
                                <li>New Jersey</li>
                                <li>Pennsylvania</li>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <ul class="secondary-list">
                                <li>Washington</li>
                                <li>Oregon</li>
                                <li>Colorado</li>
                                <li>New York</li>
                                <li>New Jersey</li>
                                <li>Pennsylvania</li>
                            </ul>
                        </div>
                    </div> --}}

                </div><!-- right box end -->
            </div>

        </div>
    </div>
</section>

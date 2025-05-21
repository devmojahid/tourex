@php
    $home2_destination = getContent('theme2_destination.content', true);
@endphp

<!-- tg-destination-area-start -->
<div class="tg-destination-area pt-135 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-destination-section-title text-center mb-40">
                    <h5 class="tg-section-subtitle wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".6s">
                        {{ getTranslatedValue($home2_destination, 'sub_title') }}
                    </h5>
                    <h2 class="mb-15 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s">
                        {{ getTranslatedValue($home2_destination, 'title') }}
                    </h2>
                    <p class="text-capitalize wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                        {!! strip_tags(clean(getTranslatedValue($home2_destination, 'description')), '<br>') !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="tg-destination-item mb-30 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".6s">
                    <div class="tg-destination-thumb fix p-relative">
                        <img class="w-100" src="assets/img/destination/des.jpg" alt="des">
                        <div class="tg-listing-2-mask">
                            <img class="w-100" src="assets/img/listing/listing-2/shape.png" alt="">
                        </div>
                    </div>
                    <div class="tg-destination-content text-center">
                        <div class="tg-destination-meta">
                            <a href="map-listing.html">italy</a>
                        </div>
                        <div class="tg-destination-tag">
                            <span>01 Tour</span>
                            <span>02 Hotel</span>
                            <span>04 Acitivity</span>
                            <span>01 Restaurant</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="tg-destination-item mb-30 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".6s">
                    <div class="tg-destination-thumb fix p-relative">
                        <img class="w-100" src="assets/img/destination/des-2.jpg" alt="des">
                        <div class="tg-listing-2-mask">
                            <img class="w-100" src="assets/img/listing/listing-2/shape.png" alt="">
                        </div>
                    </div>
                    <div class="tg-destination-content text-center">
                        <div class="tg-destination-meta">
                            <a href="map-listing.html">California</a>
                        </div>
                        <div class="tg-destination-tag">
                            <span>01 Tour</span>
                            <span>02 Hotel</span>
                            <span>04 Acitivity</span>
                            <span>01 Restaurant</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="tg-destination-item mb-30 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".6s">
                    <div class="tg-destination-thumb fix p-relative">
                        <img class="w-100" src="assets/img/destination/des-3.jpg" alt="des">
                        <div class="tg-listing-2-mask">
                            <img class="w-100" src="assets/img/listing/listing-2/shape.png" alt="">
                        </div>
                    </div>
                    <div class="tg-destination-content text-center">
                        <div class="tg-destination-meta">
                            <a href="map-listing.html">Spain</a>
                        </div>
                        <div class="tg-destination-tag">
                            <span>01 Tour</span>
                            <span>02 Hotel</span>
                            <span>04 Acitivity</span>
                            <span>01 Restaurant</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="tg-destination-item mb-30 wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".6s">
                    <div class="tg-destination-thumb p-relative fix">
                        <img class="w-100" src="assets/img/destination/des-4.jpg" alt="des">
                        <div class="tg-listing-2-mask">
                            <img class="w-100" src="assets/img/listing/listing-2/shape.png" alt="">
                        </div>
                    </div>
                    <div class="tg-destination-content text-center">
                        <div class="tg-destination-meta">
                            <a href="map-listing.html">Bail</a>
                        </div>
                        <div class="tg-destination-tag">
                            <span>01 Tour</span>
                            <span>02 Hotel</span>
                            <span>04 Acitivity</span>
                            <span>01 Restaurant</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-destination-area-end -->

@php
    $theme3_destination = getContent('theme3_destination.content', true);
@endphp

<!-- tg-location-area-start -->
<div class="tg-location-area p-relative z-index-1 pb-65 pt-120">
    <div class="tg-location-su-bg">
        <img src="{{ asset('frontend/assets/img/shape/map-bg.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-30">
                    <h5 class="tg-section-su-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        {{ getTranslatedValue($theme3_destination, 'sub_title') }}
                    </h5>
                    <h2 class="tg-section-su-title text-capitalize wow fadeInUp" data-wow-delay=".5s"
                        data-wow-duration=".9s">
                        {{ getTranslatedValue($theme3_destination, 'title') }}
                    </h2>
                </div>
            </div>
            @if (getTranslatedValue($theme3_destination, 'show_navigation') == '1')
                <div class="col-lg-3">
                    <div class="tg-listing-5-slider-navigation tg-location-su-slider-navigation text-end mb-30 wow fadeInUp"
                        data-wow-delay=".4s" data-wow-duration="1s">
                        <button class="tg-listing-5-slide-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
                        <button class="tg-listing-5-slide-next"><i class="fa-solid fa-arrow-right-long"></i></button>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container tg-location-su-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                <div class="tg-location-thumb tg-round-25">
                                    <img class="w-100 tg-round-25" src="assets/img/destination/tu/des-4.jpg"
                                        alt="location">
                                </div>
                                <div class="tg-location-content tg-location-su-content">
                                    <div class="content">
                                        <h3 class="tg-location-title mb-5"><a href="tour-grid-1.html">Paris</a></h3>
                                        <span class="tg-location-su-duration">05 Tours</span>
                                    </div>
                                    <a class="icons" href="tour-grid-1.html">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                <div class="tg-location-thumb tg-round-25">
                                    <img class="w-100 tg-round-25" src="assets/img/destination/tu/des-2.jpg"
                                        alt="location">
                                </div>
                                <div class="tg-location-content tg-location-su-content">
                                    <div class="content">
                                        <h3 class="tg-location-title mb-5"><a href="tour-grid-1.html">Australia</a></h3>
                                        <span class="tg-location-su-duration">05 Tours</span>
                                    </div>
                                    <a class="icons" href="tour-grid-1.html">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                <div class="tg-location-thumb tg-round-25">
                                    <img class="w-100 tg-round-25" src="assets/img/destination/tu/des-3.jpg"
                                        alt="location">
                                </div>
                                <div class="tg-location-content tg-location-su-content">
                                    <div class="content">
                                        <h3 class="tg-location-title mb-5"><a href="tour-grid-1.html">New York City</a>
                                        </h3>
                                        <span class="tg-location-su-duration">05 Tours</span>
                                    </div>
                                    <a class="icons" href="tour-grid-1.html">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                <div class="tg-location-thumb tg-round-25">
                                    <img class="w-100 tg-round-25" src="assets/img/destination/tu/des-1.jpg"
                                        alt="location">
                                </div>
                                <div class="tg-location-content tg-location-su-content">
                                    <div class="content">
                                        <h3 class="tg-location-title mb-5"><a href="tour-grid-1.html">Spain City</a>
                                        </h3>
                                        <span class="tg-location-su-duration">12 Tours</span>
                                    </div>
                                    <a class="icons" href="tour-grid-1.html">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                <div class="tg-location-thumb tg-round-25">
                                    <img class="w-100 tg-round-25" src="assets/img/destination/tu/des-1.jpg"
                                        alt="location">
                                </div>
                                <div class="tg-location-content tg-location-su-content">
                                    <div class="content">
                                        <h3 class="tg-location-title mb-5"><a href="tour-grid-1.html">Spain City</a>
                                        </h3>
                                        <span class="tg-location-su-duration">05 Tours</span>
                                    </div>
                                    <a class="icons" href="tour-grid-1.html">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-location-area-end -->

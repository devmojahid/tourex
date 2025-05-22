@php
    $theme5_tour_package = getContent('theme5_tour_package.content', true);
@endphp

<!-- tg-listing-area-start -->
<div class="tg-listing-area pt-140 pb-105 p-relative z-index-9">
    <img class="tg-listing-3-shape d-none d-xl-block" src="assets/img/banner/banner-2/shape.png" alt="">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        {{ getTranslatedValue($theme5_tour_package, 'sub_title') }}
                    </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                        {!! strip_tags(clean(getTranslatedValue($theme5_tour_package, 'title')), '<br>') !!}
                    </h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tg-location-3-btn text-end wow fadeInUp mb-40" data-wow-delay=".6s" data-wow-duration=".9s">
                    <a href="{{ getTranslatedValue($theme5_tour_package, 'button_url') }}" class="tg-btn tg-btn-gray tg-btn-switch-animation">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">{{ getTranslatedValue($theme5_tour_package, 'button_text') }}</span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749"
                                        stroke="currentColor" stroke-width="1.77778" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749"
                                        stroke="currentColor" stroke-width="1.77778" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">Two Hour Walking Tour of
                                Manhattan</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-2.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">Vatican Museums, Sistine
                                Chapel Skip the Line</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-3.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">southwestern Switzerland
                                Akam City</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-4.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">Modern Stefano La Piazze
                                Wergeland</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-5.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">southwestern Switzerland
                                Akam City</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".8s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-6.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">When you visit the Eternal
                                Dubai City</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".9s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-7.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">win cities on opposite sides
                                of the</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".9s"
                data-wow-duration=".6s">
                <div class="tg-listing-card-item tg-listing-3-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="tour-grid-2.html">
                            <img class="tg-card-border w-100" src="assets/img/listing/listing-3/list-8.jpg"
                                alt="listing">
                            <span class="tg-listing-item-price-discount shape-2">% Offer</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                        <div class="tg-listing-2-price">
                            <del>$299</del>
                            <span class="new">$230</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <span class="tg-listing-card-duration-map d-inline-block mb-5">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z"
                                    stroke="currentColor" stroke-width="1.15556" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            51 Dekor Land, Thailand
                        </span>
                        <h4 class="tg-listing-card-title mb-0"><a href="tour-grid-2.html">Two Hour Walking Tour of
                                Manhattan</a></h4>
                        <div class="tg-listing-card-review mb-5">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-card-duration-tour">
                            <span class="tg-listing-card-duration-time">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z"
                                        stroke="currentColor" stroke-width="1.06667" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                7 Days
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-listing-area-end -->

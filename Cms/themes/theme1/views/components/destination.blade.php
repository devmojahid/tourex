@php
    $theme1_destination = getContent('theme1_destination.content', true);
    $destination_items = Modules\TourBooking\App\Models\Destination::where(['status' => 1, 'is_featured' => 1])->limit(4)->get();
@endphp

<!-- tg-location-area-start -->
<div class="tg-location-area p-relative pb-40 tg-grey-bg pt-140">
    <img class="tg-location-shape d-none d-lg-block" src="{{ asset('frontend/assets/img/shape/tower.png') }}"
        alt="shape">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tg-location-section-title text-center mb-30">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">
                        {{ getTranslatedValue($theme1_destination, 'sub_title') }}
                    </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                        {!! strip_tags(clean(getTranslatedValue($theme1_destination, 'title')), '<br>') !!}
                    </h2>
                    <p class="text-capitalize wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".9s">
                        {!! strip_tags(clean(getTranslatedValue($theme1_destination, 'description')), '<br>') !!}
                    </p>
                </div>
            </div>
            @foreach ($destination_items as $destination_item)
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s">
                    <div class="bg-white tg-round-25 p-relative z-index-1">
                        <div class="tg-location-wrap p-relative mb-30">
                            <div class="tg-location-thumb">
                                <img class="w-100" src="{{ asset($destination_item->image) }}" alt="location">
                            </div>
                            <div class="tg-location-content text-center">
                                <span class="tg-location-time">05 Tours</span>
                                <h3 class="tg-location-title mb-0"><a href="map-listing.html">{{ $destination_item->name }}</a></h3>
                            </div>
                            <div class="tg-location-border one"></div>
                            <div class="tg-location-border two"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- tg-location-area-end -->

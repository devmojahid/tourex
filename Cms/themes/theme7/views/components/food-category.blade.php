@php
    $theme7_food_category = getContent('theme7_food_category.content', true);
@endphp

<!-- tg-foods-area-start -->
<div class="tg-foods-area pt-135 fix pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-about-section-title text-center mb-45">
                    <h5 class="tg-section-subtitle wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".6s">
                        {{ getTranslatedValue($theme7_food_category, 'sub_title') }}
                    </h5>
                    <h2 class="mb-15 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s">
                        {!! strip_tags(clean(getTranslatedValue($theme7_food_category, 'title')), '<br>') !!}
                    </h2>
                </div>
            </div>
        </div>
        <div
            class="row gx-30 row-cols-xl-5 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center align-items-center">
            <div class="col wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                <div class="tg-foods-wrap text-center mb-30">
                    <div class="fix tg-foods-thumb mb-15">
                        <img src="assets/img/foods/food-2.jpg" alt="">
                    </div>
                    <h3 class="w-100 tg-foods-title"><a href="#">American <span>(05)</span></a></h3>
                </div>
            </div>
            <div class="col wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                <div class="tg-foods-wrap text-center mb-30">
                    <div class="fix tg-foods-thumb mb-15">
                        <img src="assets/img/foods/food-3.jpg" alt="">
                    </div>
                    <h3 class="w-100 tg-foods-title"><a href="#">Mexican <span>(12)</span></a></h3>
                </div>
            </div>
            <div class="col wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                <div class="tg-foods-wrap text-center mb-30">
                    <div class="fix tg-foods-thumb mb-15">
                        <img src="assets/img/foods/food-4.jpg" alt="">
                    </div>
                    <h3 class="w-100 tg-foods-title"><a href="#">Italian <span>(11)</span></a></h3>
                </div>
            </div>
            <div class="col wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1s">
                <div class="tg-foods-wrap text-center mb-30">
                    <div class="fix tg-foods-thumb mb-15">
                        <img src="assets/img/foods/food-1.jpg" alt="">
                    </div>
                    <h3 class="w-100 tg-foods-title"><a href="#">Vegetarians <span>(04)</span></a></h3>
                </div>
            </div>
            <div class="col wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                <div class="tg-foods-wrap text-center mb-30">
                    <div class="fix tg-foods-thumb mb-15">
                        <img src="assets/img/foods/food-5.jpg" alt="">
                    </div>
                    <h3 class="w-100 tg-foods-title"><a href="#">Japanese <span>(13)</span></a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-foods-area-end -->

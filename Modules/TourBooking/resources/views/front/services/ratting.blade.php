<div class="tg-listing-card-review mb-10">
    @foreach (range(1, 5) as $star)
        <i class="fa-sharp fa-solid fa-star @if ($avgRating >= $star) active @endif"></i>
    @endforeach
    <span class="tg-listing-rating-percent">
        (
        {{ __($ratingCount) }}
        {{ __($ratingCount > 1 ? __('translate.Reviews') : __('translate.Review')) }}
        )
    </span>
</div>

<div class="tg_price_per_person">
    {{ currency($service->price_per_person) }} <span class="shift">/
        Person</span>
</div>

@push('style_section')
    <style>
        .tg_price_per_person {
            color: var(--tg-theme-primary);
            font-weight: 600;
            font-size: 16px;
        }

        .tg_price_per_person .shift {
            color: var(--tg-text-color);
            font-weight: 400;
            font-size: 14px;
        }
    </style>
@endpush

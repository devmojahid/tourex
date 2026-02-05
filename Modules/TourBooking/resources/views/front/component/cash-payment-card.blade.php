@props(['payment_route' => route('payment.cash_payment')])
<div class="payment_select_item_box" style="width: 100%">
    <form id="cash_payment_form" action="{{ $payment_route }}" class="text-center" method="POST">
        @csrf
        <button type="submit" form="cash_payment_form" class="text-center">
            <h4 class="mb-0">
                {{ isset($payment_setting->cash_payment_button_text) ? $payment_setting?->cash_payment_button_text : 'Cash Payment' }}
            </h4>
        </button>
    </form>
</div>

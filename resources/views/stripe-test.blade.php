@extends('layouts.app')

@section('content')
    <form action="{{ route('purchases.post') }}" method="POST">
        {{ csrf_field() }}
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ $stripe_key }}"
                data-amount="999"
                data-name="D.C. Automation Suite&trade;"
                data-description="Monthly Subscription"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="true">
        </script>
    </form>

    {!! $MyNavBar->asUl() !!}
@stop

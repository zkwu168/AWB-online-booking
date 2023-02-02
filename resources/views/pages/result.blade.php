@extends('layouts.user')

@section('content')

<title>Result: {{$type}}</title>

<div class="status-container" style="margin-top:150px;">
  <div class="status">
    @if ($type == "error" || $type == "failed")
    <img src="{{ asset('img/checkout/failed.svg') }}" class="status-image" alt="failed">
    @else
    <img src="{{ asset('img/checkout/success.svg') }}" class="status-image" alt="success">
    <img src="{{ asset('img/checkout/thank-you.svg') }}" class="status-image status-image-thank-you" alt="thank you">
    @endif
    <p class="status-message">
        @if ($type == "error")
            Error! Review response in console and refer to <a href="https://docs.adyen.com/development-resources/response-handling">Response handling.</a>
        @elseif ($type == "failed")
            The payment was refused. Please try a different payment method or card.
        @elseif ($type == "pending")
            Your order has been received! Payment completion pending.
        @else
            Your order has been successfully placed.

        @endif
    </p>
    <a class="button" href="/shipments" to="#/">Return Home</a>
  </div>
</div>

@endsection

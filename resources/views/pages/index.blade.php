@extends('layouts.app')

@section('content')
  <div class='main-container'>
    <div class="info">
      <h1>Select a demo</h1>
      <p>Click to view an interactive example of a PCI-compliant UI integration for online payments.</p>
      <p>
        Make sure the payment method you want to use are enabled for your account.
        Refer <a href="https://docs.adyen.com/payment-methods#add-payment-methods-to-your-account">the documentation</a> to add missing
        payment methods.
      </p>
      <p>To learn more about client-side integration solutions, check out <a href="https://docs.adyen.com/checkout">Online
          payments.</a></p>
    </div>
    <ul class="integration-list">
      <li class="integration-list-item">
        <a href="/preview?type=dropin" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">Drop-in</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=card" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">Card</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=ideal" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">iDEAL</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=dotpay" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">Dotpay</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=giropay" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">giropay</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=sepadirectdebit" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">SEPA Direct Debit</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=directEbanking" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">SOFORT</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=ach" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">ACH</p>
          </div>
        </a>
      </li>
      <li class="integration-list-item">
        <a href="/preview?type=alipay" class="integration-list-item-link">
          <div class="title-container">
            <p class="integration-list-item-title">Alipay</p>
          </div>
        </a>
      </li>
    </ul>
  </div>
@endsection
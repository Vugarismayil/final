@extends('user.layouts.master')
@section('site_name', 'Deposit via Credit Card')
@section('page_title')
    <i class="fa fa-credit-card"></i> Deposit via Credit Card
@endsection
@section('body')
    <style>
        .credit-card-box .form-control.error {
            border-color: red;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
        }

        .credit-card-box label.error {
            font-weight: bold;
            color: red;
            padding: 2px 8px;
            margin-top: 2px;
        }
        .jp-card .jp-card-front, .jp-card .jp-card-back{
            background: #222f3e!important;
        }
    </style>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                <h1 class="text-center">Stripe Payment</h1>
                </div>
                <hr/>
                 <div class="card-wrapper"></div>
                <div class="card-body">
                <form role="form" id="payment-form" method="POST" action="{{ route('ipn.stripe')}}">
                    {{csrf_field()}}
                    <input type="hidden" value="{{ $track }}" name="track">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">CARD HOLDER NAME</label>
                                <div class="input-group">
                                    <input
                                            type="text"
                                            class="form-control form-control-lg"
                                            name="name"
                                            placeholder="Card Holder Name"
                                            autocomplete="off" autofocus
                                    />
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-font"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cardNumber">CARD NUMBER</label>
                                <div class="input-group">
                                    <input
                                            type="tel"
                                            class="form-control form-control-lg"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="off"
                                            required autofocus
                                    />
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cardExpiry">EXPIRATION DATE</label>
                                <input
                                        type="tel"
                                        class="form-control form-control-lg input-sz"
                                        name="cardExpiry"
                                        placeholder="MM / YYYY"
                                        autocomplete="off"
                                        required
                                />
                            </div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="form-group">
                                <label for="cardCVC">CVC CODE</label>
                                <input
                                        type="tel"
                                        class="form-control form-control-lg input-sz"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="off"
                                        required
                                />
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit"> PAY NOW</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/user/stripe/payvalid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/user/stripe/paymin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/user/stripe/payform.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                var card = new Card({
                    form: '#payment-form',
                    container: '.card-wrapper',
                    formSelectors: {
                        numberInput: 'input[name="cardNumber"]',
                        expiryInput: 'input[name="cardExpiry"]',
                        cvcInput: 'input[name="cardCVC"]',
                        nameInput: 'input[name="name"]'
                    }
                });
            });
        })(jQuery);
    </script>
@endsection



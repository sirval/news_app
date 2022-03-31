@extends('layouts.auth-master')
<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    <p>Amount is Auto generated. Click on Pay Now to proceed, 
                        this is on test mode as a result no deduction to your account.<br>
                        You can use the following card details below when you click on <i> Use another card</i> on the next page<br>
                    <br>
                    Card Number: 4123450131001381<br>
                    Expiry Date: any date in the future<br>
                    CVV: 883
                </p>
                   
                </div>
            </p>
            @php
                $amount = random_int(100000, 999999);
                $orderId = ('OI_'.random_int(100000, 999999));
                $userId = random_int(100000, 999999)
            @endphp
            <input type="hidden" name="userId" value="{{ $userId }}">
            <input type="hidden" name="email" value="ohukaiv@gmail.com"> {{-- required --}}
            <input type="text" readonly name="orderID" value="{{ $orderId }}">
            <input type="text" readonly name="amount" value="{{ $amount }}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
{{--             
            <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful"> to support transaction split. more details https://paystack.com/docs/payments/multi-split-payments/#using-transaction-splits-with-payments --}}
            {{-- <input type="hidden" name="split" value="{{ json_encode($split) }}"> to support dynamic transaction split. More details https://paystack.com/docs/payments/multi-split-payments/#dynamic-splits --}}
            {{-- {{ csrf_field() }} works only when using laravel 5.1, 5.2 --}}

            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>
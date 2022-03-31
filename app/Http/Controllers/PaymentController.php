<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Models\UserPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Paystack;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request)
    {
        $paystack = new Paystack();
        try {
            return $paystack->getAuthorizationUrl()->redirectNow();
            $userDetail = UserPayment::create([
                'order_id' => $request->orderID,
                'transactionRef' => $request->reference,
                'amt' => $request->amount,
                'currency'=>$request->currency,
            ]);
            return back()->with('success', 'Transaction Successful');
        } catch (\Exception $e) {
            return redirect()->back()->
            with('error', 'The paystack token has expired. Please refresh the page and try again.');
        }
        
       
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = paystack()->getPaymentData();
       
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function __invoke(Coin $coin, Request $request)
    {
        $package = Package::where('id', $request->saveCoinId)->first();

        $payment = new Payment();
        $payment->amount = $package->price;
        $payment->currency = $coin->currency;
        $payment->user_id = $request->user()->id;
        $payment->package_id = $package->id;
        $payment->save();


        $merchant_id = 1217561;
        $payhere_secret = "4Et5PfTcI6w4jtSm1L4uYC4Dybsa0yFdL8X4vDzW5CoT";
        $order_id = $payment->id;
        $payhere_amount = $payment->amount;
        $payhere_currency = $payment->currency;

        $hash = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . strtoupper(md5($payhere_secret)) ) );

        return response()->json([
            'merchant_id' => $merchant_id,
            'order_id' => $order_id,
            'payhere_amount' => $payhere_amount,
            'payhere_currency' => $payhere_currency,
            'hash' => $hash,
        ]);
    }
}

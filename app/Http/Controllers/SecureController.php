<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;

class SecureController extends Controller
{
    public function securePayhere(Request $request)
    {
        // $merchant_id = 1217561;
        // $payhere_currency = "USD";

        // if ($payment = Payment::where('id', $request->orderId)->first()) {
            // $payment = Payment::where('id', $request->orderId)->first();


        //     if ($payment->id == $request->orderId) {
        //         if ($request->user()->id == $payment->user_id && $payment->amount == $request->payhere_amount && $merchant_id == $request->merchantId && $payhere_currency == $request->payhere_currency && $payment->check == 0) {

        //             $payment->check = '1';
        //             $payment->save();
        //         } else {
        //             $attack = new Attack();

        //             $attack->user_id = $request->user()->id;
        //             $attack->merchant_id = $request->merchantId;
        //             $attack->payhere_amount = $request->payhere_amount;
        //             $attack->order_id = $request->orderId;
        //             $attack->attack_count = $attack->attack_count + 1;
        //             $attack->payhere_currency = $request->payhere_currency;
        //             $attack->save();
        //         }
        //     } else {
        //         $attack = new Attack();

        //         $attack->user_id = $request->user()->id;
        //         $attack->merchant_id = $request->merchantId;
        //         $attack->payhere_amount = $request->payhere_amount;
        //         $attack->order_id = $request->orderId;
        //         $attack->attack_count = $attack->attack_count + 1;
        //         $attack->payhere_currency = $request->payhere_currency;
        //         $attack->save();
        //     }
        // } else {
        //     $attack = new Attack();

        //     $attack->user_id = $request->user()->id;
        //     $attack->merchant_id = $request->merchantId;
        //     $attack->payhere_amount = $request->payhere_amount;
        //     $attack->order_id = $request->orderId;
        //     $attack->attack_count = $attack->attack_count + 1;
        //     $attack->payhere_currency = $request->payhere_currency;
        //     $attack->save();
        // }
    }
    public function NotsecurePayhere(Request $request)
    {
        // $attack = new Attack();

        // $attack->user_id = $request->user()->id;
        // $attack->merchant_id = "0";
        // $attack->payhere_amount = "0";
        // $attack->order_id = "0";
        // $attack->attack_count = "1";
        // $attack->payhere_currency = "0";
        // $attack->save();
    }

    public function payhereNotify(Request $request)
    {
        $payment = Payment::findOrFail($request->order_id);

        if ($payment) {
            $payment->status = $request->status;
            $payment->save();

            $package = Package::findOrFail($payment->package_id);

            $balance = Balance::where('user_id', $payment->user_id)->firstOrFail();
            $balance->gc = $balance->gc + $package->value;
            $balance->save();
            return response()->json($balance);
        }
    }
}

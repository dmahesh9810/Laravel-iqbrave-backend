<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;

class CheckOutBalance extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $balance = Balance::where('user_id', $request->user()->id)->first();

        return response()->json([
            'balance' => $balance,
            'status' => 200,
        ]);
    }
}

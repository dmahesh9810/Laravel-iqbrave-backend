<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\CoinSell;
use App\Models\Package;
use Illuminate\Http\Request;

class GetCoinController extends Controller
{
    public function packageCoin()
    {
        return response()->json([
            'coins' => Package::query()->get()
        ]);
    }
    public function getSellCoins(Request $request)
    {
        $gcCoin = Coin::where('name', "gc")->first();
        $gcCoinSell = CoinSell::where('coin_id', $gcCoin->id)->where('seller_id','!=', $request->user()->id)->get();

        $gsgCoin = Coin::where('name', "gsg")->first();
        $gsgCoinSell = CoinSell::where('coin_id', $gsgCoin->id)->where('seller_id','!=', $request->user()->id)->get();

        return response()->json([
            'gccoin' => $gcCoinSell,
            'gcgcoin' => $gsgCoinSell,
            'status' => 200,
            'fuck' => 200,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Coin;
use App\Models\CoinSell;
use App\Models\User;
use Illuminate\Http\Request;

class SellCoinController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $coin = Coin::where('name', $request->coinType)->first();
        $user = User::findOrFail($request->user()->id);
        if ($user->email_verified_at) {
            if ($coin) {
                $CoinName = $coin->name;
                $balance = Balance::where('user_id', $request->user()->id)->first();
                if ($request->sellValue <= $balance->$CoinName) {
                    if ($request->sellValue >= 50) {
                        if ($request->sellPrice) {

                            $balance->$CoinName = $balance->$CoinName - $request->sellValue;
                            $balance->save();

                            $coinSell = new CoinSell();


                            $coinSell->seller_id = $request->user()->id;
                            $coinSell->coin_id = $coin->id;
                            $coinSell->value = $request->sellValue;
                            $coinSell->price = $request->sellPrice;
                            $coinSell->save();

                            return response()->json([
                                'massage' => "Sussess coin Sell",
                                'status' => 200,
                            ]);
                        } else {
                            return response()->json([
                                'massage' => "Sell price not enter 0",
                                'status' => 204,
                            ]);
                        }
                    } else {
                        return response()->json([
                            'massage' => "Sell minimum 50 coins",
                            'status' => 204,
                        ]);
                    }
                } else {
                    return response()->json([
                        'massage' => "Low than Your balnce",
                        'status' => 204,
                    ]);
                }
            } else {
                return response()->json([
                    'massage' => "invalid coin type",
                    'status' => 204,
                ]);
            }
        }else{
            return response()->json([
                'massage' => "Email Not Verify",
                'status' => 200,
            ]);
        }
    }
}

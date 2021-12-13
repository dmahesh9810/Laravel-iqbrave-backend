<?php

namespace App\Http\Controllers\Game\Random;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Coin;
use App\Models\RiseFall;
use Illuminate\Http\Request;

class RiseFallGameController extends Controller
{
    public function riseFallEnter(Request $request)
    {
        $coinType = $request->cointype;
        if ($request->stake >= 1) {
            if ($request->digit >= 1 && $request->digit <= 10) {
                if ($request->cointype === "tc" || $request->cointype === "gc") {
                    $balance = Balance::where('user_id', $request->user()->id)->first();
                    if ($balance->$coinType >= $request->stake) {
                        if ($request->action === "up") {
                            if ($request->digit !== 10 && $request->digit !== 1) {
                                $firstDigit = random_int(1, 10);
                                $second_digit = random_int(1, 10);
                                $third_digit = random_int(1, 10);
                                $four_digit = random_int(1, 10);
                                $five_digit = random_int(1, 10);
                                $six_digit = random_int(1, 10);
                                $seven_digit = random_int(1, 10);
                                $eight_digit = random_int(1, 10);
                                $nine_digit = random_int(1, 10);
                                $ten_digit = random_int(1, 10);

                                if ($request->digit == 2) {
                                    if ($request->digit <  $second_digit) {



                                        $balance->$coinType = $balance->$coinType + (($request->stake * 10) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 3) {
                                    if ($request->digit <  $third_digit) {

                                        $balance->$coinType = $balance->$coinType + (($request->stake * 20) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 4) {
                                    if ($request->digit <  $four_digit) {

                                        $balance->$coinType = $balance->$coinType + (($request->stake * 35) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $coin = Coin::where('name', 'gsg')->first();
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 5) {
                                    if ($request->digit <  $five_digit) {

                                        $balance->$coinType = $balance->$coinType + (($request->stake * 50) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 6) {
                                    if ($request->digit <  $six_digit) {

                                        $balance->$coinType = $balance->$coinType + (($request->stake * 60) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 7) {
                                    if ($request->digit <  $seven_digit) {

                                        $balance->$coinType = $balance->$coinType + (($request->stake * 70) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'risefall' => $riseFall,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 8) {
                                    if ($request->digit <  $eight_digit) {

                                        $balance->$coinType = $balance->$coinType + (($request->stake * 90) / 100);
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                } elseif ($request->digit == 9) {
                                    if ($request->digit <  $nine_digit) {

                                        $balance->$coinType = $balance->$coinType + $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "1";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    } else {

                                        $balance->$coinType = $balance->$coinType - $request->stake;
                                        $balance->save();

                                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                        $riseFall = new RiseFall();

                                        $riseFall->user_id = $request->user()->id;
                                        $riseFall->stake = $request->stake;
                                        $riseFall->firstDigit = $firstDigit;
                                        $riseFall->second_digit = $second_digit;
                                        $riseFall->third_digit = $third_digit;
                                        $riseFall->four_digit = $four_digit;
                                        $riseFall->five_digit = $five_digit;
                                        $riseFall->six_digit = $six_digit;
                                        $riseFall->seven_digit = $seven_digit;
                                        $riseFall->eight_digit = $eight_digit;
                                        $riseFall->nine_digit = $nine_digit;
                                        $riseFall->ten_digit = $ten_digit;
                                        $riseFall->user_digit = $request->digit;
                                        $riseFall->result = "0";
                                        $riseFall->action = "1";
                                        $riseFall->save();

                                        return response()->json([
                                            'result' => $riseFall->result,
                                            'ten_digit' => $riseFall->ten_digit,
                                            'nine_digit' => $riseFall->nine_digit,
                                            'eight_digit' => $riseFall->eight_digit,
                                            'seven_digit' => $riseFall->seven_digit,
                                            'six_digit' => $riseFall->six_digit,
                                            'five_digit' => $riseFall->five_digit,
                                            'four_digit' => $riseFall->four_digit,
                                            'third_digit' => $riseFall->third_digit,
                                            'second_digit' => $riseFall->second_digit,
                                            'firstDigit' => $riseFall->firstDigit,
                                            'status' => 200,
                                        ]);
                                    }
                                }
                            } else {
                                return response()->json([
                                    'status' => 204,
                                    'massage' => "invalid digit",
                                ]);
                            }
                        } else {
                            if ($request->action === "down") {
                                if ($request->digit !== 10 && $request->digit !== 1) {
                                    $firstDigit = random_int(1, 10);
                                    $second_digit = random_int(1, 10);
                                    $third_digit = random_int(1, 10);
                                    $four_digit = random_int(1, 10);
                                    $five_digit = random_int(1, 10);
                                    $six_digit = random_int(1, 10);
                                    $seven_digit = random_int(1, 10);
                                    $eight_digit = random_int(1, 10);
                                    $nine_digit = random_int(1, 10);
                                    $ten_digit = random_int(1, 10);

                                    if ($request->digit == 2) {
                                        if ($request->digit >  $second_digit) {

                                            $balance->$coinType = $balance->$coinType + $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                            if($coin->rate > 70){
                                                $coin->rate = $coin->rate - 1;
                                                $coin->save();
                                            }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 3) {
                                        if ($request->digit >  $third_digit) {

                                            $balance->$coinType = $balance->$coinType + (($request->stake * 90) / 100);
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 4) {
                                        if ($request->digit >  $four_digit) {

                                            $balance->$coinType = $balance->$coinType + (($request->stake * 70) / 100);
                                            $balance->save();
                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 5) {
                                        if ($request->digit >  $five_digit) {

                                            $balance->$coinType = $balance->$coinType + (($request->stake * 60) / 100);
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 6) {
                                        if ($request->digit >  $six_digit) {

                                            $balance->$coinType = $balance->$coinType + (($request->stake * 50) / 100);
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 7) {
                                        if ($request->digit >  $seven_digit) {

                                            $balance->$coinType = $balance->$coinType + (($request->stake * 35) / 100);
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 8) {
                                        if ($request->digit >  $eight_digit) {

                                            $balance->$coinType = $balance->$coinType + (($request->stake * 20) / 100);
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    } elseif ($request->digit == 9) {
                                        if ($request->digit >  $nine_digit) {

                                            $balance->$coinType = $balance->$coinType + $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        $coin->rate = $coin->rate + 1;
                                        $coin->save();

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "1";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        } else {

                                            $balance->$coinType = $balance->$coinType - $request->stake;
                                            $balance->save();

                                            $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }

                                            $riseFall = new RiseFall();

                                            $riseFall->user_id = $request->user()->id;
                                            $riseFall->stake = $request->stake;
                                            $riseFall->firstDigit = $firstDigit;
                                            $riseFall->second_digit = $second_digit;
                                            $riseFall->third_digit = $third_digit;
                                            $riseFall->four_digit = $four_digit;
                                            $riseFall->five_digit = $five_digit;
                                            $riseFall->six_digit = $six_digit;
                                            $riseFall->seven_digit = $seven_digit;
                                            $riseFall->eight_digit = $eight_digit;
                                            $riseFall->nine_digit = $nine_digit;
                                            $riseFall->ten_digit = $ten_digit;
                                            $riseFall->user_digit = $request->digit;
                                            $riseFall->result = "0";
                                            $riseFall->action = "1";
                                            $riseFall->save();

                                            return response()->json([
                                                'result' => $riseFall->result,
                                                'ten_digit' => $riseFall->ten_digit,
                                                'nine_digit' => $riseFall->nine_digit,
                                                'eight_digit' => $riseFall->eight_digit,
                                                'seven_digit' => $riseFall->seven_digit,
                                                'six_digit' => $riseFall->six_digit,
                                                'five_digit' => $riseFall->five_digit,
                                                'four_digit' => $riseFall->four_digit,
                                                'third_digit' => $riseFall->third_digit,
                                                'second_digit' => $riseFall->second_digit,
                                                'firstDigit' => $riseFall->firstDigit,
                                                'status' => 200,
                                            ]);
                                        }
                                    }
                                } else {
                                    return response()->json([
                                        'status' => 204,
                                        'massage' => "invalid digit",
                                    ]);
                                }
                            } else {
                                return response()->json([
                                    'status' => 204,
                                    'massage' => "Somthing else",
                                ]);
                            }
                        }
                    } else {
                        // low balan
                        return response()->json([
                            'status' => 204,
                            'massage' => "Low Balance",
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 204,
                        'massage' => "Enter valid Coin Type",
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 204,
                    'massage' => "Enter valid digit",
                ]);
            }
        } else {
            return response()->json([
                'status' => 204,
                'massage' => "Enter valid stake",
            ]);
        }
    }
}

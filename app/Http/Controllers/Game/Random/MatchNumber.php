<?php

namespace App\Http\Controllers\Game\Random;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Coin;
use App\Models\MatchNumber as ModelsMatchNumber;
use Illuminate\Http\Request;

class MatchNumber extends Controller
{
    public function matchEnterGame(Request $request)
    {
        if ($request->coinType === "gc" || $request->coinType === "tc") {
            $balance = Balance::where('user_id', $request->user()->id)->first();
            $coinType = $request->coinType;
            if ($balance->$coinType >= $request->stake && $request->stake >= 1) {

                $balance->$coinType = $balance->$coinType - $request->stake;
                $balance->save();

                $systemRandom = random_int(1, 10);

                $matchNumber = new ModelsMatchNumber();
                $matchNumber->user_id = $request->user()->id;
                $matchNumber->stake = $request->stake;
                $matchNumber->coin_type = $request->coinType;
                $matchNumber->system_random = $systemRandom;
                $matchNumber->player_click = 0;
                $matchNumber->save();

                return response()->json([
                    'enterGame' => $matchNumber,
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'massage' => "invalid stake",
                ]);
            }
        } else {
            return response()->json([
                'massage' => "invalid game type",
            ]);
        }
    }

    public function matchPlayer(Request $request)
    {
        $matchNumber = ModelsMatchNumber::where('id', $request->gameId)->first();


        if ($matchNumber->player_click !== 2 && $matchNumber->player_click !== 3 && $matchNumber->player_click == $request->player_click && $matchNumber->user_id == $request->user()->id) {

            $playerRandom = random_int(1, 10);
            if ($playerRandom === $matchNumber->system_random) {

                $coinType = $matchNumber->coin_type;

                $balance = Balance::where('user_id', $request->user()->id)->first();
                $balance->$coinType = $balance->$coinType + ($matchNumber->stake * 2);
                $balance->save();

                $matchNumber->player_random = $playerRandom;
                $matchNumber->player_click = 2;
                $matchNumber->save();

                $coin = Coin::where('name', 'gsg')->first();
                $coin->rate = $coin->rate + 1;
                $coin->save();


                return response()->json([
                    'player' => $matchNumber,
                    'status' => 200,
                ]);
            } else {
                $matchNumber->player_random = $playerRandom;
                $matchNumber->player_click = 1;
                $matchNumber->save();

                return response()->json([
                    'player' => $matchNumber,
                    'status' => 200,
                ]);
            }
        } else {
            return response()->json([
                'status' => 204,
            ]);
        }
    }
    public function matchBot(Request $request)
    {
        $matchNumber = ModelsMatchNumber::where('id', $request->gameId)->first();


        if ($matchNumber->player_click !== 2 && $matchNumber->player_click !== 3 && $matchNumber->player_click == $request->player_click && $matchNumber->user_id == $request->user()->id) {

            $botRandom = random_int(1, 10);
            if ($botRandom === $matchNumber->system_random) {

                $matchNumber->bot_random = $botRandom;
                $matchNumber->player_click = 3;
                $matchNumber->save();

                $coin = Coin::where('name', 'gsg')->first();
                if ($coin->rate > 70) {
                    $coin->rate = $coin->rate - 1;
                    $coin->save();
                }

                return response()->json([
                    'bot' => $matchNumber,
                    'status' => 200,
                ]);
            } else {
                $matchNumber->bot_random = $botRandom;
                $matchNumber->player_click = 0;
                $matchNumber->save();

                return response()->json([
                    'bot' => $matchNumber,
                    'status' => 200,
                ]);
            }
        }
    }

    public function matchResume(Request $request)
    {
        $matchNumber = ModelsMatchNumber::where('id', $request->gameId)->first();

        if ($matchNumber->user_id === $request->user()->id) {
            if ($matchNumber->player_click === 0 || $matchNumber->player_click === 1) {
                $matchNumber->player_click = 0;
                $matchNumber->save();

                return response()->json([
                    'enterGame' => $matchNumber,
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'status' => 204,
                ]);
            }
        } else {
            return response()->json([
                'status' => 204,
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Game\Random;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Coin;
use App\Models\SnakeLadder as ModelsSnakeLadder;
use App\Models\SnakeLadderRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SnakeLadder extends Controller
{
    public function EnterGame(Request $request)
    {
        // check usd
        if ($request->gameType === "usd") {

            $snakeLadderRoom = SnakeLadderRoom::where('player_1', $request->user()->id)->where('status', 0)->where('active', 1)->first();
            // snake ladder room player 1 same id active 1 and status 0 check

            if ($snakeLadderRoom) {
                return response()->json([
                    'roomData' => $snakeLadderRoom,
                    'status' => 200,
                ]);
            } else {
                // snake ladder room player 2 same id active 1 and status 0 check

                $snakeLadderRoom = SnakeLadderRoom::where('player_2', $request->user()->id)->where('status', 0)->where('active', 1)->first();
                if ($snakeLadderRoom) {
                    return response()->json([
                        'roomData' => $snakeLadderRoom,
                        'status' => 200,
                    ]);
                } else {
                    //  valied stake check

                    if ($request->stake === "1" || $request->stake === "5" || $request->stake === "10" || $request->stake === "25" || $request->stake === "100" || $request->stake === "250" || $request->stake === "500") {
                        // balance check
                        $balance = Balance::where('user_id', $request->user()->id)->first();

                        if ($balance->usd >= $request->stake) {
                            // player 1 check same id and active 0
                            $snakeLadderRoom = SnakeLadderRoom::where('player_1', $request->user()->id)->where('active', 0)->first();
                            $player1SameId = $snakeLadderRoom;

                            if ($snakeLadderRoom) {
                                // player 1 drop and update
                                $snakeLadderRoom = SnakeLadderRoom::where('stake', $request->stake)->where('active', 0)->first();
                                if ($snakeLadderRoom) {
                                    $snakeLadderRoom->player_2 = $request->user()->id;
                                    $snakeLadderRoom->active = "1";
                                    $snakeLadderRoom->player_click = "1";
                                    $snakeLadderRoom->save();

                                    DB::table('snake_ladder_rooms')->delete($player1SameId->id);

                                    return response()->json([
                                        'roomData' => $snakeLadderRoom,
                                        'status' => 200,
                                    ]);
                                } else {
                                    $snakeLadderRoom->stake = $request->stake;
                                    $snakeLadderRoom->save();

                                    return response()->json([
                                        'roomData' => $snakeLadderRoom,
                                        'status' => 200,
                                    ]);
                                }
                                // player 1 drop and update end

                            } else {
                                // check same stake and active 0
                                $snakeLadderRoom = SnakeLadderRoom::where('stake', $request->stake)->where('active', 0)->first();
                                if ($snakeLadderRoom) {

                                    $snakeLadderRoom->player_2 = $request->user()->id;
                                    $snakeLadderRoom->active = "1";
                                    $snakeLadderRoom->player_click = "1";
                                    $snakeLadderRoom->save();

                                    return response()->json([
                                        'roomData' => $snakeLadderRoom,
                                        'status' => 200,
                                    ]);
                                } else {
                                    $snakeLadderRoom = new SnakeLadderRoom();

                                    $snakeLadderRoom->player_1 = $request->user()->id;
                                    $snakeLadderRoom->stake = $request->stake;
                                    $snakeLadderRoom->save();

                                    return response()->json([
                                        'roomData' => $snakeLadderRoom,
                                        'status' => 200,
                                    ]);
                                }
                                // check same stake and active 0 end

                            }
                            // player 1 check same id and active 0 end

                        } else {
                            return response()->json([
                                'massage' => "Low Balance",
                                'status' => 204,
                            ]);
                        }
                        // balance check end

                    } else {
                        return response()->json([
                            'massage' => "Not Valid Stake",
                            'status' => 204,
                        ]);
                    }
                    //  valied stake check end
                }
                // snake ladder room player 2 same id active 1 and status 0 check end


            }
            // snake ladder room player 1 same id active 1 and status 0 check end

        } else {
            return response()->json([
                'massage' => "Not Valid game Type",
                'status' => 204,
            ]);
        }
        // check usd end

    }
    public function WaitingRoom(Request $request)
    {
        // fine unknown user
        $snakeLadderRoom = SnakeLadderRoom::where('id', $request->gameId)->where('status', 0)->first();
        if ($snakeLadderRoom->player_1 === $request->user()->id || $snakeLadderRoom->player_2 === $request->user()->id) {

            if ($snakeLadderRoom->active === 1) {
                $unkownPlayer1 = $snakeLadderRoom->player_1;
                $unkownplayer2 = $snakeLadderRoom->player_2;

                if ($unkownPlayer1 === $request->user()->id) {
                    $foriegnPlayer = $unkownplayer2;
                    $foriegnUser = User::where('id', $foriegnPlayer)->first();
                    $playerClick = 1;

                    $token = Str::random(60);

                    $snakeLadderRoom->token = $token;
                    $snakeLadderRoom->save();

                    return response()->json([
                        'token' =>  $token,
                        'player1_random' =>  $snakeLadderRoom->player1_random,
                        'player2_random' =>  $snakeLadderRoom->player2_random,
                        'active' =>  $snakeLadderRoom->active,
                        'gameStatus' =>  $snakeLadderRoom->status,
                        'foriegnPlayer' => $foriegnPlayer,
                        'foriegnUser' => $foriegnUser->firstname,
                        'playerClick' => $playerClick,
                        'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                        'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                        'status' => 200,
                    ]);
                } else {
                    $snakeLadderRoom = SnakeLadderRoom::where('id', $request->gameId)->where('status', 0)->first();
                    $foriegnPlayer = $unkownPlayer1;
                    $foriegnUser = User::where('id', $foriegnPlayer)->first();
                    if ($snakeLadderRoom->player_click === 0) {
                        $playerClick = 1;
                        return response()->json([
                            'player1_random' =>  $snakeLadderRoom->player2_random,
                            'player2_random' =>  $snakeLadderRoom->player1_random,
                            'active' =>  $snakeLadderRoom->active,
                            'gameStatus' =>  $snakeLadderRoom->status,
                            'foriegnPlayer' => $foriegnPlayer,
                            'foriegnUser' => $foriegnUser->firstname,
                            'playerClick' => $playerClick,
                            'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                            'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                            'status' => 200,
                        ]);
                    } else {
                        $playerClick = 0;
                        return response()->json([
                            'player1_random' =>  $snakeLadderRoom->player2_random,
                            'player2_random' =>  $snakeLadderRoom->player1_random,
                            'active' =>  $snakeLadderRoom->active,
                            'gameStatus' =>  $snakeLadderRoom->status,
                            'foriegnPlayer' => $foriegnPlayer,
                            'foriegnUser' => $foriegnUser->firstname,
                            'playerClick' => $playerClick,
                            'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                            'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                            'status' => 200,
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'gameData' =>  $snakeLadderRoom,
                    'status' => 200,
                ]);
            }
        } else {
            return response()->json([
                'massage' => "something error",
                'status' => 204,
            ]);
        }
        // fine unknown user end
    }
    public function PlayerClick(Request $request)
    {
        $snakeLadderRoom = SnakeLadderRoom::where('id', $request->gameId)->where('status', 0)->first();
        if ($snakeLadderRoom->token === $request->token) {
            if ($snakeLadderRoom->player_1 === $request->user()->id) {
                if ($snakeLadderRoom->player1_random === 0) {
                    $player1_random = random_int(1, 6);
                    if ($player1_random === 1) {
                        $snakeLadderRoom->token = "0";
                        $snakeLadderRoom->player1_random = "1";
                        $snakeLadderRoom->player_click = "0";
                        $snakeLadderRoom->player1_random_genarat = $player1_random;
                        $snakeLadderRoom->save();

                        return response()->json([
                            'player1_random' =>  $snakeLadderRoom->player1_random,
                            'player2_random' =>  $snakeLadderRoom->player2_random,
                            'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                            'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                            'status' => 200,
                        ]);
                    } else {
                        $snakeLadderRoom->token = "0";
                        $snakeLadderRoom->player1_random_genarat = $player1_random;
                        $snakeLadderRoom->player_click = "0";
                        $snakeLadderRoom->save();

                        return response()->json([
                            'player1_random' =>  $snakeLadderRoom->player1_random,
                            'player2_random' =>  $snakeLadderRoom->player2_random,
                            'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                            'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                            'status' => 200,
                        ]);
                    }
                } else {
                    $player1_random = random_int(1, 6);
                    $player1_random_genarat = $player1_random;
                    $player1_random_save = $snakeLadderRoom->player1_random + $player1_random;
                    if (($snakeLadderRoom->player1_random + $player1_random) === 2) {
                        $player1_random_save = "23";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 8) {
                        $player1_random_save = "14";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 25) {
                        $player1_random_save = "4";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 26) {
                        $player1_random_save = "35";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 29) {
                        $player1_random_save = "10";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 32) {
                        $player1_random_save = "86";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 33) {
                        $player1_random_save = "27";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 38) {
                        $player1_random_save = "44";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 41) {
                        $player1_random_save = "60";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 42) {
                        $player1_random_save = "22";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 56) {
                        $player1_random_save = "77";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 63) {
                        $player1_random_save = "59";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 64) {
                        $player1_random_save = "37";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 69) {
                        $player1_random_save = "90";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 70) {
                        $player1_random_save = "49";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 79) {
                        $player1_random_save = "81";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 88) {
                        $player1_random_save = "92";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 94) {
                        $player1_random_save = "73";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 96) {
                        $player1_random_save = "47";
                    } elseif (($snakeLadderRoom->player1_random + $player1_random) === 99) {
                        $player1_random_save = "78";
                    }
                    if (($snakeLadderRoom->player1_random + $player1_random) === $snakeLadderRoom->player2_random) {
                        $snakeLadderRoom->player2_random = "0";
                        $snakeLadderRoom->save();
                    }
                    if ($player1_random_save <= 100) {
                        if ($player1_random_save === 100) {
                            $snakeLadderRoom->token = "0";
                            $snakeLadderRoom->player1_random = $player1_random_save;
                            $snakeLadderRoom->player1_random_genarat = $player1_random_genarat;
                            $snakeLadderRoom->player_click = "0";
                            $snakeLadderRoom->status = "1";
                            $snakeLadderRoom->save();

                            return response()->json([
                                'player1_random' =>  $snakeLadderRoom->player1_random,
                                'player2_random' =>  $snakeLadderRoom->player2_random,
                                'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                'status' => 200,
                            ]);
                        } else {
                            $snakeLadderRoom->token = "0";
                            $snakeLadderRoom->player1_random = $player1_random_save;
                            $snakeLadderRoom->player1_random_genarat = $player1_random_genarat;
                            $snakeLadderRoom->player_click = "0";
                            $snakeLadderRoom->save();

                            return response()->json([
                                'player1_random' =>  $snakeLadderRoom->player1_random,
                                'player2_random' =>  $snakeLadderRoom->player2_random,
                                'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                'status' => 200,
                            ]);
                        }
                    } else {
                        $snakeLadderRoom->token = "0";
                        $snakeLadderRoom->player1_random_genarat = $player1_random_genarat;
                        $snakeLadderRoom->player_click = "0";
                        $snakeLadderRoom->save();

                        return response()->json([
                            'player1_random' =>  $snakeLadderRoom->player1_random,
                            'player2_random' =>  $snakeLadderRoom->player2_random,
                            'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                            'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                            'status' => 200,
                        ]);
                    }
                }
            } else {
                if ($snakeLadderRoom->player_2 === $request->user()->id) {
                    if ($snakeLadderRoom->player2_random === 0) {
                        $player2_random = random_int(1, 6);
                        if ($player2_random === 1) {
                            $snakeLadderRoom->token = "0";
                            $snakeLadderRoom->player2_random = "1";
                            $snakeLadderRoom->player_click = "1";
                            $snakeLadderRoom->player2_random_genarat = $player2_random;
                            $snakeLadderRoom->save();

                            return response()->json([
                                'player1_random' =>  $snakeLadderRoom->player2_random,
                                'player2_random' =>  $snakeLadderRoom->player1_random,
                                'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                'status' => 200,
                            ]);
                        } else {
                            $snakeLadderRoom->token = "0";
                            $snakeLadderRoom->player_click = "1";
                            $snakeLadderRoom->player2_random_genarat = $player2_random;
                            $snakeLadderRoom->save();

                            return response()->json([
                                'player1_random' =>  $snakeLadderRoom->player2_random,
                                'player2_random' =>  $snakeLadderRoom->player1_random,
                                'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                'status' => 200,
                            ]);
                        }
                    } else {
                        $player2_random = random_int(1, 6);
                        $player2_random_genarat = $player2_random;
                        $player2_random_save = $snakeLadderRoom->player2_random + $player2_random;
                        if (($snakeLadderRoom->player2_random + $player2_random) === 2) {
                            $player2_random_save = "23";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 8) {
                            $player2_random_save = "14";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 25) {
                            $player2_random_save = "4";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 26) {
                            $player2_random_save = "35";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 29) {
                            $player2_random_save = "10";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 32) {
                            $player2_random_save = "86";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 33) {
                            $player2_random_save = "27";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 38) {
                            $player2_random_save = "44";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 41) {
                            $player2_random_save = "60";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 42) {
                            $player2_random_save = "22";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 56) {
                            $player2_random_save = "77";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 63) {
                            $player2_random_save = "59";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 64) {
                            $player2_random_save = "37";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 69) {
                            $player2_random_save = "90";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 70) {
                            $player2_random_save = "49";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 79) {
                            $player2_random_save = "81";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 88) {
                            $player2_random_save = "92";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 94) {
                            $player2_random_save = "73";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 96) {
                            $player2_random_save = "47";
                        } elseif (($snakeLadderRoom->player2_random + $player2_random) === 99) {
                            $player2_random_save = "78";
                        }
                        if (($snakeLadderRoom->player2_random + $player2_random) === $snakeLadderRoom->player1_random) {
                            $snakeLadderRoom->player1_random = "0";
                            $snakeLadderRoom->save();
                        }
                        if ($player2_random_save <= 100) {
                            if ($player2_random_save === 100) {
                                $snakeLadderRoom->token = "0";
                                $snakeLadderRoom->player2_random = $player2_random_save;
                                $snakeLadderRoom->player2_random_genarat = $player2_random_genarat;
                                $snakeLadderRoom->player_click = "1";
                                $snakeLadderRoom->status = "1";
                                $snakeLadderRoom->save();

                                return response()->json([
                                    'player1_random' =>  $snakeLadderRoom->player2_random,
                                    'player2_random' =>  $snakeLadderRoom->player1_random,
                                    'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                    'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                    'status' => 200,
                                ]);
                            } else {
                                $snakeLadderRoom->token = "0";
                                $snakeLadderRoom->player2_random = $player2_random_save;
                                $snakeLadderRoom->player2_random_genarat = $player2_random_genarat;
                                $snakeLadderRoom->player_click = "1";
                                $snakeLadderRoom->save();

                                return response()->json([
                                    'player1_random' =>  $snakeLadderRoom->player2_random,
                                    'player2_random' =>  $snakeLadderRoom->player1_random,
                                    'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                    'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                    'status' => 200,
                                ]);
                            }
                        } else {
                            $snakeLadderRoom->token = "0";
                            $snakeLadderRoom->player2_random_genarat = $player2_random_genarat;
                            $snakeLadderRoom->player_click = "1";
                            $snakeLadderRoom->save();

                            return response()->json([
                                'player1_random' =>  $snakeLadderRoom->player2_random,
                                'player2_random' =>  $snakeLadderRoom->player1_random,
                                'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                                'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                                'status' => 200,
                            ]);
                        }
                    }
                }
            }
        } else {
            return response()->json([
                'massage' => 'somthing else',
            ]);
        }
    }
    public function PlayerWaiting(Request $request)
    {
        $snakeLadderRoom = SnakeLadderRoom::where('id', $request->gameId)->where('status', 0)->first();
        if (!$snakeLadderRoom) {
            $snakeLadderRoom = SnakeLadderRoom::where('id', $request->gameId)->where('status', 1)->first();
            if ($snakeLadderRoom->player_1 === $request->user()->id) {
                return response()->json([
                    'player1_random' =>  $snakeLadderRoom->player1_random,
                    'player2_random' =>  $snakeLadderRoom->player2_random,
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'player1_random' =>  $snakeLadderRoom->player2_random,
                    'player2_random' =>  $snakeLadderRoom->player1_random,
                    'status' => 200,
                ]);
            }
        }
        if ($snakeLadderRoom->player_1 === $request->user()->id) {
            if ($snakeLadderRoom->player_click === 1) {

                $token = Str::random(60);
                $snakeLadderRoom->token = $token;
                $snakeLadderRoom->save();

                return response()->json([
                    'token' =>  $snakeLadderRoom->token,
                    'player1_random' =>  $snakeLadderRoom->player1_random,
                    'player2_random' =>  $snakeLadderRoom->player2_random,
                    'active' =>  $snakeLadderRoom->active,
                    'playerClick' => $snakeLadderRoom->player_click,
                    'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                    'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'player1_random' =>  $snakeLadderRoom->player1_random,
                    'player2_random' =>  $snakeLadderRoom->player2_random,
                    'active' =>  $snakeLadderRoom->active,
                    'playerClick' => $snakeLadderRoom->player_click,
                    'player1_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                    'player2_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                    'status' => 200,
                ]);
            }
        } else {
            if ($snakeLadderRoom->player_2 === $request->user()->id) {
                if ($snakeLadderRoom->player_click === 1) {

                    return response()->json([
                        'player1_random' =>  $snakeLadderRoom->player2_random,
                        'player2_random' =>  $snakeLadderRoom->player1_random,
                        'playerClick' => "0",
                        'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                        'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                        'status' => 200,
                        'fuck' => 200,
                    ]);
                } else {
                    return response()->json([
                        'player1_random' =>  $snakeLadderRoom->player2_random,
                        'player2_random' =>  $snakeLadderRoom->player1_random,
                        'active' =>  $snakeLadderRoom->active,
                        'playerClick' => "1",
                        'player1_random_genarat' =>  $snakeLadderRoom->player2_random_genarat,
                        'player2_random_genarat' =>  $snakeLadderRoom->player1_random_genarat,
                        'status' => 200,
                        'suck' => 200,
                    ]);
                }
            }
        }
    }

    public function snakeLadderEnterSystem(Request $request)
    {
        $snakeladder = ModelsSnakeLadder::where('user_id', $request->user()->id)
            ->where('result', '0')
            ->where('game_type', $request->gameType)
            ->first();
        if ($snakeladder) {
            return response()->json([
                'id' =>  $snakeladder->id,
                'game_type' =>  $snakeladder->game_type,
                'stake' =>  $snakeladder->stake,
                'player' =>  $snakeladder->player,
                'bot' =>  $snakeladder->bot,
                'player_random' =>  $snakeladder->player_random,
                'bot_random' =>  $snakeladder->bot_random,
                'active' =>  $snakeladder->active,
                'result' =>  $snakeladder->result,
                'status' => 200,
                'resume' => 1,

            ]);
        } else {
            $gameType = $request->gameType;
            $balance = Balance::where('user_id', $request->user()->id)->first();
            if ($balance->$gameType >= $request->stake) {
                if ($gameType == "gc" || $gameType == "tc") {
                    $balance->$gameType = $balance->$gameType - $request->stake;
                    $balance->save();

                    $snakeladder = new ModelsSnakeLadder();
                    $snakeladder->user_id = $request->user()->id;
                    $snakeladder->game_type = $request->gameType;
                    $snakeladder->stake = $request->stake;
                    $snakeladder->player = "0";
                    $snakeladder->bot = "0";
                    $snakeladder->player_random = "0";
                    $snakeladder->bot_random = "0";
                    $snakeladder->active = "1";
                    $snakeladder->result = "0";
                    $snakeladder->save();

                    return response()->json([
                        'id' =>  $snakeladder->id,
                        'game_type' =>  $snakeladder->game_type,
                        'stake' =>  $snakeladder->stake,
                        'player' =>  $snakeladder->player,
                        'bot' =>  $snakeladder->bot,
                        'player_random' =>  $snakeladder->player_random,
                        'bot_random' =>  $snakeladder->bot_random,
                        'active' =>  $snakeladder->active,
                        'result' =>  $snakeladder->result,
                        'status' => 200,
                        'resume' => 0,
                    ]);
                } else {
                    return response()->json([
                        'status' => 204,
                        'massage' => "invalid stake",

                    ]);
                }
            } else {
                return response()->json([
                    'status' => 204,
                    'massage' => "Low Balance",

                ]);
            }
        }
    }
    public function snakeLadderEnterSystemResumCansle(Request $request)
    {
        $snakeladder = ModelsSnakeLadder::where('id', $request->gameId)
            ->where('user_id', $request->user()->id)
            ->where('result', '0')
            ->update(['result' => '3']);
        if ($snakeladder) {
            $gameType = $request->gameType;
            $balance = Balance::where('user_id', $request->user()->id)->first();
            if ($balance->$gameType >= $request->stake) {
                if ($gameType == "gc" || $gameType == "tc") {
                    $balance->$gameType = $balance->$gameType - $request->stake;
                    $balance->save();

                    $snakeladder = new ModelsSnakeLadder();
                    $snakeladder->user_id = $request->user()->id;
                    $snakeladder->game_type = $request->gameType;
                    $snakeladder->stake = $request->stake;
                    $snakeladder->player = "0";
                    $snakeladder->bot = "0";
                    $snakeladder->player_random = "0";
                    $snakeladder->bot_random = "0";
                    $snakeladder->active = "1";
                    $snakeladder->result = "0";
                    $snakeladder->save();

                    return response()->json([
                        'id' =>  $snakeladder->id,
                        'game_type' =>  $snakeladder->game_type,
                        'stake' =>  $snakeladder->stake,
                        'player' =>  $snakeladder->player,
                        'bot' =>  $snakeladder->bot,
                        'player_random' =>  $snakeladder->player_random,
                        'bot_random' =>  $snakeladder->bot_random,
                        'active' =>  $snakeladder->active,
                        'result' =>  $snakeladder->result,
                        'status' => 200,
                        'resume' => 0,
                    ]);
                } else {
                    return response()->json([
                        'status' => 204,
                        'massage' => "invalid stake",

                    ]);
                }
            } else {
                return response()->json([
                    'status' => 204,
                    'massage' => "Low Balance",

                ]);
            }
        } else {
            return response()->json([
                'status' => 204,
                'massage' => "somthing else",
            ]);
        }
    }
    public function snakeLadderResumeBot(Request $request)
    {
        $snakeladder = ModelsSnakeLadder::where('id', $request->gameId)
            ->where('user_id', $request->user()->id)
            ->where('result', "0")
            ->where('active', "0")->first();
        if ($snakeladder) {

            $botRandom = random_int(1, 6);

            $oldBot = $snakeladder->bot;
            $saveBot = $snakeladder->bot + $botRandom;
            if ($saveBot === 2) {
                $saveBot = "23";
            } elseif ($saveBot === 8) {
                $saveBot = "14";
            } elseif ($saveBot === 25) {
                $saveBot = "4";
            } elseif ($saveBot === 26) {
                $saveBot = "35";
            } elseif ($saveBot === 29) {
                $saveBot = "10";
            } elseif ($saveBot === 32) {
                $saveBot = "86";
            } elseif ($saveBot === 33) {
                $saveBot = "27";
            } elseif ($saveBot === 38) {
                $saveBot = "44";
            } elseif ($saveBot === 41) {
                $saveBot = "60";
            } elseif ($saveBot === 42) {
                $saveBot = "22";
            } elseif ($saveBot === 56) {
                $saveBot = "77";
            } elseif ($saveBot === 63) {
                $saveBot = "59";
            } elseif ($saveBot === 64) {
                $saveBot = "37";
            } elseif ($saveBot === 69) {
                $saveBot = "90";
            } elseif ($saveBot === 70) {
                $saveBot = "49";
            } elseif ($saveBot === 79) {
                $saveBot = "81";
            } elseif ($saveBot === 88) {
                $saveBot = "92";
            } elseif ($saveBot === 94) {
                $saveBot = "73";
            } elseif ($saveBot === 96) {
                $saveBot = "47";
            } elseif ($saveBot === 99) {
                $saveBot = "78";
            }

            if ($snakeladder->bot === 0) {
                if ($botRandom === 1) {
                    if (1 === $snakeladder->player) {
                        $snakeladder->bot_random = $botRandom;
                        $snakeladder->player = "0";
                        $snakeladder->bot = "1";
                        $snakeladder->active = "1";
                        $snakeladder->save();

                        return response()->json([
                            'player' =>  $snakeladder->player,
                            'oldBot' =>  $oldBot,
                            'bot' =>  $snakeladder->bot,
                            'player_random' =>  $snakeladder->player_random,
                            'bot_random' =>  $snakeladder->bot_random,
                            'active' =>  $snakeladder->active,
                            'result' =>  $snakeladder->result,
                            'status' => 200,
                        ]);
                    } else {
                        $snakeladder->bot_random = $botRandom;
                        $snakeladder->bot = "1";
                        $snakeladder->active = "1";
                        $snakeladder->save();

                        return response()->json([
                            'player' =>  $snakeladder->player,
                            'oldBot' =>  $oldBot,
                            'bot' =>  $snakeladder->bot,
                            'player_random' =>  $snakeladder->player_random,
                            'bot_random' =>  $snakeladder->bot_random,
                            'active' =>  $snakeladder->active,
                            'result' =>  $snakeladder->result,
                            'status' => 200,
                        ]);
                    }
                } else {
                    $snakeladder->bot_random = $botRandom;
                    $snakeladder->active = "1";
                    $snakeladder->save();

                    return response()->json([
                        'player' =>  $snakeladder->player,
                        'oldBot' =>  $oldBot,
                        'bot' =>  $snakeladder->bot,
                        'player_random' =>  $snakeladder->player_random,
                        'bot_random' =>  $snakeladder->bot_random,
                        'active' =>  $snakeladder->active,
                        'result' =>  $snakeladder->result,
                        'status' => 200,
                    ]);
                }
            } else {
                if (($snakeladder->bot + $botRandom) > 100) {
                    $snakeladder->bot_random = $botRandom;
                    $snakeladder->active = "1";
                    $snakeladder->save();

                    return response()->json([
                        'player' =>  $snakeladder->player,
                        'oldBot' =>  $oldBot,
                        'bot' =>  $snakeladder->bot,
                        'player_random' =>  $snakeladder->player_random,
                        'bot_random' =>  $snakeladder->bot_random,
                        'active' =>  $snakeladder->active,
                        'result' =>  $snakeladder->result,
                        'status' => 200,
                    ]);
                } else {
                    if (($snakeladder->bot + $botRandom) === 100) {

                        $snakeladder->bot = $saveBot;
                        $snakeladder->bot_random = $botRandom;
                        $snakeladder->active = "0";
                        $snakeladder->result = "2";
                        $snakeladder->save();

                        $coin = Coin::where('name', 'gsg')->first();
                                        if($coin->rate > 70){
                                            $coin->rate = $coin->rate - 1;
                                            $coin->save();
                                        }


                        return response()->json([
                            'player' =>  $snakeladder->player,
                            'oldBot' =>  $oldBot,
                            'bot' =>  $snakeladder->bot,
                            'player_random' =>  $snakeladder->player_random,
                            'bot_random' =>  $snakeladder->bot_random,
                            'active' =>  $snakeladder->active,
                            'result' =>  $snakeladder->result,
                            'status' => 200,
                        ]);
                    } else {
                        if (($snakeladder->bot + $botRandom) === $snakeladder->player) {
                            $snakeladder->bot = $saveBot;
                            $snakeladder->player = "0";
                            $snakeladder->bot_random = $botRandom;
                            $snakeladder->active = "1";
                            $snakeladder->save();

                            return response()->json([
                                'player' =>  $snakeladder->player,
                                'oldBot' =>  $oldBot,
                                'bot' =>  $snakeladder->bot,
                                'player_random' =>  $snakeladder->player_random,
                                'bot_random' =>  $snakeladder->bot_random,
                                'active' =>  $snakeladder->active,
                                'result' =>  $snakeladder->result,
                                'status' => 200,
                            ]);
                        } else {
                            $snakeladder->bot = $saveBot;
                            $snakeladder->bot_random = $botRandom;
                            $snakeladder->active = "1";
                            $snakeladder->save();

                            return response()->json([
                                'player' =>  $snakeladder->player,
                                'oldBot' =>  $oldBot,
                                'bot' =>  $snakeladder->bot,
                                'player_random' =>  $snakeladder->player_random,
                                'bot_random' =>  $snakeladder->bot_random,
                                'active' =>  $snakeladder->active,
                                'result' =>  $snakeladder->result,
                                'status' => 200,
                            ]);
                        }
                    }
                }
            }
        } else {
            return response()->json([
                'massage' => "Somthing Else",
                'status' => 204,
            ]);
        }
    }
    public function snakeLadderPlayerClickSystem(Request $request)
    {
        $snakeladder = ModelsSnakeLadder::where('id', $request->gameId)
            ->where('user_id', $request->user()->id)
            ->where('result', "0")
            ->where('active', "1")->first();
        $playerOldRandom = $snakeladder->player;

        if ($snakeladder) {
            $playerRandom = random_int(1, 6);
            $savePlayer = $snakeladder->player + $playerRandom;
            if ($savePlayer === 2) {
                $savePlayer = "23";
            } elseif ($savePlayer === 8) {
                $savePlayer = "14";
            } elseif ($savePlayer === 25) {
                $savePlayer = "4";
            } elseif ($savePlayer === 26) {
                $savePlayer = "35";
            } elseif ($savePlayer === 29) {
                $savePlayer = "10";
            } elseif ($savePlayer === 32) {
                $savePlayer = "86";
            } elseif ($savePlayer === 33) {
                $savePlayer = "27";
            } elseif ($savePlayer === 38) {
                $savePlayer = "44";
            } elseif ($savePlayer === 41) {
                $savePlayer = "60";
            } elseif ($savePlayer === 42) {
                $savePlayer = "22";
            } elseif ($savePlayer === 56) {
                $savePlayer = "77";
            } elseif ($savePlayer === 63) {
                $savePlayer = "59";
            } elseif ($savePlayer === 64) {
                $savePlayer = "37";
            } elseif ($savePlayer === 69) {
                $savePlayer = "90";
            } elseif ($savePlayer === 70) {
                $savePlayer = "49";
            } elseif ($savePlayer === 79) {
                $savePlayer = "81";
            } elseif ($savePlayer === 88) {
                $savePlayer = "92";
            } elseif ($savePlayer === 94) {
                $savePlayer = "73";
            } elseif ($savePlayer === 96) {
                $savePlayer = "47";
            } elseif ($savePlayer === 99) {
                $savePlayer = "78";
            }

            if ($snakeladder->player === 0) {
                if ($playerRandom === 1) {
                    if (1 === $snakeladder->bot) {
                        $snakeladder->player_random = $playerRandom;
                        $snakeladder->player = "1";
                        $snakeladder->bot = "0";
                        $snakeladder->active = "0";
                        $snakeladder->save();

                        return response()->json([
                            'oldPlayer' =>   $playerOldRandom,
                            'player' =>  $snakeladder->player,
                            'bot' =>  $snakeladder->bot,
                            'player_random' =>  $snakeladder->player_random,
                            'bot_random' =>  $snakeladder->bot_random,
                            'active' =>  $snakeladder->active,
                            'result' =>  $snakeladder->result,
                            'status' => 200,
                        ]);
                    } else {
                        $snakeladder->player_random = $playerRandom;
                        $snakeladder->player = "1";
                        $snakeladder->active = "0";
                        $snakeladder->save();

                        return response()->json([
                            'oldPlayer' =>   $playerOldRandom,
                            'player' =>  $snakeladder->player,
                            'bot' =>  $snakeladder->bot,
                            'player_random' =>  $snakeladder->player_random,
                            'bot_random' =>  $snakeladder->bot_random,
                            'active' =>  $snakeladder->active,
                            'result' =>  $snakeladder->result,
                            'status' => 200,
                        ]);
                    }
                } else {
                    $snakeladder->player_random = $playerRandom;
                    $snakeladder->active = "0";
                    $snakeladder->save();

                    return response()->json([
                        'oldPlayer' =>   $playerOldRandom,
                        'player' =>  $snakeladder->player,
                        'bot' =>  $snakeladder->bot,
                        'player_random' =>  $snakeladder->player_random,
                        'bot_random' =>  $snakeladder->bot_random,
                        'active' =>  $snakeladder->active,
                        'result' =>  $snakeladder->result,
                        'status' => 200,
                    ]);
                }
            } else {
                if (($snakeladder->player + $playerRandom) > 100) {
                    $snakeladder->player_random = $playerRandom;
                    $snakeladder->active = "0";
                    $snakeladder->save();

                    return response()->json([
                        'oldPlayer' =>   $playerOldRandom,
                        'player' =>  $snakeladder->player,
                        'bot' =>  $snakeladder->bot,
                        'player_random' =>  $snakeladder->player_random,
                        'bot_random' =>  $snakeladder->bot_random,
                        'active' =>  $snakeladder->active,
                        'result' =>  $snakeladder->result,
                        'status' => 200,
                    ]);
                } else {
                    if (($snakeladder->player + $playerRandom) === 100) {

                        $balance = Balance::where('user_id', $request->user()->id)->first();
                        $gameType = $snakeladder->game_type;
                        $balance->$gameType = $balance->$gameType + ($snakeladder->stake * 2);
                        $balance->save();

                        $snakeladder->player = $savePlayer;
                        $snakeladder->player_random = $playerRandom;
                        $snakeladder->active = "0";
                        $snakeladder->result = "1";
                        $snakeladder->save();

                        $coin = Coin::where('name', 'gsg')->first();
                        $coin->rate = $coin->rate + 1;
                        $coin->save();

                        return response()->json([
                            'oldPlayer' =>   $playerOldRandom,
                            'player' =>  $snakeladder->player,
                            'bot' =>  $snakeladder->bot,
                            'player_random' =>  $snakeladder->player_random,
                            'bot_random' =>  $snakeladder->bot_random,
                            'active' =>  $snakeladder->active,
                            'result' =>  $snakeladder->result,
                            'status' => 200,
                        ]);
                    } else {
                        if (($snakeladder->player + $playerRandom) === $snakeladder->bot) {
                            $snakeladder->player = $savePlayer;
                            $snakeladder->bot = "0";
                            $snakeladder->player_random = $playerRandom;
                            $snakeladder->active = "0";
                            $snakeladder->save();

                            return response()->json([
                                'oldPlayer' =>   $playerOldRandom,
                                'player' =>  $snakeladder->player,
                                'bot' =>  $snakeladder->bot,
                                'player_random' =>  $snakeladder->player_random,
                                'bot_random' =>  $snakeladder->bot_random,
                                'active' =>  $snakeladder->active,
                                'result' =>  $snakeladder->result,
                                'status' => 200,
                            ]);
                        } else {
                            $snakeladder->player = $savePlayer;
                            $snakeladder->player_random = $playerRandom;
                            $snakeladder->active = "0";
                            $snakeladder->save();

                            return response()->json([
                                'oldPlayer' =>   $playerOldRandom,
                                'player' =>  $snakeladder->player,
                                'bot' =>  $snakeladder->bot,
                                'player_random' =>  $snakeladder->player_random,
                                'bot_random' =>  $snakeladder->bot_random,
                                'active' =>  $snakeladder->active,
                                'result' =>  $snakeladder->result,
                                'status' => 200,
                            ]);
                        }
                    }
                }
            }
        } else {
            return response()->json([
                'massage' => "Somthing else",
                'status' => 204,
            ]);
        }
    }
}

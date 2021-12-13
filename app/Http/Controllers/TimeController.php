<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function Time()
    {
        $nowtime = Carbon::now('Asia/Colombo');
        return response()->json([
            'time' => $nowtime,
        ]);
    }
}

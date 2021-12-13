<?php

namespace App\Http\Controllers\Gsg;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use Illuminate\Http\Request;

class GsgController extends Controller
{
    public function getGSG()
    {
        $gsg = Coin::where('name','gsg')->first();
        return response([
            'gsgRate'=>$gsg->rate,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->email){
            if($request->feedback){
                $feedback = new FeedBack();
                $feedback->email = $request->email;
                $feedback->feedback = $request->feedback;
                $feedback->save();

                if($feedback){
                    return response()->json([
                        'massage' => "Saved Feedback",
                        'status' => 200,
                    ]);
                }else{
                    return response()->json([
                        'massage' => "somthing else",
                        'status' => 204,
                    ]);
                }


            }else{
                return response()->json([
                    'massage' => "massage required",
                    'status' => 204,
                ]);
            }
        }else{
            return response()->json([
                'massage' => "email required",
                'status' => 204,
            ]);
        }

    }
}

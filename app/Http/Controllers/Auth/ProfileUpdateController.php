<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request)
    {
        if($request->firstname){
            $user = User::where('id', $request->user()->id)->first();
            if($user){
                $user->firstname = $request->firstname;
                $user->save();

                return response()->json([
                    'massage' => "Saved",
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'massage' => "Somthing else",
                    'status' => 204,
                ]);
            }
        }
        elseif($request->lastname){

            $user = User::where('id', $request->user()->id)->first();
            if($user){
                $user->lastname = $request->lastname;
                $user->save();

                return response()->json([
                    'massage' => "Saved",
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'massage' => "Somthing else",
                    'status' => 204,
                ]);
            }
        }
        elseif($request->email){

            $user = User::where('id', $request->user()->id)->first();
            if($user){
                $user->email = $request->email;
                $user->save();

                return response()->json([
                    'massage' => "Saved",
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'massage' => "Somthing else",
                    'status' => 204,
                ]);
            }
        }
        elseif($request->country){

            $user = User::where('id', $request->user()->id)->first();
            if($user){
                $user->country = $request->country;
                $user->save();

                return response()->json([
                    'massage' => "Saved",
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'massage' => "Somthing else",
                    'status' => 204,
                ]);
            }
        }
        elseif($request->city){

            $user = User::where('id', $request->user()->id)->first();
            if($user){
                $user->city = $request->city;
                $user->save();

                return response()->json([
                    'massage' => "Saved",
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'massage' => "Somthing else",
                    'status' => 204,
                ]);
            }
        }
        elseif($request->mobile){

            $user = User::where('id', $request->user()->id)->first();
            if($user){
                $user->mobile = $request->mobile;
                $user->save();

                return response()->json([
                    'massage' => "Saved",
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'massage' => "Somthing else",
                    'status' => 204,
                ]);
            }
        }
    }
}

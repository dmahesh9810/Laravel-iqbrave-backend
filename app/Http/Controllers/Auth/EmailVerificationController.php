<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {

            return response()->json([
                'message' => 'Already Verified',
            ]);
        }

        $request->user()->SendEmailVerificationNotification();
        return response()->json([
            'message' => 'verification-link-send',
            'status' => 200
        ]);
    }

    public function verify(EmailVerificationRequest $request)
    {
        if($request->user()->hasVerifiedEmail()){
            // return [
            //     'message' => 'Email already verified'
            // ];
            return response()->json([
                'message' => 'Email already verified',
            ]);
        }

        if($request->user()->markEmailAsVerified()){
            event(new Verified($request->user()));
        }

        return response()->json([
            'message' => 'Email has been verified',
            'status' => 200
        ]);

        // return [
        //     'message' => 'Email has been verified'
        // ];
    }

    public function emailCheck()
    {
        return response()->json([
            'message' => 'Verified',
            'status' => 200
        ]);
    }
}

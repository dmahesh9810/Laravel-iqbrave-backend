<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'firstname' => str_replace(' ', '', strtolower($request->get('firstname'))),
            'lastname' => str_replace(' ', '', strtolower($request->get('lastname'))),
            'country' => str_replace(' ', '', strtolower($request->get('country'))),
            'city' => str_replace(' ', '', strtolower($request->get('city'))),
            'email' => strtolower($request->get('email')),
            'mobile' => $request->get('mobile'),
            'password' => Hash::make($request->get('password'))

        ]);

        $balance = new Balance();
        

        $balance->user_id = $user->id;
        $balance->save();

        return response()->json($user);
    }
}

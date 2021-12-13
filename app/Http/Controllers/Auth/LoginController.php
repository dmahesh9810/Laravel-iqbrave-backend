<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $role = ( implode(', ', $user->roles->pluck('name')->toArray()));

        $token = $user->createToken('accessToken')->plainTextToken;

        return response()->json([
            'accessToken' => $token,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'mobile' => $user->mobile,
            'email' => $user->email,
            'id' => $user->id,
            'roles' => $role,
        ]);
    }
}

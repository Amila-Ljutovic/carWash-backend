<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $data = $request->validated();

        $user = User::where('email' , $data['email'])->first();

        if(Hash::check($data['password'], $user->getAuthPassword())) {
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }

        return $request->validated();
    }

    public function me() {
        return json_decode(auth()->user());
    }
}

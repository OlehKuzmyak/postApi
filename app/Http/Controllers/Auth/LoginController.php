<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return Response::json(Auth::user()->api_token, 200);
        } else {
            return Response::json('email or password is invalid', 422);
        }
    }
}

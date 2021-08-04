<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Response;

class LogoutController extends Controller
{
    public function logout(Authenticatable $user)
    {
        $user->api_token = Str::random(60);
        $user->save();

        return Response::json('succes',200);
    }
}

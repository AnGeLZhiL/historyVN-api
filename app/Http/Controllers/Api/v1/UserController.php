<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request){
        User::create(
            [
                "last_name" => $request->last_name,
                "first_name" => $request->first_name,
                "midlle_name" => $request->midlle_name,
                "login" => $request->login,
                "password" => $request->password,
            ]
        );

        return response()
            ->json(["status" => true])
            ->setStatusCode(201, "Accout registered");
    }
}

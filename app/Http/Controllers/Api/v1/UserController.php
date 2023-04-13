<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Регистрация пользователя через API
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterUserRequest $request){
        /*
         * Добавление пользователя в БД
         */

        User::create(
            [
                "last_name" => $request->last_name,
                "first_name" => $request->first_name,
                "midlle_name" => $request->midlle_name,
                "login" => $request->login,
                "password" => $request->password,
            ]
        );

        /*
         * Возврат ответа JSON
         */

        return response()
            ->json(["status" => true])
            ->setStatusCode(201, "Accout registered");
    }

    /**
     * Авторизация пользователя через API
     * @param LoginUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginUserRequest $request){

        /*
         * Поиск пользователя с заданным логином
         */

        $user = User::where('login', $request->login)->first();

        /*
         * Проверка на существование пользователя с заданным логином
         * Проверка на соответствие паролей
         */

        if ($user && Hash::check($request->password, $user->password)){

            $user->api_token = Str::random(200);
            $user->save();

            return response()
                ->json([
                    "status" => true,
                    "user" => $user
                ])
                ->setStatusCode(200, "Authenticated");
        } else {
            return response()
                ->json([
                    "status" => false
                ],401);
        }
    }
}

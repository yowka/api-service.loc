<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Регистрация пользователя
    public function register(Request $request){
        // Залучение записи с ролью пользователь
        $role_user = Role::where('code','user')->first();

        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => $request->password,
            'api_token' => null,
            'role_id' => $role_user->id,
        ]);

        $user->api_token = Hash::make(Str::random(60));
        $user->save();

        return response()->json([
            'user' => $user,
            'token' => $user->api_token,
        ])->setStatusCode(201);

    }

    // Аутентификация
    public function login(Request $request){
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json("Неверный логин или пароль")->setStatusCode(401);
        }
        $user = Auth::user();
        $user->api_token = Hash::make(Str::random(60));
        $user->save();
        return response()->json([
            'token' => $user->api_token,
        ])->setStatusCode(201);
    }

    // Выход
    public function logout(Request $request){
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return response()->json(["message" => "Вы вышли из системы"])->setStatusCode(200);
    }

}

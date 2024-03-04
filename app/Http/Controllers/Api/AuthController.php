<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            $token = $user->createToken('auth_token')->plainTextToken;
            
            $message = 'Tus datos se han registrado exitosamente!';
            
            return response()->json(['token' => $token, 'message' => $message], 200);

    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Nombre de usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        $message = 'Has iniciado sesión correctamente! ¡Bienvenid@!';

        return response()->json(['token' => $token, 'message' => $message], 200);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => true, 'msg' => 'Has cerrado sesión correctamente'], 200);
    }
}



   

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $credencials = $request->all(['email', 'password']);
        $token = auth('api')->attempt($credencials);
        if($token) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['erro' => 'Invalid User'], 403);
        }
        return 'login';
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout Success!']);
    }

    public function refresh() {
        $token = auth('api')->refresh(); 
        return response()->json(['token' => $token]);
    }

    public function me() {
        return response()->json(auth()->user());
    }
}

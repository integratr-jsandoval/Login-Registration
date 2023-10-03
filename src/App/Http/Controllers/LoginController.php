<?php

namespace MicroService\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MicroService\App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            $errors['errors'][] = [
                'detail' => 'These credentials do not match our records.'
            ];
            return response()->json($errors, 401);
        }

        return array(
            "status" => "success",
            'desc' => 'Login Successfully!'
        );
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}

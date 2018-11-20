<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller 
{
    public function login(Request $request)
    {
        $validator = $this->validateLogin($request->all());
        if ($validator->fails()) {
            response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $user = User::where('email', $request['email'])->first();
        if (!$user) {
            return response()->json(['status' => false, 'errors' => 'Tai khoan khong ton tai']);
        }
        if (!Hash::check($request['password'], $user->password)) {
            return response()->json(['status' => false, 'errors' => 'Mat khau khong dung']);
        }
        return response()->json($user);
    }

    private function validateLogin(array $request)
    {
        return Validator::make($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }
}
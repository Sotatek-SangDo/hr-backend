<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
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

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['status' => true]);
    }

    private function validateLogin(array $request)
    {
        return Validator::make($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    public function authenticated(Request $request)
    {
        $user = Auth::user();
        return response()->json(json_decode($user));
    }

    public function store(Request $request)
    {
        $result = $this->authService->createUser($request);

        return response()->json($result);
    }

    public function forgotPassword(Request $request)
    {
        $result = $this->authService->forgotPassword($request);

        return response()->json($result);
    }

    public function updateUser(Request $request)
    {
        $result = $this->authService->updateUser($request);

        return response()->json($result);
    }

    public function changePassword(Request $request)
    {
        $result = $this->authService->changePassword($request);

        return response()->json($result);
    }

    public function deleteUser(Request $request)
    {
        $result = $this->authService->deleteUser($request);

        return response()->json($result);
    }

    public function resetPassword(Request $request)
    {
        $result = $this->authService->resetPassword($request);

        return response()->json($result);
    }
}

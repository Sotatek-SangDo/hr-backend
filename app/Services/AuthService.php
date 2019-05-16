<?php

namespace App\Services;

use App\BaseRequest;
use App\Consts;

class AuthService
{
    private $base;

    public function __construct(BaseRequest $base)
    {
        $this->base = $base;
    }

    public function createUser($request)
    {
        $headers = $this->jsonHeader();
        $params = $this->getCreateParams($request);
        $endpoint = Consts::AUTH_API_CREATE_USER;
        $this->base->request($endpoint, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }

    public function forgotPassword($request)
    {
        $headers = $this->jsonHeader();
        $params = $request->only('email');
        $endpoint = Consts::AUTH_API_FORGOT_PASS;

        $this->base->request($endpoint, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }

    public function updateUser($request)
    {
        $headers = $this->jsonHeader();
        $params = $request->only(['email', 'lastname', 'firstname', 'role', 'phone']);
        $endpoint = Consts::AUTH_API_UPDATE_USER;

        $this->base->request($endpoint, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }

    public function changePassword($request)
    {
        $headers = $this->jsonHeader();
        $params = $request->only(['email', 'oldpassword', 'newpassword', 'newconfirmpassword']);
        $endpoint = Consts::AUTH_API_CHANGE_PASS;

        $this->base->request($endpoint, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }

    public function deleteUser($request)
    {
        $headers = $this->jsonHeader();
        $params = $request->only(['email']);
        $endpoint = Consts::AUTH_API_DEL_USER;

        $this->base->request($endpoint, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }

    public function resetPassword($request)
    {
        $headers = $this->jsonHeader();
        $params = $request->only(['email', 'password', 'confirmPassword']);
        $endpoint = Consts::AUTH_API_RESET_PASS;
        //todo code in params

        $this->base->request($endpoint, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }

    private function getCreateParams($request)
    {
        return $request->only([
            "email", "password", "confirmPassword", "firstname", "lastname", "role", "phonenumber"
        ]);
    }

    private function jsonHeader()
    {
        return ['Content-Type' => 'application/json'];
    }

    private function fromHeader()
    {
        return ['Content-Type' => 'application/x-www-form-urlencoded'];
    }
}

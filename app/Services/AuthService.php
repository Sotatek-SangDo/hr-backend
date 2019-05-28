<?php

namespace App\Services;

use App\BaseRequest;
use App\Consts;
use App\Jobs\CreateUserEmail;
use App\Jobs\SendMailForgotPassword;
use DB;

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
        $response = $this->base->request($endpoint, 'POST', $headers, $params);

        $status = $this->base->getStatusCode();
        $result = ['status' => $status];

        if(Consts::STATUS_OK === $status) {
            CreateUserEmail::dispatch($request->all());
        }

        if (Consts::BAD_REQUEST === $status) {
            $result['message'] = $response['message'];
        }
        return $result;
    }

    public function forgotPassword($request)
    {
        try {
            $headers = $this->jsonHeader();
            $params = $request->only('email');
            $endpoint = Consts::AUTH_API_FORGOT_PASS;

            $response = $this->base->request($endpoint, 'POST', $headers, $params);
            $this->sendMailForgot($request, $response);
        } catch(\Exception $e) {
            logger('Error >>>>' . $e->getMessage());
        }
        return ['status' => $this->base->getStatusCode()];
    }

    private function sendMailForgot($request, $response)
    {
        $url = $this->generateForgotUrl($response);
        $content = [
            'email' => $request->email,
            'url' => $url
        ];
        logger(1);
        SendMailForgotPassword::dispatch($content);
    }

    private function generateForgotUrl($response)
    {
        return env('FE_URL', 'http://localhost:8000/#/') . 'reset-password?code=' . $response["code"];
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
            "email", "password", "confirmPassword", "firstName", "lastName", "role", "phonenumber"
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

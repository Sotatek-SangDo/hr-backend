<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consts;
use App\BaseRequest;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $base;

    public function __construct(BaseRequest $base)
    {
        //$this->middleware('auth');
        $this->base = $base;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function testRequest()
    {
        // $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
        // $url = 'connect/token';
        // $params = [
        //     'grant_type' => 'password',
        //     'scope' => 'openid offline_access email profile roles hrm',
        //     'username' => 'admin@erptech.vn',
        //     'password' => '111111',
        //     'client_id' => 'hrm-resource-server',
        //     'client_secret' => 'gJ7t7czenNY8WZEdSAe8ZbKd9MpUhc3S'
        // ];
        $headers = ['Content-Type' => 'application/json'];
        $url = Consts::AUTH_API_FORGOT_PASS;

        $params = [
            'email' => 'anhtanh2795@gmail.com'
        ];

        $rs = $this->base->request($url, 'POST', $headers, $params);
        return $rs;
    }

    public function createUser()
    {
        $headers = ['Content-Type' => 'application/json'];
        $url = Consts::AUTH_API_CREATE_USER;
        $params = [
            "email" => "anhtanh2795@gmail.com",
            "password" => "111111",
            "confirmPassword" => "111111",
            "firstname" => "a11111",
            "lastname" => "b2222",
            "role" => "view",
            "phonenumber"=> "09199999999"
        ];
        
        $this->base->request($url, 'POST', $headers, $params);
        return ['status' => $this->base->getStatusCode()];
    }
}

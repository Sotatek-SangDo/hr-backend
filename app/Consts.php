<?php

namespace App;

class Consts
{
    const APPLY_STATUS = [
        'recruitemtn' => 'Ứng tuyển',
        'waiting' => "Chờ phỏng vấn",
        'ok' => 'Nhận',
        'reject' => 'Từ chối'
    ];

    const LIMIT = 20;
    const PLUS = '+';
    const FULL = 'full';
    const MASTER_DATA = 'Master-Data';

    const CONTRACT_STATUS = [
        'active' => 'Đang có hiệu lực',
        'inactive' => 'Hết hiệu lực'
    ];

    const STATUS_OK = 200;
    const BAD_REQUEST = 400;

    const HEADERS = 'headers';
    const CONTENT_TYPE = 'Content-Type';
    const AUTHORIZATION = 'Authorization';
    const BEARER = 'Bearer ';
    const JSON = 'json';
    const AUTH_API_CREATE_USER = 'api/users/register';
    const AUTH_API_FORGOT_PASS = 'api/users/forgotpassword';
    const AUTH_API_UPDATE_USER = 'api/users/update';
    const AUTH_API_CHANGE_PASS = 'api/users/changepassword';
    const AUTH_API_DEL_USER = 'rest/api/users/delete';
    const AUTH_API_RESET_PASS = 'rest/api/users/resetpassword';
}

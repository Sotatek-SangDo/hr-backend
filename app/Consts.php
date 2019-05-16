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

    const HEADERS = 'headers';
    const CONTENT_TYPE = 'Content-Type';
    const AUTHORIZATION = 'Authorization';
    const BEARER = 'Bearer ';
    const JSON = 'JSON';
    const AUTH_API_CREATE_USER = 'api/users/register';
}

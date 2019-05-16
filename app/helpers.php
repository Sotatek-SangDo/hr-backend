<?php
/**
* Created by: Sang Do
* Created at: 2019-02-26
*/
use Illuminate\Support\Str;
use App\Consts;

if (!function_exists('str_prefix')) {
    function str_prefix( $string )
    {
        $explode = explode('.', $string);
        return $explode[0];
    }
}

if (!function_exists('camel_case')) {
    function camel_case( $string )
    {
        return Str::camel( $string );
    }
}

if (!function_exists('str_subfix')) {
    function str_subfix( $string )
    {
        $explode = explode('.', $string);
        return $explode[1];
    }
}

if (!function_exists('authorization_token')) {
    function authorization_token($request) {
        return Consts::BEARER . $request->bearerToken();
    }
}

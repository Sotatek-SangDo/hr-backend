<?php
/**
* Created by: Sang Do
* Created at: 2019-02-26
*/
use Illuminate\Support\Str;

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

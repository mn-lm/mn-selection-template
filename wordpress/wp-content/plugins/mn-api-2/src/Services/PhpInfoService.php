<?php
namespace MN\Api\Services;

class PhpInfoService
{
    public static function get()
    {
        return [
            'version' => PHP_VERSION,
            'sapi'    => php_sapi_name(),
        ];
    }
}

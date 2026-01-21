<?php
namespace MN\Api\Services;

final class PhpInfoService
{
    public static function get(): array
    {
        return [
            'version' => PHP_VERSION,
            'sapi'    => php_sapi_name(),
        ];
    }
}

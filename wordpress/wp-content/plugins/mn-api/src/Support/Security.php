<?php
namespace MN\Api\Support;

final class Security
{
    public static function validateToken(string $token): bool
    {
        return hash_equals(MN_SITE_INFO_API_TOKEN, trim($token));
    }
}

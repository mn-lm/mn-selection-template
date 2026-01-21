<?php
namespace MN\Api\Rest\Middleware;

use WP_REST_Request;
use WP_Error;
use MN\Api\Support\Security;

final class TokenAuth
{
    public static function check(WP_REST_Request $request)
    {
        $auth = $request->get_header('authorization');

        if (!$auth || stripos($auth, 'bearer ') !== 0) {
            return new WP_Error('no_token', 'Missing token', ['status' => 401]);
        }

        $token = substr($auth, 7);

        return Security::validateToken($token)
            ? true
            : new WP_Error('invalid_token', 'Invalid token', ['status' => 403]);
    }
}

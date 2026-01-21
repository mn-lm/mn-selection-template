<?php
namespace MN\Api\Rest\Middleware;

use WP_Error;

class TokenAuth
{
    public static function check($request)
    {
        $auth = $request->get_header('authorization');
        if (!$auth || stripos($auth, 'bearer ') !== 0) {
            return new WP_Error('no_token', 'Missing token', ['status' => 401]);
        }
        $token = substr($auth, 7);
        if (!hash_equals(MN_API_TOKEN, trim($token))) {
            return new WP_Error('invalid_token', 'Invalid token', ['status' => 403]);
        }
        return true;
    }
}

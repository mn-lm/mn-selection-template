<?php
namespace MN\Api\Rest;

use MN\Api\Rest\Controllers\StatusController;
use MN\Api\Rest\Middleware\TokenAuth;

final class Routes
{
    public static function register(): void
    {
        register_rest_route(
            MN_SITE_INFO_NAMESPACE,
            '/status',
            [
                'methods'             => 'GET',
                'callback'            => [StatusController::class, 'handle'],
                'permission_callback' => [TokenAuth::class, 'check'],
            ]
        );
    }
}

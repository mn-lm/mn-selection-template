<?php
namespace MN\Api\Rest;

class Routes
{
    public static function register()
    {
        register_rest_route(
            MN_API_NAMESPACE,
            '/status',
            [
                'methods'  => 'GET',
                'callback' => ['MN\\Api\\Rest\\Controllers\\StatusController', 'handle'],
                'permission_callback' => ['MN\\Api\\Rest\\Middleware\\TokenAuth', 'check'],
            ]
        );

        register_rest_route(
            MN_API_NAMESPACE,
            '/test-page',
            [
                'methods'  => 'POST',
                'callback' => ['MN\\Api\\Rest\\Controllers\\PageController', 'createTestPage'],
                'permission_callback' => ['MN\\Api\\Rest\\Middleware\\TokenAuth', 'check'],
            ]
        );

        register_rest_route(
            MN_API_NAMESPACE,
            '/download-wp-content',
            [
                'methods'  => 'GET',
                'callback' => ['MN\\Api\\Rest\\Controllers\\ArchiveController', 'downloadWpContent'],
                'permission_callback' => ['MN\\Api\\Rest\\Middleware\\TokenAuth', 'check'],
            ]
        );
    }
}

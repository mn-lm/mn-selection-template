<?php
namespace MN\Api;

final class Plugin
{
    public function boot()
    {
        add_action('rest_api_init', ['MN\Api\Rest\Routes', 'register']);
    }
}

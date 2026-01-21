<?php
namespace MN\Api;

class Plugin
{
    public function boot()
    {
        add_action('rest_api_init', ['MN\\Api\\Rest\\Routes', 'register']);
    }
}

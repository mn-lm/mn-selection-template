<?php
namespace MN\Api\Rest\Controllers;

use MN\Api\Services\WordPressInfoService;
use MN\Api\Services\PhpInfoService;
use MN\Api\Services\PluginInfoService;

class StatusController
{
    public static function handle()
    {
        return [
            'wordpress' => WordPressInfoService::get(),
            'php'       => PhpInfoService::get(),
            'plugins'   => PluginInfoService::get(),
        ];
    }
}
